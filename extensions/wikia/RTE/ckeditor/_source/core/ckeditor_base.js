﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @fileOverview Contains the first and essential part of the {@link CKEDITOR}
 *		object definition.
 */

// #### Compressed Code
// Must be updated on changes in the script as well as updated in the
// ckeditor_source.js and ckeditor_basic_source.js files.

// if(!window.CKEDITOR)window.CKEDITOR=(function(){var a={timestamp:'',version:'%VERSION%',rev:'%REV%',_:{},status:'unloaded',basePath:(function(){var d=window.CKEDITOR_BASEPATH||'';if(!d){var e=document.getElementsByTagName('script');for(var f=0;f<e.length;f++){var g=e[f].src.match(/(^|.*[\\\/])ckeditor(?:_basic)?(?:_source)?.js(?:\?.*)?$/i);if(g){d=g[1];break;}}}if(d.indexOf(':/')==-1)if(d.indexOf('/')===0)d=location.href.match(/^.*?:\/\/[^\/]*/)[0]+d;else d=location.href.match(/^[^\?]*\/(?:)/)[0]+d;return d;})(),getUrl:function(d){if(d.indexOf(':/')==-1&&d.indexOf('/')!==0)d=this.basePath+d;if(this.timestamp&&d.charAt(d.length-1)!='/')d+=(d.indexOf('?')>=0?'&':'?')+('t=')+this.timestamp;return d;}},b=window.CKEDITOR_GETURL;if(b){var c=a.getUrl;a.getUrl=function(d){return b.call(a,d)||c.call(a,d);};}return a;})();

// #### Raw code
// ATTENTION: read the above "Compressed Code" notes when changing this code.

