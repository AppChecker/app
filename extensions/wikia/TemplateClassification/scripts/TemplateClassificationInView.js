/**
 * TemplateClassificationInView module
 *
 * Works for view page.
 *
 * Provides selected type for TemplateClassificationModal and handles type submit
 */
define('TemplateClassificationInView', ['jquery', 'mw', 'wikia.nirvana', 'wikia.tracker', 'TemplateClassificationModal', 'BannerNotification'],
	function ($, mw, nirvana, tracker, templateClassificationModal, BannerNotification) {
		'use strict';

		var $typeLabel;

		function init() {
			$typeLabel = $('.template-classification-type-text');
			templateClassificationModal.init(getType, sendClassifyTemplateRequest);

			$('.template-classification-edit').on('click', function() {
				tracker.track({
					trackingMethod: 'both',
					category: 'template-classification-entry-point',
					action: 'click',
					label: 'view-page'
				});
			});
		}

		function getType() {
			return $typeLabel.data('type');
		}

		function sendClassifyTemplateRequest(selectedTemplateType) {
			var previousType = getType();

			templateClassificationModal.updateEntryPointLabel(selectedTemplateType);

			nirvana.sendRequest({
				controller: 'TemplateClassificationApi',
				method: 'classifyTemplate',
				data: {
					pageId: mw.config.get('wgArticleId'),
					type: selectedTemplateType,
					editToken: mw.user.tokens.get('editToken')
				},
				callback: function() {
					var notification = new BannerNotification(
						mw.message('template-classification-edit-modal-success').escaped(),
						'success'
					);

					notification.show();
				},
				onErrorCallback: function() {
					templateClassificationModal.updateEntryPointLabel(previousType);
					animateOnError($typeLabel);

					var notification = new BannerNotification(
						mw.message('template-classification-edit-modal-error').escaped(),
						'error'
					);

					notification.show();
				}
			});
		}

		function animateOnError($element) {
			$element.addClass('template-classification-error');
			$element.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
				$element.removeClass('template-classification-error');
			});
		}

		return {
			init: init
		};
	}
);

require(['TemplateClassificationInView'], function (tc) {
	'use strict';
	$(tc.init);
});
