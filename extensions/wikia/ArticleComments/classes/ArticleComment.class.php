<?php
/**
 * ArticleComment is article, this class is used for manipulation on
 */

use Wikia\Logger\WikiaLogger;

class ArticleComment {

	const MOVE_USER = 'WikiaBot';
	const AVATAR_BIG_SIZE = 50;
	const AVATAR_SMALL_SIZE = 30;

	const CACHE_VERSION = 2;
	const AN_HOUR = 3600;

	const LOG_ACTION_COMMENT = 'article_comment';

	/** @var Bool (for blogs only) */
	public $mProps;

	public $mLastRevId;
	public $mFirstRevId;
	public $mNamespace;

	/** @var array */
	public $mMetadata;

	public $mText;
	public $mRawtext;
	public $mHeadItems;
	public $mNamespaceTalk;

	/** @var Title */
	public $mTitle;

	/** @var User comment creator */
	public $mUser;

	/** @var Article */
	public $mArticle;

	/** @var Revision Last revision for author & time */
	public $mLastRevision;

	/** @var Revision The revision used for displaying text */
	public $mFirstRevision;

	protected $minRevIdFromSlave;

	/**
	 * @param Title $title
	 */
	public function __construct( $title ) {
		$this->mTitle = $title;
		$this->mNamespace = $title->getNamespace();
		$this->mNamespaceTalk = MWNamespace::getTalk( $this->mNamespace );
		$this->mProps = false;
	}

	/**
	 * newFromTitle -- static constructor
	 *
	 * @param Title $title -- Title object connected to comment
	 *
	 * @return ArticleComment object
	 */
	static public function newFromTitle( Title $title ) {
		return new ArticleComment( $title );
	}

	/**
	 * newFromTitle -- static constructor
	 *
	 * @param Article $article object connected to comment
	 * @return ArticleComment object
	 */
	static public function newFromArticle( Article $article ) {
		$title = $article->getTitle();

		$comment = new ArticleComment( $title );
		return $comment;
	}

	/**
	 * Given an article represented by a Title object, return the latest comment associated with it
	 * or return null if one can't be found.
	 *
	 * @param Title $title The article (or blog post) from which to find the latest comment.
	 * @param array $param Additional parameters for this method.  Currently available keys are:
	 *   - useSlave : A boolean value on whether to use the slave DB for the query.  If not given the master
	 *                DB is used, with the assumption that slave lag may cause this query to fail if a comment
	 *                was just posted.
	 *
	 * @return ArticleComment|null
	 */
	static public function latestFromTitle( Title $title, array $param = [] ) {
		if ( empty( $param['useSlave'] ) ) {
			$dbh = wfGetDB( DB_MASTER );
			$flags = Title::GAID_FOR_UPDATE;
		} else {
			$dbh = wfGetDB( DB_SLAVE );
			$flags = 0;
		}

		$titleText = $title->getDBkey();
		$prefix =  $titleText . '/' . ARTICLECOMMENT_PREFIX;
		$commentNamespace = MWNamespace::getTalk( $title->getNamespace() );

		$latest = ( new WikiaSQL() )
			->SELECT( 'page_id' )
			->FROM( 'page' )
			->WHERE( 'page_title' )->LIKE( $prefix . '%' )
			->AND_( 'page_namespace' )->EQUAL_TO( $commentNamespace )
			->ORDER_BY( 'page_id' )->DESC()
			->LIMIT( 1 )
			->run( $dbh, function( ResultWrapper $result ) use ( $flags ) {
				$row = $result->fetchObject();
				if ( $row ) {
					return Title::newFromID( $row->page_id, $flags );
				}
				return null;
			} );

		if ( empty( $latest ) ) {
			return null;
		}
		return new ArticleComment( $latest );
	}

	/**
	 *
	 * Used to store extra data in comment contend
	 *
	 * @access public
	 *
	 */

	public function setMetadata( $key, $val ) {
		$this->mMetadata[$key] = $val;
	}

	public function removeMetadata( $key ) {
		unset( $this->mMetadata[$key] );
	}

	/**
	 *
	 * Used to get extra data in comment content
	 *
	 * @access public
	 *
	 * @param string $key
	 * @param string $val
	 *
	 * @return string
	 */
	public function getMetadata( $key, $val = '' ) {
		return empty( $this->mMetadata[$key] ) ? $val: $this->mMetadata[$key];
	}

	/**
	 * newFromId -- static constructor
	 *
	 * @static
	 * @access public
	 *
	 * @param Integer $id -- identifier from page_id
	 *
	 * @return ArticleComment object
	 */
	static public function newFromId( $id ) {
		$title = Title::newFromID( $id );
		if ( ! $title ) {
			/**
			 * maybe from Master?
			 */
			$title = Title::newFromID( $id, Title::GAID_FOR_UPDATE );

			if ( empty( $title ) ) {
				return false;
			}
		}
		// RT#86385 Why do we get an ID of 0 here sometimes when we know our id already?  Just set it!
		if ( $title && $title->getArticleID() <= 0 ) {
			$title->mArticleID = $id;
		}
		return new ArticleComment( $title );
	}

