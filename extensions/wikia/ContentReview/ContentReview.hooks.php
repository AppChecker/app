<?php

namespace Wikia\ContentReview;

use Wikia\ContentReview\Helper;
use Wikia\ContentReview\Models\CurrentRevisionModel;
use Wikia\ContentReview\Models\ReviewModel;

class Hooks {
	const CONTENT_REVIEW_MONOBOOK_DROPDOWN_ACTION = 'content-review';

	public static function onGetRailModuleList( Array &$railModuleList ) {
		global $wgCityId, $wgTitle;

		if ( self::userCanEditJsPage() ) {
			$pageStatus = \F::app()->sendRequest(
				'ContentReviewApiController',
				'getPageStatus',
				[
					'wikiId' => $wgCityId,
					'pageId' => $wgTitle->getArticleID(),
				],
				true
			)->getData();

			$railModuleList[1403] = [ 'ContentReviewModule', 'Render', [
				'pageStatus' => $pageStatus,
				'latestRevisionId' => $wgTitle->getLatestRevID(),
			] ];
		}

		return true;
	}

	public static function onMakeGlobalVariablesScript( &$vars ) {
		$helper = new Helper();

		$vars['wgContentReviewExtEnabled'] = true;
		$vars['wgContentReviewTestModeEnabled'] = $helper->isContentReviewTestModeEnabled();
		$vars['wgReviewedScriptsTimestamp'] = $helper->getReviewedJsPagesTimestamp();
		$vars['wgScriptsTimestamp'] = $helper->getJsPagesTimestamp();

		return true;

	}

	public static function onBeforePageDisplay( \OutputPage $out, \Skin $skin ) {
		$helper = new Helper();

		/* Add assets for custom JS test mode */
		if ( $helper->isContentReviewTestModeEnabled() || self::userCanEditJsPage() ) {
			\Wikia::addAssetsToOutput( 'content_review_test_mode_js' );
			\JSMessages::enqueuePackage( 'ContentReviewTestMode', \JSMessages::EXTERNAL );
		}

		/* Add Content Review Module assets for Monobook  */
		if ( self::userCanEditJsPage() ) {
			\Wikia::addAssetsToOutput('content_review_module_monobook_js');
			\Wikia::addAssetsToOutput('content_review_module_monobook_scss');
		}

		return true;
	}

	public static function onArticleContentOnDiff( $diffEngine, \OutputPage $output ) {
		$helper = new Helper();

		if ( $helper->shouldDisplayReviewerToolbar() ) {
			\Wikia::addAssetsToOutput( 'content_review_diff_page_js' );
			\Wikia::addAssetsToOutput( 'content_review_diff_page_scss' );
			\JSMessages::enqueuePackage( 'ContentReviewDiffPage', \JSMessages::EXTERNAL );

			$output->prependHTML( $helper->getToolbarTemplate() );
		}

		return true;
	}

	/**
	 * Replace content shown on raw action for JS pages with last approved revision
	 * @param \RawAction $rawAction
	 * @param $text
	 * @return bool
	 */
	public static function onRawPageViewBeforeOutput( \RawAction $rawAction, &$text ) {
		global $wgCityId, $wgJsMimeType;

		$title = $rawAction->getTitle();

		if ( $title->inNamespace( NS_MEDIAWIKI )
			&& ( $title->isJsPage() || $rawAction->getContentType() == $wgJsMimeType )
		) {
			$pageId = $title->getArticleID();
			$latestRevId = $title->getLatestRevID();

			$latestReviewedRev = ( new CurrentRevisionModel() )->getLatestReviewedRevision( $wgCityId, $pageId );
			$helper = new Helper();

			if ( $latestReviewedRev['revision_id'] != $latestRevId
				&& !$helper->isContentReviewTestModeEnabled()
			) {
				$revision = \Revision::newFromId( $latestReviewedRev['revision_id'] );

				if ( $revision ) {
					$text = $revision->getRawText();
				} else {
					$text = '';
				}
			}
		}

		return true;
	}

	/*
	 * Adds review status item to top nav tabs in Monobook skin.
	 * This is an entrypoint for checking review status and submitting changes for review/
	 * This is attached to the MediaWiki 'SkinTemplateNavigation' hook.
	 * @param SkinTemplate $skin Object of specific skin class that extends SkinTemplate
	 * @param array $links Navigation links
	 * @return bool true
	 */
	public static function onSkinTemplateNavigation( \SkinTemplate $skin, &$links ) {
		global $wgCityId;
		if ( !in_array( $skin->getSkinName(), [ 'monobook', 'uncyclopedia' ] )  || !self::userCanEditJsPage() ) {
			return true;
		}

		$title = $skin->getTitle();
		$latestRevisionId = $title->getLatestRevID();
		$revisionModel = new ReviewModel();
		$revisionInfo = $revisionModel->getRevisionInfo( $wgCityId, $title->getArticleID(), $latestRevisionId );
		$latestStatusName = $revisionModel->getStatusName( $revisionInfo['status'], $latestRevisionId );

		/* Add link to nav tabs customized with status class name */
		$links['views'][self::CONTENT_REVIEW_MONOBOOK_DROPDOWN_ACTION] = [
			'href' => '#',
			'text' => wfMessage( 'content-review-status-link-text' )->escaped(),
			'class' => 'content-review-status ' . 'content-review-cactions-status-' . $latestStatusName,
		];

		return true;
	}

	public static function onUserLogoutComplete( \User $user, &$injected_html, $oldName) {
		$request = $user->getRequest();

		$key = \ContentReviewApiController::CONTENT_REVIEW_TEST_MODE_KEY;
		$wikis = $request->getSessionData( $key );

		if ( !empty( $wikis ) ) {
			$request->setSessionData( $key, null );
		}

		return true;
	}

	public static function onArticleSaveComplete( \WikiPage &$article, &$user, $text, $summary,
			$minoredit, $watchthis, $sectionanchor, &$flags, $revision, &$status, $baseRevId
	) {
		$title = $article->getTitle();

		if ( !is_null( $title )
			&& $title->inNamespace( NS_MEDIAWIKI )
			&& ( $title->isJsPage() || $title->isJsSubpage() )
		) {
			( new Helper() )->purgeCurrentJsPagesTimestamp();
		}

		return true;
	}

	private static function userCanEditJsPage() {
		global $wgTitle, $wgUser;

		return $wgTitle->inNamespace( NS_MEDIAWIKI ) && $wgTitle->isJsPage() && $wgTitle->userCan( 'edit', $wgUser );
	}
}
