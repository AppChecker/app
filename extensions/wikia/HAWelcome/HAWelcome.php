<?php

/**
 * HAWelcomeJob -- Welcome user after first edit
 *
 * @file
 * @ingroup JobQueue
 *
 * @copyright Copyright © Krzysztof Krzyżaniak for Wikia Inc.
 * @author Krzysztof Krzyżaniak (eloy) <eloy@wikia-inc.com>
 * @date 2009-02-02
 * @version 0.1
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is a MediaWiki extension and cannot be used standalone.\n";
	exit( 1 );
}

$wgExtensionCredits['other'][] = array(
	'name' => 'HAWelcome',
	'version' => '0.1',
	'author' => 'Krzysztof Krzyźaniak',
	'description' => 'Highly Automated Welcome Tool ',
);


/**
 * used hooks
 */
$wgHooks[ "RevisionInsertComplete" ][]	= "HAWelcomeJob::revisionInsertComplete";

/**
 * register job class
 */
$wgJobClasses[ "HAWelcome" ] = "HAWelcomeJob";

/**
 * used messages
 */
$wgExtensionMessagesFiles["HAWelcome"] = dirname(__FILE__) . '/HAWelcome.i18n.php';

class HAWelcomeJob extends Job {

	private
		$mUser,
		$mAnon,
		$mSysop;

	/**
	 * Construct a job
	 * @param Title $title The title linked to
	 * @param array $params Job parameters (table, start and end page_ids)
	 * @param integer $id job_id
	 */
	public function __construct( $title, $params, $id = 0 ) {
		Wikia::log( __METHOD__, $params );
		wfLoadExtensionMessages( "HAWelcome" );
		parent::__construct( "HAWelcome", $title, $params, $id );
		$user_id = $params[ "user_id" ];

		$this->mAnon = (bool )$params[ "is_anon" ];
		$this->mUser = User::newFromId( $user_id );
	}

	/**
	 * main entry point
	 *
	 * @access public
	 */
	public function run() {
		global $wgUser, $wgDevelEnvironment;

		wfProfileIn( __METHOD__ );
		/**
		 * overwrite $wgUser for ~~~~ expanding
		 */
		$tmpUser = $wgUser;
		$wgUser  = User::newFromName( "Wikia" );

		if( $this->mUser ) {
			/**
			 * check again if talk page exists
			 */
			$talkPage  = $this->mUser->getUserPage()->getTalkPage();
			if( $talkPage ) {
				$sysop     = $this->getLastSysop();
				$sysopPage = $sysop->getUserPage()->getTalkPage();
				$signature = $this->expandSig();

				$talkArticle = new Article( $talkPage, 0 );

				if( ! $talkArticle->exists() || $wgDevelEnvironment ) {
					if( $this->mAnon ) {
						$welcomeMsg = wfMsg( "hawelcome-message-anon", array(
							sprintf("%s:%s", $this->title->getNsText(), $this->title->getText() ),
							sprintf("%s:%s", $sysopPage->getNsText(), $sysopPage->getText() ),
							$signature
						));
					}
					else {
						$welcomeMsg = wfMsg( "hawelcome-message-user", array(
							sprintf("%s:%s", $this->title->getNsText(), $this->title->getText() ),
							sprintf("%s:%s", $sysopPage->getNsText(), $sysopPage->getText() ),
							$signature
						));
					}
					$talkArticle->doEdit( $welcomeMsg, wfMsg( "hawelcome-message-log" ) );
				}
			}
		}

		$wgUser = $tmpUser;
		wfProfileOut( __METHOD__ );

		return true;
	}

	/**
	 * get last active sysop for this wiki, use local user database and blobs
	 * from dataware
	 *
	 * @access public
	 */
	public function getLastSysop() {
		global $wgCityId;

		wfProfileIn( __METHOD__ );

		if( ! $this->mSysop instanceof User ) {
			$dbr = wfGetDBExt( DB_SLAVE );
			$Row = $dbr->selectRow(
				array( "city_local_users", "blobs" ),
				array( "rev_timestamp", "lu_user_id" ),
				array(
					"lu_user_id = rev_user",
					"lu_allgroups like '%sysop%'",
					"rev_wikia_id" => $wgCityId
				),
				__METHOD__,
				array( "order by" => "rev_timestamp desc" )
			);

			$this->mSysop = User::newFromId( $Row->lu_user_id );
		}

		wfProfileOut( __METHOD__ );

		return $this->mSysop;
	}

	/**
	 * revisionInsertComplete
	 *
	 * static method called as hook
	 *
	 * @static
	 * @access public
	 *
	 * @param Revision	$revision	revision object
	 * @param string	$url		url to external object
	 * @param string	$flags		flags for this revision
	 *
	 * @return true means process other hooks
	 */
	public static function revisionInsertComplete( &$revision, &$url, &$flags ) {
		global $wgTitle, $wgUser, $wgDevelEnvironment;

		wfProfileIn( __METHOD__ );
		if( trim( wfMsg( "hawelcome" ) ) !== "@disabled" ) {
			/**
			 * check if talk page for wgUser exists
			 *
			 * @todo check editcount for user
			 */
			$talkPage = $wgUser->getUserPage()->getTalkPage();
			if( $talkPage ) {
				$talkArticle = new Article( $talkPage, 0 );
				if( !$talkArticle->exists( ) || $wgDevelEnvironment ) {
					$welcomeJob = new HAWelcomeJob(
						$wgTitle,
						array(
							"is_anon" => $wgUser->isAnon(),
							"user_id" => $wgUser->getId(),
							"user_name" => $wgUser->getName(),
						)
					);
					$welcomeJob->insert();
				}
			}
		}
		wfProfileOut( __METHOD__ );

		return true;
	}

	/**
	 * expandSig -- hack, expand signature from message for sysop
	 *
	 * @access private
	 */
	private function expandSig( ) {

		global $wgContLang, $wgUser;

		wfProfileIn( __METHOD__ );

		$Sysop = $this->getLastSysop();
		$tmpUser = $wgUser;
		$wgUser = $Sysop;
		$signature = sprintf(
			"-- [[User:%s|%s]] ([[User talk:%s|%s]]) %s",
			wfEscapeWikiText( $Sysop->getName() ),
			wfEscapeWikiText( $Sysop->getName() ),
			wfEscapeWikiText( $Sysop->getName() ),
			wfMsg( "talkpagelinktext" ),
			$wgContLang->timeanddate( wfTimestampNow( TS_MW ) )
		);
		$wgUser = $tmpUser;

		wfProfileOut( __METHOD__ );

		return $signature;
	}

	/**
	 * @access public
	 *
	 * @return Title instance of Title object
	 */
	public function getTitle() {
		return $this->title;
	}
}
