require(['jquery', 'mw', 'wikia.loader', 'wikia.nirvana'],
function ($, mw, loader, nirvana) {
	'use strict';

	var modalConfig;

	function init() {
		$('.template-classification-edit').click(function (e) {
			e.preventDefault();

			$.when(
				nirvana.sendRequest({
					controller: 'TemplateClassification',
					method: 'getTemplateClassificationEditForm',
					type: 'get',
					format: 'html'
				}),
				nirvana.sendRequest({
					controller: 'TemplateClassificationMockApi',
					method: 'getTemplateType',
					type: 'get',
					data: {
						'articleId': mw.config.get('wgArticleId')
					}
				}),
				loader({
					type: loader.MULTI,
					resources: {
						messages: 'TemplateClassificationModal'
					}
				})
			).done(
				function (classificationForm, templateType, loaderRes) {
					mw.messages.set(loaderRes.messages);

					var type = templateType[0].type,
						$cf = $(classificationForm[0]);

					// Mark selected type
					$cf.find('input[value="' + mw.html.escape(type) + '"]').attr('checked', 'checked');

					// Set modal content
					setupTemplateClassificationModal($cf[0].outerHTML);

					require(['wikia.ui.factory'], function (uiFactory) {
						/* Initialize the modal component */
						uiFactory.init(['modal']).then(createComponent);
					});
				}
			);
		});
	}

	/**
	 * Creates modal UI component
	 * One of sub-tasks for getting modal shown
	 */
	function createComponent(uiModal) {
		/* Create the wrapping JS Object using the modalConfig */
		uiModal.createComponent(modalConfig, processInstance);
	}

	/**
	 * CreateComponent callback that finally shows modal
	 * and binds submit action to Done button
	 * One of sub-tasks for getting modal shown
	 */
	function processInstance(modalInstance) {
		/* Submit template type edit form on Done button click */
		modalInstance.bind('done', function () {
			nirvana.sendRequest({
				controller: 'TemplateClassificationMockApi',
				method: 'setTemplateType',
				data: {
					'articleId': mw.config.get('wgArticleId'),
					'templateType': $('#TemplateClassificationEditForm').serializeArray()[0].value
				}
			});
			modalInstance.trigger('close');
		});

		/* Show the modal */
		modalInstance.show();
	}

	function setupTemplateClassificationModal(content) {
		/* Modal component configuration */
		modalConfig = {
			vars: {
				id: 'TemplateClassificationEditModal',
				classes: ['template-classification-edit-modal'],
				size: 'small', // size of the modal
				content: content, // content
				title: mw.message('template-classification-edit-modal-title').escaped()
			}
		};

		var modalButtons = [
			{
				vars: {
						value: mw.message('template-classification-edit-modal-save-button-text').escaped(),
						classes: ['normal', 'primary'],
						data: [
							{
								key: 'event',
								value: 'done'
							}
						]
					}
			},
			{
				vars: {
					value: mw.message('template-classification-edit-modal-cancel-button-text').escaped(),
					data: [
						{
							key: 'event',
							value: 'close'
						}
					]
				}
			}
		];

		modalConfig.vars.buttons = modalButtons;
	}

	$(init);
});