	/**
	 * load -- set variables, load data from database
	 *
	 * @param bool $master
	 *
	 * @return bool
	 */
	public function load( $master = false ) {
		$result = true;

		if ( $this->mTitle ) {
 			// get revision ids
			if ( $master ) {
				$this->mLastRevId = $this->mTitle->getLatestRevID( Title::GAID_FOR_UPDATE );
			} else {
				$this->mLastRevId = $this->mTitle->getLatestRevID( );
				// if last rev does not exist on slave then fall back to master anyway
				if ( !$this->mLastRevId ) {
					$this->mLastRevId = $this->mTitle->getLatestRevID( Title::GAID_FOR_UPDATE );
				}
				// if last rev STILL does not exist, give up and set it to first rev
				if ( !$this->mLastRevId ) {
					$this->mLastRevId = $this->getFirstRevID( DB_MASTER );
				}
			}

			if ( empty( $this->mLastRevId ) ) {
				// assume article is bogus, treat as if it doesn't exist
				return false;
			}

			$this->mFirstRevId = $this->getFirstRevID( DB_SLAVE );
			// if first rev does not exist on slave then fall back to master anyway
			if ( !$this->mFirstRevId ) {
				$this->mFirstRevId = $this->getFirstRevID( DB_MASTER );
			}

			if ( empty( $this->mFirstRevId ) ) {
				// assume article is bogus, treat as if it doesn't exist
				return false;
			}

			// get revision objects
			if ( $this->mFirstRevId ) {
				$this->mFirstRevision = Revision::newFromId( $this->mFirstRevId );
				if ( !empty( $this->mFirstRevision ) && is_object( $this->mFirstRevision ) && ( $this->mFirstRevision instanceof Revision ) ) { // fix for FB:15198
					if ( $this->mLastRevId == $this->mFirstRevId ) {
						// save one db query by just setting them to the same revision object
						$this->mLastRevision = $this->mFirstRevision;
					} else {
						$this->mLastRevision = Revision::newFromId( $this->mLastRevId );
						if ( empty( $this->mLastRevision ) || !is_object( $this->mLastRevision ) || !( $this->mLastRevision instanceof Revision ) ) {
							$result = false;
						}
					}
				} else {
					$result = false;
				}
			} else {
				$result = false;
			}

			// get user that created this comment
			if ( $this->mFirstRevision ) {
				$this->mUser = User::newFromId( $this->mFirstRevision->getUser() );
				$this->mUser->setName( $this->mFirstRevision->getUserText() );
			} else {
				$result = false;
			}

			if ( empty( $this->mFirstRevision ) || empty( $this->mLastRevision ) ) {
				return false;
			}

			$rawText = $this->mLastRevision->getText();
			$this->parseText( $rawText );
		} else { // null title
			$result = false;
		}
		return $result;
	}

	public function parseText( $rawText ) {
		global $wgEnableParserCache;

		$this->mRawtext = self::removeMetadataTag( $rawText );

		$wgEnableParserCache = false;

		$parser = ParserPool::get();

		$parser->ac_metadata = [];

		// VOLDEV-68: Remove broken section edit links
		$opts = ParserOptions::newFromContext( RequestContext::getMain() );
		$opts->setEditSection( false );
		$head = $parser->parse( $rawText, $this->mTitle, $opts );

		$this->mText = wfFixMalformedHTML( $head->getText() );

		$this->mHeadItems = $head->getHeadItems();

		if ( isset( $parser->ac_metadata ) ) {
			$this->mMetadata = $parser->ac_metadata;
		} else {
			$this->mMetadata = [];
		}

		ParserPool::release( $parser );

		return $this->mText;
	}

	public function getText() {
		return $this->mText;
	}

	/**
	 * getFirstRevID -- What is id for first revision
	 *
	 * @see Title::getLatestRevID
	 *
	 * @param $db_conn
	 *
	 * @return int
	 */
	private function getFirstRevID( $db_conn ) {
		$id = false;

		if ( $db_conn == DB_SLAVE && isset( $this->minRevIdFromSlave ) ) {
			return $this->minRevIdFromSlave;
		}

		if ( $this->mTitle ) {
			$db = wfGetDB( $db_conn );
			$id = $db->selectField(
				'revision',
				'min(rev_id)',
				[ 'rev_page' => $this->mTitle->getArticleID() ],
				__METHOD__
			);
		}
		return $id;
	}

	public function setFirstRevId( $value, $db_conn ) {
		if ( $db_conn == DB_SLAVE ) {
			$this->minRevIdFromSlave = $value;
		}
	}

	/**
	 * getTitle -- getter/accessor
	 *
	 */
	public function getTitle() {
		return $this->mTitle;
	}

	public function getData( $master = false ) {
		global $wgUser, $wgBlankImgUrl, $wgMemc, $wgArticleCommentsEnableVoting;
		$comment = false;
		$title = $this->getTitle();
		$commentId = $title->getArticleId();
		$canDelete = !count( $title->getUserPermissionsErrors( 'delete', F::app()->wg->User, false, [] ) );

		// vary cache on permission as well so it changes we can show it to a user
		$articleDataKey = wfMemcKey(
			'articlecomment_data',
			$commentId,
			$title->getLatestRevID(),
			$wgUser->getId(),
			$canDelete,
			RequestContext::getMain()->getSkin()->getSkinName(),
			self::CACHE_VERSION
		);

		$data = $wgMemc->get( $articleDataKey );

		if ( !empty( $data ) ) {
			$data['timestamp'] = "<a href='" . $title->getFullUrl( [ 'permalink' => $data['id'] ] ) . '#comm-' . $data['id'] . "' class='permalink'>" . wfTimeFormatAgo( $data['rawmwtimestamp'] ) . "</a>";
			return $data;
		}

		if ( $this->load( $master ) ) {
			$sig = ( $this->mUser->isAnon() )
				? AvatarService::renderLink( $this->mUser->getName() )
				: Xml::element( 'a', [ 'href' => $this->mUser->getUserPage()->getFullUrl() ], $this->mUser->getName() );

			$isStaff = (int)in_array( 'staff', $this->mUser->getEffectiveGroups() );

			$parts = self::explode( $title->getDBkey() );

			$buttons = []; // action links with full markup (used in Oasis)
			$links = []; // action links with only a URL
			$replyButton = '';

			// this is for blogs we want to know if commenting on it is enabled
			// we cannot check it using $title->getBaseText, as this returns main namespace title
			// the subjectpage for $parts title is something like 'User blog comment:SomeUser/BlogTitle' which is fine
			$articleTitle = Title::makeTitle( MWNamespace::getSubject( $this->mNamespace ), $parts['title'] );
			$commentingAllowed = ArticleComment::userCanCommentOn( $articleTitle );

			if ( ( count( $parts['partsStripped'] ) == 1 ) && $commentingAllowed ) {
				$replyButton = '<button type="button" class="article-comm-reply wikia-button secondary actionButton">' . wfMessage( 'article-comments-reply' )->escaped() . '</button>';
			}
			if ( defined( 'NS_QUESTION_TALK' ) && ( $title->getNamespace() == NS_QUESTION_TALK ) ) {
				$replyButton = '';
			}

			if ( $canDelete ) {
				$img = '<img class="remove sprite" alt="" src="' . $wgBlankImgUrl . '" width="16" height="16" />';
				$buttons[] = $img . '<a href="' . $title->getLocalUrl( 'redirect=no&action=delete' ) . '" class="article-comm-delete">' . wfMessage( 'article-comments-delete' )->escaped() . '</a>';

				$links['delete'] = $title->getLocalUrl( 'redirect=no&action=delete' );
			}

			// due to slave lag canEdit() can return false negative - we are hiding it by CSS and force showing by JS
			if ( $wgUser->isLoggedIn() && $commentingAllowed ) {
				$display = $title->userCan( 'edit' ) ? 'test=' : ' style="display:none"';
				$img = '<img class="edit-pencil sprite" alt="" src="' . $wgBlankImgUrl . '" width="16" height="16" />';
				$buttons[] = "<span class='edit-link'$display>" . $img . '<a href="#comment' . $commentId . '" class="article-comm-edit actionButton" id="comment' . $commentId . '">' . wfMessage( 'article-comments-edit' )->escaped() . '</a></span>';

				$links['edit'] = '#comment' . $commentId;
			}

			if ( !$this->mTitle->isNewPage( Title::GAID_FOR_UPDATE ) ) {
				$buttons[] = Linker::linkKnown( $title, wfMessage( 'article-comments-history' )->escaped(), [ 'class' => 'article-comm-history' ], [ 'action' => 'history' ] );

				$links['history'] = $title->getLocalUrl( 'action=history' );
			}

			$rawmwtimestamp = $this->mFirstRevision->getTimestamp();
			$rawtimestamp = wfTimeFormatAgo( $rawmwtimestamp );
			$timestamp = "<a rel='nofollow' href='" . $title->getFullUrl( [ 'permalink' => $commentId ] ) . '#comm-' . $commentId . "' class='permalink'>" . wfTimeFormatAgo( $rawmwtimestamp ) . "</a>";

			$comment = [
				'id' => $commentId,
				'author' => $this->mUser,
				'username' => $this->mUser->getName(),
				'avatar' => AvatarService::renderAvatar( $this->mUser->getName(), self::AVATAR_BIG_SIZE ),
				'avatarSmall' => AvatarService::renderAvatar( $this->mUser->getName(), self::AVATAR_SMALL_SIZE ),
				'userurl' =>  AvatarService::getUrl( $this->mUser->getName() ),
				'isLoggedIn' => $this->mUser->isLoggedIn(),
				'buttons' => $buttons,
				'links' => $links,
				'replyButton' => $replyButton,
				'sig' => $sig,
				'text' => $this->mText,
				'metadata' => $this->mMetadata,
				'rawtext' =>  $this->mRawtext,
				'timestamp' => $timestamp,
				'rawtimestamp' => $rawtimestamp,
				'rawmwtimestamp' =>	$rawmwtimestamp,
				'title' => $title->getText(),
				'isStaff' => $isStaff,
			];

			if ( !empty( $wgArticleCommentsEnableVoting ) ) {
				$comment['votes'] = $this->getVotesCount();
			}

			$wgMemc->set( $articleDataKey, $comment, self::AN_HOUR );

			if ( !( $comment['title'] instanceof Title ) ) {
				$comment['title'] = Title::newFromText( $comment['title'], NS_TALK );
			}
		}
		return $comment;
	}

