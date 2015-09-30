<?php

/**
 * This is a set of tools that automates the reporting of potential security problems
 *
 * @see PLATFORM-1491
 * @author macbre
 */

// register classes
$wgAutoloadClasses['Wikia\\Security\\CSRFDetector'] = __DIR__ . '/classes/CSRFDetector.class.php';
$wgAutoloadClasses['Wikia\\Security\\Exception'] = __DIR__ . '/classes/Exception.class.php';

// set per-request flags
$wgHooks['UserMatchEditToken'][] = 'Wikia\\Security\\CSRFDetector::onUserMatchEditToken';
$wgHooks['WebRequestWasPosted'][] = 'Wikia\\Security\\CSRFDetector::onRequestWasPosted';
$wgHooks['WikiaRequestWasPosted'][] = 'Wikia\\Security\\CSRFDetector::onRequestWasPosted';

// PLATFORM-1540: detect revision inserts not guarded by user's edit token check
$wgHooks['RevisionInsertComplete'][] = 'Wikia\\Security\\CSRFDetector::onRevisionInsertComplete';

// PLATFORM-1540: detect file uploads (local files and via URL) not guarded by user's edit token check
$wgHooks['UploadComplete'][] = 'Wikia\\Security\\CSRFDetector::onUploadComplete';
$wgHooks['UploadFromUrlReallyFetchFile'][] = 'Wikia\\Security\\CSRFDetector::onUploadFromUrlReallyFetchFile';

// PLATFORM-1540: detect user settings saves not guarded by user's edit token check
$wgHooks['UserSaveSettings'][] = 'Wikia\\Security\\CSRFDetector::onUserSaveSettings';
