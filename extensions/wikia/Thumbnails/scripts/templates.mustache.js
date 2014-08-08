define( 'thumbnails.templates.mustache', [], function() { 'use strict'; return {
    "Thumbnail_articleBlock" : '<figure class="article-thumb {{figureClass}} {{#showInfoIcon}}show-info-icon{{/showInfoIcon}}" style="width: {{width}}px">{{{thumbnail}}}<figcaption>{{#showInfoIcon}}<a href="{{filePageLink}}" class="sprite info-icon"></a>{{/showInfoIcon}}{{#title}}<p class="title">{{title}}</p>{{/title}}{{#caption}}<p class="caption">{{{caption}}}</p>{{/caption}}</figcaption></figure>',
    "Thumbnail_image" : '{{#linkHref}}<ahref="{{linkHref}}"class="image image-thumbnail{{#linkClasses}} {{.}}{{/linkClasses}}"{{#linkAttrs}} {{{.}}}{{/linkAttrs}}>{{/linkHref}}{{>Thumbnail_imgTag}}{{#noscript}}<noscript>{{{noscript}}}</noscript>{{/noscript}}{{#metaAttrs}}<meta itemprop="{{itemprop}}" content="{{content}}">{{/metaAttrs}}{{#linkHref}}</a>{{/linkHref}}',
    "Thumbnail_imgTag" : '<imgsrc="{{imgSrc}}"{{#alt}}alt="{{{alt}}}"{{/alt}}{{#imgClass}}class="{{imgClass}}"{{/imgClass}}data-{{mediaType}}-key="{{mediaKey}}"data-{{mediaType}}-name="{{mediaName}}"{{#dataSrc}}data-src="{{dataSrc}}"{{/dataSrc}}{{#imgWidth}}width="{{imgWidth}}"{{/imgWidth}}{{#imgHeight}}height="{{imgHeight}}"{{/imgHeight}}{{#imgAttrs}} {{{.}}}{{/imgAttrs}}>',
    "Thumbnail_title" : '{{{thumbnail}}}<div class="title" title="{{title}}"><a href="{{url}}">{{title}}</a></div>',
    "Thumbnail_video" : '<ahref="{{linkHref}}"class="video video-thumbnail {{size}} {{#linkClasses}}{{.}} {{/linkClasses}}"{{#linkAttrs}} {{{.}}}{{/linkAttrs}}>{{>Thumbnail_imgTag}}{{#noscript}}<noscript>{{{noscript}}}</noscript>{{/noscript}}<span class="duration" {{#durationAttrs}}{{{.}}} {{/durationAttrs}}>{{duration}}</span><span class="play-circle"></span>{{#metaAttrs}}<meta itemprop="{{itemprop}}" content="{{content}}">{{/metaAttrs}}</a>',
    "annotationForm" : '<div class="form-item columns small-4"><div class="input-group"><label for="start">Start Time</label><input type="text" name="start" class="start-time" value="{{startTime}}"></div><div class="input-group"><label for="duration">Duration (in seconds)</label><input type="text" name="duration" class="duration" value="{{duration}}"></div><div class="input-group"><label for="message">Annotation</label><textarea name="message" class="message">{{message}}</textarea></div></div>',
    "done": "true"
  }; });