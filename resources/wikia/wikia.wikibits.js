(function( window, $ ) {

/**
 * Import JavaScript and Stylesheet articles from any wiki.
 * @author Kyle Florence <kflorence@wikia-inc.com>
 *
 * >> Examples:
 *
 * // Importing a single Stylesheet from the local wiki
 * importArticle({
 *     type: "style",
 *     article: "Mediawiki:MyCustomStyles.css"
 * });
 *
 * // Importing multiple JavaScript files from an external wiki
 * importArticles({
 *     type: "script",
 *     articles: [
 *         "Mediawiki:MyCustomJavaScript.js",
 *         "w:starwars:Mediawiki:External.js"
 *     ]
 * });
 *
 * @param {...Object} Any number of modules to load.
 * @returns {Array} An array of DOM nodes used for injection.
 */
var importArticle = (function() {
	var baseUri = mw.config.get( 'wgLoadScript' ) + '?',
		defaults = {
			debug: mw.config.get( 'debug' ),
			lang: mw.config.get( 'wgUserLanguage' ),
			mode: 'articles',
			skin: mw.config.get( 'skin' ),
			missingCallback: 'importNotifications.importArticleMissing'
		},
		loaded = {},
		slice = [].slice;

	function log( text ) {
		return $().log( text, 'importArticle' );
	}

	return function() {
		var i, l, module, uri,
			modules = slice.call(arguments),
			result = [];

		for ( i = 0, l = modules.length; i < l; i++ ) {
			module = $.extend( {}, defaults, modules[ i ] );

			// Resource loader expects "articles" param
			module.articles = module.article || module.articles;
			delete module.article;

			if ( !module.articles || !module.articles.length ) {
				log( 'Missing required argument: articles' );
				continue;
			}

			// Resource loader expects pipe separated article names
			if ( $.isArray( module.articles ) ) {
				module.articles = module.articles.join( '|' );
			}

			if ( mw.config.get('wgContentReviewExtEnabled') ) {
				if ( module.articles.search(/mediawiki:/i) != -1 ) {
					if ( mw.config.get('wgContentReviewTestModeEnabled') ) {
						module.current = mw.config.get('wgScriptsTimestamp');
					} else {
						module.reviewed = mw.config.get('wgReviewedScriptsTimestamp');
					}
				}
			}

			// These import methods are in /skins/common/wikibits.js
			var importMethod;
			if ( module.type == 'script' ) {
				importMethod = window.importScriptURI;

			} else if ( module.type == 'style' ) {
				importMethod = window.importStylesheetURI;
			}

			if ( !importMethod ) {
				log( 'Invalid article type: ' + ( module.type || '(none provided)' ) );
				continue;
			}

			// Resource loader expects "only" param instead of "type"
			module.only = module.type + 's';
			delete module.type;

			uri = baseUri + $.param( module );

			// Make sure we don't load the same URI again
			if ( loaded[ uri ] ) {
				continue;
			}

			loaded[ uri ] = true;

			// Inject request into DOM
			result.push( importMethod( uri ) );
		}

		return result;
	}
}());

/**
 * Notify users about missing user-supplied assets.
 * @author Wladyslaw Bodzek
 * @author Kamil Koterba
 *
 * @param {Array} The names of the missing assets
 */
var importNotifications = (function() {
	var reportMissing = ( $.isArray( window.wgUserGroups )
			&& ( $.inArray( 'staff', window.wgUserGroups ) > -1
			|| $.inArray( 'sysop', window.wgUserGroups ) > -1
			|| $.inArray( 'bureaucrat', window.wgUserGroups ) > -1 ) ),
		missingText = {
			single:  'import-article-missing-single',
			multiple: 'import-article-missing-multiple'
		},
		moreText = {
			single: 'import-article-missing-more-single',
			multiple: 'import-article-missing-more-multiple'
		},
		notJsText = {
			single:  'import-article-not-js-single',
			multiple: 'import-article-not-js-multiple'
		};

	function showBannerNotification(articles, baseText) {
		var missingLength;

		// Don't show notificaton for regular users
		if (!reportMissing) {
			return;
		}

		if (!$.isArray(articles)) {
			articles = [articles];
		}

		// Use BannerNotification to show the error to the user
		if (window.BannerNotification && (missingLength = articles.length)) {
			var moreLength = missingLength - 1,
				baseMessageName = baseText[ missingLength < 2 ? 'single' : 'multiple' ],
				moreMessageName = moreText[ moreLength < 2 ? 'single' : 'multiple'],
				message;

			message = mw.message(baseMessageName).params([
				'"' + articles[0] + '"',
				mw.message(moreMessageName).params([moreLength]).escaped()
			]).escaped();

			$(function () {
				new window.BannerNotification(message, 'error').show();
			});
		}
	}

	function importArticleMissing(missing) {
		showBannerNotification(missing, missingText);
	}

	function importNotJsFailed(missing) {
		showBannerNotification(missing, notJsText);
	}

	return {
		importArticleMissing: importArticleMissing,
		importNotJsFailed: importNotJsFailed
	};
}());

/**
 * Imports script from provided JS page name
 * Page has to be in MediaWiki namespace and has .js extension
 *
 * Article name can point a page on other wikia (e.g. 'external:otherwikiasubdomain:Pagename.js')
 *
 * @param {array} articles Names of pages to import without namespace prefix
 */
var importWikiaScriptPages = (function () {
	var namespacePrefix = 'MediaWiki:',
		externalPrefix = 'external:',
		externalPrefixLength = externalPrefix.length;

	function importWikiaScriptPages(articles) {
		var articlesToImport = [],
			articlesFailed = [];

		if (!$.isArray(articles)) {
			articles = [articles];
		}

		for (var i = 0; i < articles.length; i++) {
			if (!isJsPage(articles[i])) {
				articlesFailed.push(namespacePrefix + articles[i]);
				continue;
			}
			if (isExternal(articles[i])) {
				var articlePreparedName = prepareExternalArticleName(articles[i]);
				if (articlePreparedName.length === 0) {
					articlesFailed.push(articles[i]);
					continue;
				}
				articlesToImport.push(articlePreparedName);
				continue;
			}
			articlesToImport.push(namespacePrefix + articles[i]);
		}

		window.importNotifications.importNotJsFailed(articlesFailed);

		window.importArticles({
			type: 'script',
			articles: articlesToImport
		});
	}

	function isJsPage(scriptName) {
		return scriptName.substr(scriptName.length - 3) === '.js';
	}

	function isExternal(scriptName) {
		return scriptName.substr(0, externalPrefixLength) === externalPrefix;
	}

	function prepareExternalArticleName(articleName) {
		var indexOfSubdomain = articleName.indexOf(':', externalPrefixLength) + 1,
			articlePreparedName = '';

		if (indexOfSubdomain === 0) {
			// Subdomain not provided
			return articlePreparedName;
		}

		// Inject namespace after subdomain
		articlePreparedName = articleName.slice(0,indexOfSubdomain) +
			namespacePrefix +
			articleName.slice(indexOfSubdomain);

		return articlePreparedName;
	}

	return importWikiaScriptPages;
}());

// Exports
window.importArticle = window.importArticles = importArticle;
window.importNotifications = importNotifications;
window.importWikiaScriptPages = importWikiaScriptPages;

})( this, jQuery );
