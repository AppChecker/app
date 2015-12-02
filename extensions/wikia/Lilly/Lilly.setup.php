<?php

// Autoload
$wgAutoloadClasses['LillyHooks'] =  __DIR__ . '/LillyHooks.class.php';

// Hooks
$wgHooks['LinkerMakeExternalLink'][] = 'LillyHooks::onLinkerMakeExternalLink';
$wgHooks['LinkEnd'][] = 'LillyHooks::onLinkEnd';
