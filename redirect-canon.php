<?php

/**
 * $_SERVER['REQUEST_URI'] holds the actual path from the URL including the leading slash
 *
 * We need to remove the leading slash(es). We also add a '_' at the end of it and pass it
 * as the 'title' param to the index.php script. It recognizes it as an incorrect title
 * and issues a redirect to the canonical one.
 *
 * In the apache configuration just say "ErrorDocument 404 redirect-canon.php"
 *
 * This simple file replaces the whole Our404Handler extension
 */

$_GET['title'] = preg_replace(':^/*:', '', $_SERVER['REQUEST_URI']) . '_';
require 'index.php';
