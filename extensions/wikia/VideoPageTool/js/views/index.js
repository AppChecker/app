define('vpt.views.index', [
	'vpt.views.datepicker'
], function(Datepicker) {

	function VPTIndex() {
		this.init();
	}

	VPTIndex.prototype = {
		init: function() {
			this.$regionSelect = $('#marketingToolboxRegionSelect');
			this.defaultLanguage = this.$regionSelect.data('defaultLanguage');
			this.bindEvents();
			this.renderDatepicker();
		},
		bindEvents: function() {
			var that = this;
			this.$regionSelect.on('change', function(evt) {
				return that.renderDatepicker.call(that, evt);
			});
		},
		renderDatepicker: function(evt) {
			var value = evt ? evt.target.value : this.defaultLanguage;
			
			// don't render if placeholder is chosen (for first time)
			if (value === 'placeholder') {
				return false;
			}

			// disable placeholder from being selected after a region has been selected
			this.$regionSelect.find('option[value=\'placeholder\']').attr('disabled', true);

			// delete stale datepickers
			if (this.datepicker) {
				this.datepicker.destroy();
			}

			// initialize new datepicker, passing through the language
			this.datepicker = new Datepicker({
				el: '#date-picker',
				language: value,
				controller: 'VideoPageToolSpecial',
				method: 'getCalendarInfo'
			});
		}
	};

	return VPTIndex;
});

require(['vpt.views.index'], function(IndexView) {
	$(function() {
		new IndexView();
	});
});