	/**
	 * @static
	 * @param Parser $parser
	 * @return bool
	 */
	static public function metadataParserInit( Parser $parser ) {
		$parser->setHook( 'ac_metadata', 'ArticleComment::parserTag' );
		return true;
	}

	/**
	 * @static
	 * @param string $content parser tag content
	 * @param Array $attributes attribs
	 * @param Parser $self
	 * @return string
	 */
	public static function parserTag( $content, $attributes, Parser $self ) {
		$self->ac_metadata = $attributes;
		return '';
	}

	/**
	 * delete article with out any confirmation (used by wall)
	 *
	 * @access public
	 *
	 * @param $reason
	 * @param bool $suppress
	 *
	 * @return bool
	 */
	public function doDeleteComment( $reason, $suppress = false ) {
		$wikiPage = new WikiPage( $this->mTitle );

		if ( $wikiPage->doDeleteArticle( $reason, $suppress ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Find the article or blog post this comment was left on and return a Title object for it
	 *
	 * @access public
	 */
	public function getArticleTitle() {
		if ( !isset( $this->mTitle ) ) {
			return null;
		}

		$title = null;
		$parts = self::explode( $this->mTitle->getDBkey() );
		if ( $parts['title'] != '' ) {
			$title = Title::makeTitle( MWNamespace::getSubject( $this->mNamespace ), $parts['title'] );
		}
		return $title;
	}

	/**
	 * @static
	 * @param $title Title
	 * @return bool
	 */
	public static function isTitleComment( $title ) {
		if ( !( $title instanceof Title ) ) {
			return false;
		}

		if ( self::isBlog() ) {
			return true;
		} else {
			$titleParts = explode( '/', $title->getText() );
			return strpos( end( $titleParts ), ARTICLECOMMENT_PREFIX ) === 0;
		}
	}

	public static function explode( $titleText ) {
		$count = 0;
		$titleTextStripped = str_replace( ARTICLECOMMENT_PREFIX, '', $titleText, $count );
		$partsOriginal = explode( '/', $titleText );
		$partsStripped = explode( '/', $titleTextStripped );

		if ( $count ) {
			$title = implode( '/', array_splice( $partsOriginal, 0, -$count ) );
			array_splice( $partsStripped, 0, -$count );
		} else {
			// not a comment - fallback
			$title = $titleText;
			$partsOriginal = $partsStripped = [];
		}

		$result = [
			'title' => $title,
			'partsOriginal' => $partsOriginal,
			'partsStripped' => $partsStripped
		];

		return $result;
	}

	/**
	 * check if current user can edit comment
	 */
	public function canEdit() {
		global $wgUser;

		$isAuthor = false;

		if ( $this->mFirstRevision ) {
			$isAuthor = $this->mFirstRevision->getUser( Revision::RAW ) == $wgUser->getId() && !$wgUser->isAnon();
		}

		// prevent infinite loop for blogs - userCan hooked up in BlogLockdown
		$canEdit = self::isBlog( $this->mTitle ) || $this->mTitle->userCan( "edit" );

		$isAllowed = $wgUser->isAllowed( 'commentedit' );

		$res = $isAuthor || ( $isAllowed && $canEdit );

		return $res;
	}

	/**
	 * @param $user User
	 * @return bool
	 */
	public function isAuthor( $user ) {
		if ( $this->mUser ) {
			return $this->mUser->getId() == $user->getId() && !$user->isAnon();
		}
		return false;
	}

	/**
	 * Whether or not the current page is a blog page
	 *
	 * @param Title $title
	 *
	 * @return bool
	 */
	public static function isBlog( Title $title = null ) {
		global $wgTitle;

		$isBlog = false;
		$title = is_null( $title ) ? $wgTitle : $title;

		if ( !empty( $title ) ) {
			$namespace = $title->getNamespace();
			$isBlog =
				( defined( 'NS_BLOG_ARTICLE' ) && $namespace == NS_BLOG_ARTICLE ) ||
				( defined( 'NS_BLOG_ARTICLE_TALK' ) && $namespace == NS_BLOG_ARTICLE_TALK );
		}

		return $isBlog;
	}

	/**
	 * editPage -- show edit form
	 *
	 * @access public
	 *
	 * @return String
	 */
	public function editPage() {
		global $wgStylePath;

		$text = '';
		$this->load( true );
		if ( $this->canEdit() ) {
			$vars = [
				'canEdit'				=> $this->canEdit(),
				'comment'				=> htmlentities( ArticleCommentsAjax::getConvertedContent( $this->mLastRevision->getText() ) ),
				'isReadOnly'			=> wfReadOnly(),
				'isMiniEditorEnabled'	=> ArticleComment::isMiniEditorEnabled(),
				'stylePath'				=> $wgStylePath,
				'articleId'				=> $this->mTitle->getArticleId(),
				'articleFullUrl'		=> $this->mTitle->getFullUrl(),
			];
			$text = F::app()->getView( 'ArticleComments', 'Edit', $vars )->render();
		}

		return $text;
	}

	/**
	 * doSaveComment -- save comment
	 *
	 * @access public
	 *
	 * @param string $text
	 * @param User $user
	 * @param Title $title
	 * @param int $commentId
	 * @param bool $force
	 * @param string $summary
	 * @param bool $preserveMetadata : hack to fix bug 102384 (prevent metadata override when trying to modify one of metadata keys)
	 *
	 * @return Array|false TODO: Document what the array contains.
	 */
	public function doSaveComment( $text, $user, $title = null, $commentId = 0, $force = false, $summary = '', $preserveMetadata = false ) {
		global $wgTitle;
		$metadata = $this->mMetadata;

		$this->load( true );

		if ( $force || $this->getTitle()->userCan( 'edit' ) ) {

			if ( wfReadOnly() ) {
				return false;
			}

			if ( !$text || !strlen( $text ) ) {
				return false;
			}

			if ( empty( $this->mTitle ) && !$commentId ) {
				return false;
			}

			$commentTitle = $this->mTitle ? $this->mTitle : Title::newFromId( $commentId );

			/**
			 * because we save different title via Ajax request
			 */
			$origTitle = $wgTitle;
			$wgTitle = $commentTitle;

			/**
			 * add article using EditPage class (for hooks)
			 */

			$article = new Article( $commentTitle, intval( $this->mLastRevId ) );
			if ( $preserveMetadata ) {
				$this->mMetadata = $metadata;
			}
			$retval = self::doSaveAsArticle( $text, $article, $user, $this->mMetadata, $summary );

			if ( !empty( $title ) ) {
				$purgeTarget = $title;
			} else {
				$purgeTarget = $origTitle;
			}

			ArticleCommentList::purgeCache( $purgeTarget );
			$res = [ $retval, $article ];
		} else {
			$res = false;
		}

		$this->mLastRevId = $this->mTitle->getLatestRevID( Title::GAID_FOR_UPDATE );
		$this->mLastRevision = Revision::newFromId( $this->mLastRevId );
		return $res;
	}

	/**
	 * doSaveAsArticle store comment as article
	 *
	 * @static
	 *
	 * @param String $text
	 * @param Article|WikiPage $article
	 * @param User $user
	 * @param array $metadata
	 * @param string $summary
	 *
	 * @return Status TODO: Document
	 */
	static protected function doSaveAsArticle( $text, $article, $user, $metadata = [], $summary = '' ) {
		$result = null;

		$editPage = new EditPage( $article );
		$editPage->edittime = $article->getTimestamp();
		$editPage->textbox1 = self::removeMetadataTag( $text );

		$editPage->summary = $summary;

		$editPage->watchthis = $user->isWatched( $article->getTitle() );

		if ( !empty( $metadata ) ) {
			$editPage->textbox1 =  $text . Xml::element( 'ac_metadata', $metadata, ' ' );
		}

		$bot = $user->isAllowed( 'bot' );

		return $editPage->internalAttemptSave( $result, $bot );
	}

	/**
	 *
	 * remove metadata tag from
	 *
	 * @access protected
	 *
	 * @param $text
	 *
	 * @return mixed
	 */
	static protected function removeMetadataTag( $text ) {
		return preg_replace( '#</?ac_metadata(\s[^>]*)?>#i', '', $text );
	}

	/**
	 * doPost -- static hook/entry for normal request post
	 *
	 * @static
	 * @access public
	 *
	 * @param $text
	 * @param User $user -- instance of User who is leaving the comment
	 * @param Title $title -- instance of Title
	 *
	 * @param bool $parentId
	 * @param array $metadata
	 *
	 * @return Article -- newly created article
	 * @throws MWException
	 */
	static public function doPost( $text, $user, $title, $parentId = false, $metadata = [] ) {
		global $wgTitle;

		if ( !$text || !strlen( $text ) ) {
			return false;
		}

		if ( wfReadOnly() ) {
			return false;
		}

		/**
		 * title for comment is combination of article title and some 'random' data
		 */
		if ( $parentId == false ) {
			// 1st level comment
			$commentTitle = sprintf( '%s/%s%s-%s', $title->getText(), ARTICLECOMMENT_PREFIX, $user->getName(), wfTimestampNow() );
		} else {
			$parentArticle = Article::newFromID( $parentId );
			if ( empty( $parentArticle ) ) {
				$parentTitle = Title::newFromID( $parentId, Title::GAID_FOR_UPDATE );
				// it's possible for Title to be empty at this point
				// if article was removed in the meantime
				// (for eg. when replying on Wall from old browser session
				//  to non-existing thread)
				// it's fine NOT to create Article in that case
				if ( !empty( $parentTitle ) ) {
					$parentArticle = new Article( $parentTitle );
				}

				// if $parentTitle is empty the logging below will be executed
			}
			// FB#2875 (log data for further debugging)
			if ( is_null( $parentArticle ) ) {
				$debugTitle = !empty( $title ) ? $title->getText() : '--EMPTY--'; // BugId:2646
				WikiaLogger::instance()->debug( 'Failed to create article object', [
					'method' => __METHOD__,
					'id' => $parentId,
					'title' => $debugTitle,
					'user' => $user->getName()
				] );
				return false;
			}
			$parentTitle = $parentArticle->getTitle();
			// nested comment
			$commentTitle = sprintf( '%s/%s%s-%s', $parentTitle->getText(), ARTICLECOMMENT_PREFIX, $user->getName(), wfTimestampNow() );
		}
		$commentTitleText = $commentTitle;
		$commentTitle = Title::newFromText( $commentTitle, MWNamespace::getTalk( $title->getNamespace() ) );

		if ( !( $commentTitle instanceof Title ) ) {
			if ( !empty( $parentId ) ) {
				WikiaLogger::instance()->debug( 'Failed to create commentTitle', [
					'method' => __METHOD__,
					'replyParentId' => $parentId,
					'commentTitleText' => $commentTitleText
				] );
			}
			return false;
		}

		/**
		 * because we save different tile via Ajax request TODO: fix it !!
		 */
		$wgTitle = $commentTitle;

		/**
		 * add article using EditPage class (for hooks)
		 */

		$article  = new Article( $commentTitle, 0 );

		CommentsIndex::addCommentInfo( $commentTitleText, $title, $parentId );

		$retval = self::doSaveAsArticle( $text, $article, $user, $metadata );

		if ( $retval->value == EditPage::AS_SUCCESS_NEW_ARTICLE ) {
			$commentsIndex = CommentsIndex::newFromId( $article->getID() );
			if ( empty( $commentsIndex ) ) {
				WikiaLogger::instance()->debug( 'Empty CommentsIndex', [
					'method' => __METHOD__,
					'replyTo' => $parentId,
					'commentTitleText' => $commentTitleText
				] );
			} else {
				Hooks::run( 'EditCommentsIndex', [ $article->getTitle(), $commentsIndex ] );
			}
		}

		$res = ArticleComment::doAfterPost( $retval, $article, $parentId );

		ArticleComment::doPurge( $title, $commentTitle );

		return [ $retval, $article, $res ];
	}

	/**
	 * @static
	 * @param $title Title
	 * @param $commentTitle Title
	 */
	static public function doPurge( $title, $commentTitle ) {
		global $wgArticleCommentsLoadOnDemand;

		// make sure our comment list is refreshed from the master RT#141861
		$commentList = ArticleCommentList::newFromTitle( $title );
		$commentList->purge();
		$commentList->getCommentList( true );

		// Purge squid proxy URLs for ajax loaded content if we are lazy loading
		if ( !empty( $wgArticleCommentsLoadOnDemand ) ) {
			$urls = self::getSquidURLs( $title );
			$squidUpdate = new SquidUpdate( $urls );
			$squidUpdate->doUpdate();

		// Otherwise, purge the article
		} else {

			// BugID: 2483 purge the parent article when new comment is posted
			// BugID: 29462, purge the ACTUAL parent, not the root page... $#%^!
			$parentTitle = Title::newFromText( $commentTitle->getBaseText() );

			if ( $parentTitle ) {
				$parentTitle->invalidateCache();
				$parentTitle->purgeSquid();
			}
		}
	}

	/**
	 * @param Title $title
	 * @return array
	 */
	public static function getSquidURLs( Title $title ) {
		$urls = [];
		$articleId = $title->getArticleId();

		// Only page 1 is cached in varnish when lazy loading is on
		// Other pages load with action=ajax&rs=ArticleCommentsAjax&method=axGetComments
		$urls[] = ArticleCommentsController::getUrl(
			'Content',
			[
				'format' => 'html',
				'articleId' => $articleId,
				'page' => 1,
				'skin' => 'true'
			]
		);

		Hooks::run( 'ArticleCommentGetSquidURLs', [ $title, &$urls ] );

		return $urls;
	}

	/**
	 * @static
	 * @param Status $status
	 * @param $article WikiPage
	 * @param int $parentId
	 * @return array
	 */
	static public function doAfterPost( Status $status, $article, $parentId = 0 ) {
		global $wgUser, $wgDBname;

		Hooks::run( 'ArticleCommentAfterPost', [ $status, &$article ] );
		$commentId = $article->getId();
		$error = false;
		$id = 0;

		switch( $status->value ) {
			case EditPage::AS_SUCCESS_UPDATE:
			case EditPage::AS_SUCCESS_NEW_ARTICLE:
				$comment = ArticleComment::newFromArticle( $article );
				$app = F::app();

				if ( $app->checkSkin( 'wikiamobile' ) ) {
					$viewName = 'WikiaMobileComment';
				} elseif ( $app->checkSkin( 'venus' ) ) {
					$viewName = 'VenusComment';
				} else {
					$viewName = 'Comment';
				}

				$parameters = [
					'comment' => $comment->getData( true ),
					'commentId' => $commentId,
					'rowClass' => '',
					'level' => ( $parentId ) ? 2 : 1
				];
				$text = $app->getView( 'ArticleComments', $viewName, $parameters )->render();

				if ( !is_null( $comment->mTitle ) ) {
					$id = $comment->mTitle->getArticleID();
				}

				if ( !empty( $comment->mTitle ) ) {
					self::addArticlePageToWatchlist( $comment ) ;
				}

				$message = false;

				// commit before purging
				wfGetDB( DB_MASTER )->commit();
				break;
			default:
				$userId = $wgUser->getId();
				WikiaLogger::instance()->debug( 'No article created', [
					'method' => __METHOD__,
					'status' => $status->value,
					'db' => $wgDBname,
					'user' => $userId
				] );
				$text  = false;
				$error = true;

				$message = wfMessage( 'article-comments-error' )->escaped();

				WikiaLogger::instance()->error( 'PLATFORM-1311', [
					'reason' => 'article-comments-error',
					'name' => $article->getTitle()->getPrefixedDBkey(),
					'page_id' => $commentId,
					'user_id' => $userId,
					'exception' => new Exception( 'article-comments-error', $status->value )
				] );
		}

		$res = [
			'commentId' => $commentId,
			'error'  	=> $error,
			'id'		=> $id,
			'msg'    	=> $message,
			'status' 	=> $status,
			'text'   	=> $text
		];

		return $res;
	}

	/**
	 * @static
	 * @param $comment ArticleComment
	 * @return bool
	 */
	static public function addArticlePageToWatchlist( $comment ) {
		global $wgUser, $wgEnableArticleWatchlist, $wgBlogsEnableStaffAutoFollow;

		if ( !Hooks::run( 'ArticleCommentBeforeWatchlistAdd', [ $comment ] ) ) {
			return true;
		}

		if ( empty( $wgEnableArticleWatchlist ) || $wgUser->isAnon() ) {
			return false;
		}

		$oArticlePage = $comment->getArticleTitle();
		if ( is_null( $oArticlePage ) ) {
			return false;
		}


		if ( $wgUser->getGlobalPreference( 'watchdefault' ) && !$oArticlePage->userIsWatching() ) {
			# and article page
			$wgUser->addWatch( $oArticlePage );
		}

		if ( !empty( $wgBlogsEnableStaffAutoFollow ) && self::isBlog() ) {
			$owner = BlogArticle::getOwner( $oArticlePage );
			$oUser = User::newFromName( $owner );
			if ( $oUser instanceof User ) {
				$groups = $oUser->getEffectiveGroups();
				if ( is_array( $groups ) && in_array( 'staff', $groups ) ) {
					$wgUser->addWatch( Title::newFromText( $oUser->getName(), NS_BLOG_ARTICLE ) );
				}
			}
		}

		return true;
	}

	/**
	 * Hook
	 *
	 * @param RecentChange $oRC -- instance of RecentChange class
	 *
	 * @static
	 * @access public
	 *
	 * @return Bool true -- because it's a hook
	 */
	static public function watchlistNotify( RecentChange &$oRC ) {
		global $wgEnableGroupedArticleCommentsRC;

		Hooks::run( 'AC_RecentChange_Save', [ &$oRC ] );

		if ( !empty( $wgEnableGroupedArticleCommentsRC ) && ( $oRC instanceof RecentChange ) ) {
			$title = $oRC->getAttribute( 'rc_title' );
			$namespace = $oRC->getAttribute( 'rc_namespace' );
			$article_id = $oRC->getAttribute( 'rc_cur_id' );
			$title = Title::newFromText( $title, $namespace );

			// TODO: review
			if ( MWNamespace::isTalk( $namespace ) &&
				ArticleComment::isTitleComment( $title ) &&
				!empty( $article_id ) ) {

				$comment = ArticleComment::newFromId( $article_id );
				if ( $comment instanceof ArticleComment ) {
					$oArticlePage = $comment->getArticleTitle();
					$mAttribs = $oRC->mAttribs;
					$mAttribs['rc_title'] = $oArticlePage->getDBkey();
					$mAttribs['rc_namespace'] = $oArticlePage->getNamespace();
					$mAttribs['rc_log_action'] = self::LOG_ACTION_COMMENT;

					$oRC->setAttribs( $mAttribs );
				}
			}
		}
		return true;
	}

	/**
	 * Hook
	 *
	 * @param Title $title -- instance of EmailNotification class
	 * @param Array $keys -- array of all special variables like $PAGETITLE etc
	 * @param String $message (subject or body)
	 * @param $editor User
	 *
	 * @static
	 * @access public
	 *
	 * @return Bool true -- because it's a hook
	 */
	static public function ComposeCommonMail( $title, &$keys, &$message, $editor ) {
		global $wgEnotifUseRealName;

		if ( MWNamespace::isTalk( $title->getNamespace() ) && ArticleComment::isTitleComment( $title ) ) {
			if ( !is_array( $keys ) ) {
				$keys = [];
			}

			$name = $wgEnotifUseRealName ? $editor->getRealName() : $editor->getName();
			if ( $editor->isIP( $name ) ) {
				$utext = trim( wfMessage( 'enotif_anon_editor', '' )->inContentLanguage()->escaped() );
				$message = str_replace( '$PAGEEDITOR', $utext, $message );
				$keys['$PAGEEDITOR'] = $utext;
			}
		}
		return true;
	}

	/**
	 * create task to move comment
	 *
	 * @access public
	 * @static
	 *
	 * @param Title $oCommentTitle
	 * @param Title $oNewTitle
	 * @param array $taskParams
	 *
	 * @return bool
	 * @throws MWException
	 */
	static private function addMoveTask( $oCommentTitle, &$oNewTitle, $taskParams ) {
		if ( !is_object( $oCommentTitle ) ) {
			return false;
		}

		$parts = self::explode( $oCommentTitle->getDBkey() );
		$commentTitleText = implode( '/', $parts['partsOriginal'] );

		$newCommentTitle = Title::newFromText(
			sprintf( '%s/%s', $oNewTitle->getText(), $commentTitleText ),
			MWNamespace::getTalk( $oNewTitle->getNamespace() ) );

		$taskParams['page'] = $oCommentTitle->getFullText();
		$taskParams['newpage'] = $newCommentTitle->getFullText();

		$task = new \Wikia\Tasks\Tasks\MultiTask();
		$task->call( 'move', $taskParams );
		$submit_id = $task->queue();

		WikiaLogger::instance()->info( 'Added move task', [
			'method' => __METHOD__,
			'submitId' => $submit_id,
			'page' => $taskParams['page']
		] );
		return true;
	}

	/**
	 * move one comment
	 *
	 * @access public
	 * @static
	 *
	 * @param Title $oCommentTitle
	 * @param Title $oNewTitle
	 * @param string $reason
	 *
	 * @return array|Mixed
	 * @throws MWException
	 */
	static private function moveComment( $oCommentTitle, &$oNewTitle, $reason = '' ) {
		global $wgUser;

		if ( !is_object( $oCommentTitle ) ) {
			return [ 'invalid title' ];
		}

		$currentUser = $wgUser;
		$wgUser = User::newFromName( self::MOVE_USER );

		$parts = self::explode( $oCommentTitle->getDBkey() );
		$commentTitleText = implode( '/', $parts['partsOriginal'] );

		$newCommentTitle = Title::newFromText(
			sprintf( '%s/%s', $oNewTitle->getText(), $commentTitleText ),
			MWNamespace::getTalk( $oNewTitle->getNamespace() ) );

		$error = $oCommentTitle->moveTo( $newCommentTitle, false, $reason, false );

		$wgUser = $currentUser;
		return $error;
	}

	/**
	 * hook
	 *
	 * @access public
	 * @static
	 *
	 * @param MovePageForm $form
	 * @param Title $oOldTitle
	 * @param Title $oNewTitle
	 *
	 * @return bool
	 */
	static public function moveComments( MovePageForm &$form , Title &$oOldTitle , Title &$oNewTitle ) {
		global $wgUser, $wgRC2UDPEnabled, $wgMaxCommentsToMove, $wgEnableMultiDeleteExt, $wgCityId;

		if ( !$wgUser->isAllowed( 'move' ) ) {
			return true;
		}

		if ( $wgUser->isBlocked() ) {
			return true;
		}

		$commentList = ArticleCommentList::newFromTitle( $oOldTitle );
		$comments = $commentList->getCommentPages( true, false );

		if ( count( $comments ) ) {
			$mAllowTaskMove = false;
			if ( isset( $wgMaxCommentsToMove ) && ( $wgMaxCommentsToMove > 0 ) && ( !empty( $wgEnableMultiDeleteExt ) ) ) {
				$mAllowTaskMove = true;
			}

			$irc_backup = $wgRC2UDPEnabled;	// backup
			$wgRC2UDPEnabled = false; // turn off
			$finish = $moved = 0;
			$comments = array_values( $comments );
			foreach ( $comments as $id => $aCommentArr ) {
				/** @var Title $oCommentTitle */
				$oCommentTitle = $aCommentArr['level1']->getTitle();

				# move comment level #1
				$error = self::moveComment( $oCommentTitle, $oNewTitle, $form->reason );
				if ( $error !== true ) {
					WikiaLogger::instance()->error( 'Cannot move blog comments', [
						'method' => __METHOD__,
						'oldComment' => $oCommentTitle->getPrefixedText(),
						'newComent' => $oNewTitle->getPrefixedText(),
						'error' => @implode( ', ', $error )
					] );
				} else {
					$moved++;
				}

				if ( isset( $aCommentArr['level2'] ) ) {
					foreach ( $aCommentArr['level2'] as $oComment ) {
						/**
						 * @var $oComment ArticleComment
						 * @var $oCommentTitle Title
						 */
						$oCommentTitle = $oComment->getTitle();

						# move comment level #2
						$error = self::moveComment( $oCommentTitle, $oNewTitle, $form->reason );
						if ( $error !== true ) {
							WikiaLogger::instance()->error( 'Cannot move blog comments', [
								'method' => __METHOD__,
								'oldComment' => $oCommentTitle->getPrefixedText(),
								'newComent' => $oNewTitle->getPrefixedText(),
								'error' => @implode( ', ', $error )
							] );
						} else {
							$moved++;
						}
					}
				}

				if ( $mAllowTaskMove && $wgMaxCommentsToMove < $moved ) {
					$finish = $id;
					break;
				}
			}

			# rest comments move to task
			if ( $finish > 0 && $finish < count( $comments ) ) {
				$taskParams = [
					'wikis'		=> '',
					'reason' 	=> $form->reason,
					'lang'		=> '',
					'cat'		=> '',
					'selwikia'	=> $wgCityId,
					'user'		=> self::MOVE_USER
				];

				for ( $i = $finish + 1; $i < count( $comments ); $i++ ) {
					$aCommentArr = $comments[$i];
					$oCommentTitle = $aCommentArr['level1']->getTitle();
					self::addMoveTask( $oCommentTitle, $oNewTitle, $taskParams );
					if ( isset( $aCommentArr['level2'] ) ) {
						foreach ( $aCommentArr['level2'] as $oComment ) {
							$oCommentTitle = $oComment->getTitle();
							self::addMoveTask( $oCommentTitle, $oNewTitle, $taskParams );
						}
					}
				}
			}

			$wgRC2UDPEnabled = $irc_backup; // restore to whatever it was
			$listing = ArticleCommentList::newFromTitle( $oNewTitle );
			$listing->purge();
		} else {
			WikiaLogger::instance()->info( 'Cannot move article comments, because no comments', [
				'method' => __METHOD__,
				'title' => $oOldTitle->getPrefixedText()
			] );
		}

		return true;
	}

	// Blog post only functions

	/**
	 * setProps -- change props for comment article
	 *
	 * @param $props
	 * @param bool $update
	 */
	public function setProps( $props, $update = false ) {
		if ( $update && class_exists( 'BlogArticle' ) ) {
			BlogArticle::setProps( $this->mTitle->getArticleID(), $props );
		}
		$this->mProps = $props;
	}

	/**
	 * getProps -- get props for comment article
	 *
	 */
	public function getProps() {
		if ( ( !$this->mProps || !is_array( $this->mProps ) ) && class_exists( 'BlogArticle' ) ) {
			$this->mProps = BlogArticle::getProps( $this->mTitle->getArticleID() );
		}
		return $this->mProps;
	}

	// Voting functions

	public function getVotesCount() {
		$pageId = $this->mTitle->getArticleId();
		$oFauxRequest = new FauxRequest( [
			'action' => 'query',
			'list' => 'wkvoteart',
			'wkpage' => $pageId,
			'wkuservote' => 0,
			'wktimestamps' => 1
		] );
		$oApi = new ApiMain( $oFauxRequest );
		$oApi->execute();
		$aResult = $oApi->getResultData();

		if ( isset( $aResult['query']['wkvoteart'][$pageId]['votescount'] ) ) {
			return $aResult['query']['wkvoteart'][$pageId]['votescount'];
		} else {
			return 0;
		}
	}

	public function vote() {
		$oFauxRequest = new FauxRequest( [
			'action' => 'insert',
			'list' => 'wkvoteart',
			'wkpage' => $this->mTitle->getArticleId(),
			'wkvote' => 3
		] );
		$oApi = new ApiMain( $oFauxRequest );

		$oApi->execute();

		$aResult = $oApi->getResultData();

		$success = !empty( $aResult );

		return $success;
	}

	public function userCanVote() {
		$pageId = $this->mTitle->getArticleId();

		$oFauxRequest = new FauxRequest( [
			'action' => 'query',
			'list' => 'wkvoteart',
			'wkpage' => $pageId,
			'wkuservote' => 1
		] );
		$oApi = new ApiMain( $oFauxRequest );
		$oApi->execute();
		$aResult = $oApi->GetResultData();

		if ( isset( $aResult['query']['wkvoteart'][$pageId]['uservote'] ) ) {
			$result = false;
		} else {
			$result = true;
		}

		return $result;
	}

	public function getTopParent() {
		$key = $this->mTitle->getDBkey();

		return $this->explodeParentTitleText( $key );
	}

	/**
	 * @brief Explodes string got from Title::getText() and returns its parent's text if exists
	 *
	 * @param string $titleText this is the text given from Title::getText()
	 *
	 * @return string | null if given $titleText is a parent's one returns null
	 */
	public function explodeParentTitleText( $titleText ) {

		$parts = explode( '/@', $titleText );

		if ( count( $parts ) < 3 ) return null;

		return $parts[0] . '/@' . $parts[1];
	}

	public function getTopParentObj() {
		$title = $this->getTopParent();

		if ( empty( $title ) ) return null;

		$title = Title::newFromText( $title, $this->mNamespace );

		if ( $title instanceof Title ) {
			$obj = ArticleComment::newFromTitle( $title );

			return $obj;
		}

		return null;
	}

	static public function getSurrogateKey( $articleId ) {
		global $wgCityId;
		return 'Wiki_' . $wgCityId . '_ArticleComments_' . $articleId;
	}

	/**
	 * Checks if article comments will be loading on demand.
	 *
	 * @return boolean
	 */
	static public function isLoadingOnDemand() {
		$app = F::app();
		return $app->wg->ArticleCommentsLoadOnDemand && !$app->checkSkin( 'wikiamobile' );
	}

	/**
	 * Checks if mini editor is enabled for article comments.
	 *
	 * @return boolean
	 */
	static public function isMiniEditorEnabled() {
		$app = F::app();
		return $app->wg->EnableMiniEditorExtForArticleComments && $app->checkSkin( [ 'oasis', 'venus' ] );
	}

	/**
	 * @desc Helper method returning true or false depending on fact if ArticleComments or Blogs are enabled
	 *
	 * @return bool
	 */
	static private function isCommentingEnabled() {
		global $wgEnableArticleCommentsExt, $wgEnableBlogArticles;

		return !empty( $wgEnableArticleCommentsExt ) || !empty( $wgEnableBlogArticles );
	}

	/**
	 * @desc Enables article and blog comments deletion for users who have commentdelete right but don't have delete
	 *
	 * @param Article $article
	 * @param Title $title
	 * @param User $user
	 * @param Array $permission_errors
	 *
	 * @return true because it's a hook
	 */
	static public function onBeforeDeletePermissionErrors( &$article, &$title, &$user, &$permission_errors ) {
		if ( self::isCommentingEnabled() &&
			$user->isAllowed( 'commentdelete' ) &&
			ArticleComment::isTitleComment( $title )
		) {
			foreach ( $permission_errors as $key => $errorArr ) {
				if ( self::isBadAccessError( $errorArr ) ) {
					unset( $permission_errors[$key] );
				}
			}
		}

		return true;
	}

	/**
	 * @desc Checks if $errors array have badaccess-groups or badaccess-group0 string
	 *
	 * @param Array $errors
	 *
	 * @return bool
	 */
	static private function isBadAccessError( $errors ) {
		return in_array( 'badaccess-groups', $errors ) || in_array( 'badaccess-group0', $errors );
	}

	/**
	 * Manages permissions related to article and blog comments
	 * Hook: userCan
	 *
	 * @param Title $title
	 * @param User $user
	 * @param string $action
	 * @param bool $result Whether $user can perform $action on $title
	 * @return bool Whether to continue checking hooks
	 */
	static public function userCan( Title &$title, User &$user, $action, &$result ) {
		$app = F::app();
		$commentsNS = $app->wg->ArticleCommentsNamespaces;
		$ns = $title->getNamespace();

		// Only handle article and blog comments
		if ( !in_array( MWNamespace::getSubject( $ns ), $commentsNS ) ||
			!ArticleComment::isTitleComment( $title ) ) {
			return true;
		}

		$comment = ArticleComment::newFromTitle( $title );
		$isBlog = ( $app->wg->EnableBlogArticles && ArticleComment::isBlog( $title ) );

		$return = true;
		switch ( $action ) {
			// Creating article comments requires 'commentcreate' permission
			// For blogs, additionally check if the owner has enabled commenting+
			case 'create':
				// We have to check these permissions on the parent article
				// due to the chicken-and-egg problem inherent in the design
				$result = self::userCanCommentOn( $comment->getArticleTitle(), $user );
				$return = false;
				break;
			// Article and blog comments can only be edited by their author,
			// or an user with 'commentedit' permission
			case 'edit':
				// Prepopulate the object with revision data
				// required by ArticleComment::isAuthor
				$comment->load( true );
				$result = ( $comment->isAuthor( $user ) || $user->isAllowed( 'commentedit' ) );
				$return = false;
				break;

			case 'move':
			case 'move-target':
				$result = $user->isAllowed( 'commentmove' );
				$return = false;
				break;

			case 'delete':
				$result = ( ArticleComment::isTitleComment( $title ) &&
					( $user->isAllowed( 'commentdelete' ) || $isBlog && $user->isAllowed( 'blog-comments-delete' ) )
				);
				$return = false;
			default:
		}

		return $return;
	}

	/**
	 * Check if user can add a comment to the current article
	 * We must perform this check on the article
	 * because of the chicken-and-egg problem inherent in the design
	 *
	 * @param Title $title Article title
	 * @param User|null $user Current user
	 * @return bool Whether $user can add a comment to $title
	 */
	static public function userCanCommentOn( Title $title, User $user = null ) {
		$app = F::app();
		if ( !( $user instanceof User ) ) {
			$user = $app->wg->User;
		}

		if ( wfReadOnly() ) {
			return false;
		}

		$isBlog = ( $app->wg->EnableBlogArticles && ArticleComment::isBlog( $title ) );
		if ( $isBlog ) {
			$props = BlogArticle::getProps( $title->getArticleID() );
			$commentingEnabled = isset( $props[ 'commenting' ] ) ? (bool) $props[ 'commenting' ] : true;
			return ( $user->isAllowed( 'commentcreate' ) && $commentingEnabled );
		} else {
			return ( $user->isAllowed( 'commentcreate' ) && ArticleCommentInit::ArticleCommentCheckTitle( $title ) );
		}
	}
}
