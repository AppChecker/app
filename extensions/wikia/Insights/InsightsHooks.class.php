<?php

class InsightsHooks {

	/**
	 * Check if article is in insights flow and init script to show banner with message and next steps
	 */
	public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
		global $wgRequest;

		$subpage = $wgRequest->getVal( 'insights', null );

		if ( InsightsHelper::isInsightPage( $subpage ) ) {
			$out->addScriptFile( '/extensions/wikia/Insights/scripts/LoopNotification.js' );
		}

		return true;
	}

	/**
	 * Add insight param to keep information about flow after edit
	 */
	public static function AfterActionBeforeRedirect( Article $article, &$sectionanchor, &$extraQuery ) {
		global $wgRequest;

		$subpage = $wgRequest->getVal( 'insights', null );

		if ( InsightsHelper::isInsightPage( $subpage ) ) {
			if ( !empty( $extraQuery ) ) {
				$extraQuery .= '&';
			}
			$extraQuery .= 'insights=' . $subpage;

			$model = InsightsHelper::getInsightModel( $subpage );
			$isItemFixed = $model->isItemFixed( $article );
			if ( $isItemFixed ) {
				$extraQuery .= '&item_status=fixed';
			} else {
				$extraQuery .= '&item_status=notfixed';
			}
		}

		return true;
	}

	/**
	 * Add insights param to edit page form to keep information about insights flow
	 */
	public static function onGetLocalURL( &$this, &$url, $query ) {
		global $wgRequest;

		$subpage = $wgRequest->getVal( 'insights', null );

		if ( InsightsHelper::isInsightPage( $subpage ) ) {
			$action = $wgRequest->getVal( 'action', 'view' );
			if ( $action == 'edit'  && $query == 'action=submit' ) {
				$url .= '&insights=' . $subpage;
			}
		}

		return true;
	}
} 
