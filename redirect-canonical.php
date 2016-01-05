<?php

/**
 * $_SERVER['REQUEST_URI'] holds the actual path from the URL including the leading slash
 *
 * We need to remove the leading slash(es). We also add a '_' at the end of it and pass it
 * as the 'title' param to the index.php script. It recognizes it as an incorrect title
 * and issues a redirect to the canonical one. We also pass the other GET params after
 * parsing the URL query part.
 *
 * In the apache configuration just say "ErrorDocument 404 redirect-canon.php"
 *
 * This simple file replaces the whole Our404Handler extension
 */

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url( $uri, PHP_URL_PATH );
$query = parse_url( $uri, PHP_URL_QUERY );

parse_str( $query, $_GET );
$_GET['title'] = preg_replace( ':^/*:', '', $path ) . '_';

require( 'index.php' );