if ( !window.CKEDITOR )
{
	/**
	 * @name CKEDITOR
	 * @namespace This is the API entry point. The entire CKEditor code runs under this object.
	 * @example
	 */
	window.CKEDITOR = (function()
	{
		var CKEDITOR =
		/** @lends CKEDITOR */
		{

			/**
			 * A constant string unique for each release of CKEditor. Its value
			 * is used, by default, to build the URL for all resources loaded
			 * by the editor code, guaranteeing clean cache results when
			 * upgrading.
			 * @type String
			 * @example
			 * alert( CKEDITOR.timestamp );  // e.g. '87dm'
			 */
			timestamp : '',				// %REMOVE_LINE%
			/*							// %REMOVE_LINE%
			// The production implementation contains a fixed timestamp, unique
			// for each release and generated by the releaser.
			// (Base 36 value of each component of YYMMDDHH - 4 chars total - e.g. 87bm == 08071122)
			timestamp : '%TIMESTAMP%',
			 */							// %REMOVE_LINE%

			/**
			 * Contains the CKEditor version number.
			 * @type String
			 * @example
			 * alert( CKEDITOR.version );  // e.g. 'CKEditor 3.4.1'
			 */
			version : '%VERSION%',

			/**
			 * Contains the CKEditor revision number.
			 * The revision number is incremented automatically, following each
			 * modification to the CKEditor source code.
			 * @type String
			 * @example
			 * alert( CKEDITOR.revision );  // e.g. '3975'
			 */
			revision : '%REV%',

			/**
			 * Private object used to hold core stuff. It should not be used outside of
			 * the API code as properties defined here may change at any time
			 * without notice.
			 * @private
			 */
			_ : {},

			/**
			 * Indicates the API loading status. The following statuses are available:
			 *		<ul>
			 *			<li><b>unloaded</b>: the API is not yet loaded.</li>
			 *			<li><b>basic_loaded</b>: the basic API features are available.</li>
			 *			<li><b>basic_ready</b>: the basic API is ready to load the full core code.</li>
			 *			<li><b>loading</b>: the full API is being loaded.</li>
			 *			<li><b>loaded</b>: the API can be fully used.</li>
			 *		</ul>
			 * @type String
			 * @example
			 * if ( <b>CKEDITOR.status</b> == 'loaded' )
			 * {
			 *     // The API can now be fully used.
			 * }
			 */
			status : 'unloaded',

			/**
			 * Contains the full URL for the CKEditor installation directory.
			 * It is possible to manually provide the base path by setting a
			 * global variable named CKEDITOR_BASEPATH. This global variable
			 * must be set <strong>before</strong> the editor script loading.
			 * @type String
			 * @example
			 * alert( <b>CKEDITOR.basePath</b> );  // "http://www.example.com/ckeditor/" (e.g.)
			 */
			basePath : (function()
			{
				// ATTENTION: fixes to this code must be ported to
				// var basePath in "core/loader.js".

				// Find out the editor directory path, based on its <script> tag.
				var path = window.CKEDITOR_BASEPATH || '';

				if ( !path )
				{
					var scripts = document.getElementsByTagName( 'script' );

					for ( var i = 0 ; i < scripts.length ; i++ )
					{
						var match = scripts[i].src.match( /(^|.*[\\\/])ckeditor(?:_basic)?(?:_source)?.js(?:\?.*)?$/i );

						if ( match )
						{
							path = match[1];
							break;
						}
					}
				}

				// In IE (only) the script.src string is the raw value entered in the
				// HTML source. Other browsers return the full resolved URL instead.
				if ( path.indexOf(':/') == -1 )
				{
					// Absolute path.
					if ( path.indexOf( '/' ) === 0 )
						path = location.href.match( /^.*?:\/\/[^\/]*/ )[0] + path;
					// Relative path.
					else
						path = location.href.match( /^[^\?]*\/(?:)/ )[0] + path;
				}

				if ( !path )
						throw 'The CKEditor installation path could not be automatically detected. Please set the global variable "CKEDITOR_BASEPATH" before creating editor instances.';

				return path;
			})(),

			/**
			 * Gets the full URL for CKEditor resources. By default, URLs
			 * returned by this function contain a querystring parameter ("t")
			 * set to the {@link CKEDITOR.timestamp} value.<br />
			 * <br />
			 * It is possible to provide a custom implementation of this
			 * function by setting a global variable named CKEDITOR_GETURL.
			 * This global variable must be set <strong>before</strong> the editor script
			 * loading. If the custom implementation returns nothing (==null), the
			 * default implementation is used.
			 * @param {String} resource The resource whose full URL we want to get.
			 *		It may be a full, absolute, or relative URL.
			 * @returns {String} The full URL.
			 * @example
			 * // e.g. http://www.example.com/ckeditor/skins/default/editor.css?t=87dm
			 * alert( CKEDITOR.getUrl( 'skins/default/editor.css' ) );
			 * @example
			 * // e.g. http://www.example.com/skins/default/editor.css?t=87dm
			 * alert( CKEDITOR.getUrl( '/skins/default/editor.css' ) );
			 * @example
			 * // e.g. http://www.somesite.com/skins/default/editor.css?t=87dm
			 * alert( CKEDITOR.getUrl( 'http://www.somesite.com/skins/default/editor.css' ) );
			 */
			getUrl : function( resource )
			{
				// If this is not a full or absolute path.
				if ( resource.indexOf(':/') == -1 && resource.indexOf( '/' ) !== 0 )
					resource = this.basePath + resource;

				// Add the timestamp, except for directories.
				if ( this.timestamp && resource.charAt( resource.length - 1 ) != '/' && !(/[&?]t=/).test( resource ) )
					resource += ( resource.indexOf( '?' ) >= 0 ? '&' : '?' ) + 't=' + this.timestamp;

				return resource;
			}
		};

		// Make it possible to override the getUrl function with a custom
		// implementation pointing to a global named CKEDITOR_GETURL.
		var newGetUrl = window.CKEDITOR_GETURL;
		if ( newGetUrl )
		{
			var originalGetUrl = CKEDITOR.getUrl;
			CKEDITOR.getUrl = function ( resource )
			{
				return newGetUrl.call( CKEDITOR, resource ) ||
					originalGetUrl.call( CKEDITOR, resource );
			};
		}

		return CKEDITOR;
	})();
}

/**
 * Function called upon loading a custom configuration file that can
 * modify the editor instance configuration ({@link CKEDITOR.editor#config }).
 * It is usually defined inside the custom configuration files that can
 * include developer defined settings.
 * @name CKEDITOR.editorConfig
 * @function
 * @param {CKEDITOR.config} config A configuration object containing the
 *		settings defined for a {@link CKEDITOR.editor} instance up to this
 *		function call. Note that not all settings may still be available. See
 *		<a href="http://docs.cksource.com/CKEditor_3.x/Developers_Guide/Setting_Configurations#Configuration_Loading_Order">Configuration Loading Order</a>
 *		for details.
 * @example
 * // This is supposed to be placed in the config.js file.
 * CKEDITOR.editorConfig = function( config )
 * {
 *     // Define changes to default configuration here. For example:
 *     config.language = 'fr';
 *     config.uiColor = '#AADC6E';
 * };
 */

// PACKAGER_RENAME( CKEDITOR )
