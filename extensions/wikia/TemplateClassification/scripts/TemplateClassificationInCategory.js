/**
 * TemplateClassificationInView module
 *
 * Works for view page.
 *
 * Provides selected type for TemplateClassificationModal and handles type submit
 */
define('TemplateClassificationInCategory', ['jquery', 'mw', 'wikia.nirvana', 'wikia.tracker', 'TemplateClassificationModal', 'BannerNotification'],
	function ($, mw, nirvana, tracker, templateClassificationModal, BannerNotification) {
		'use strict';

		function init() {
			templateClassificationModal.init(getType, sendClassifyTemplatesRequest, 'bulkEditType');

			$('.template-classification-type-text').on('mousedown', function () {
				tracker.track({
					trackingMethod: 'analytics',
					category: 'template-classification-entry-point',
					action: tracker.ACTIONS.CLICK,
					label: 'category-view-page'
				});
			});
		}

		function getType() {
			return '';
		}

		function sendClassifyTemplatesRequest(selectedTemplateType) {
			nirvana.sendRequest({
				controller: 'TemplateClassification',
				method: 'classifyTemplateByCategory',
				data: {
					type: selectedTemplateType,
					category: mw.config.get('wgTitle'),
					editToken: mw.user.tokens.get('editToken')
				},
				callback: function (response) {
					var message;



					if ( response.notification.length ) {
						message = response.notification;
					} else {
						message = mw.message('template-classification-edit-modal-success').escaped();
					}

					new BannerNotification(
						message,
						'confirm'
					).show();
				},
				onErrorCallback: function (response) {
					var errorMessage, e;

					if (response.responseText.length) {
						e = $.parseJSON(response.responseText);
						errorMessage = e.exception.message;
					} else {
						errorMessage = mw.message('template-classification-edit-modal-error').escaped();
					}

					new BannerNotification(errorMessage, 'error').show();
				}
			});
		}

		return {
			init: init
		};
	}
);

require(['TemplateClassificationInCategory'], function (tc) {
	'use strict';
	$(tc.init);
});
