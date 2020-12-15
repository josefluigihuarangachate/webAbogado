/**********************************************************************
***********************************************************************
### Foo Table Active JS
*********************************************************************
*********************************************************************/
$(function () {
	'use strict'


	// Row Toggler
	$('#foo-row-toggler').footable();

	// Accordion
	$('.foo-accordion').footable().on('footable_row_expanded', function (e) {
		$('.foo-accordion tbody tr.footable-detail-show').not(e.row).each(function () {
			$('.foo-accordion').data('footable').toggleDetail(this);
		});
	});
	// Filtering
	var filtering = $('.foo-filtering');
	filtering.footable().on('footable_filtering', function (e) {
		var selected = $('#foo-filter-status').find(':selected').val();
		e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
		e.clear = !e.filter;
	});

	// Filter status
	$('#foo-filter-status').change(function (e) {
		e.preventDefault();
		filtering.trigger('footable_filter', {
			filter: $(this).val()
		});
	});

	// Search input
	$('#foo-search').on('input', function (e) {
		e.preventDefault();
		filtering.trigger('footable_filter', {
			filter: $(this).val()
		});
	});

})

/**********************************************************************
***********************************************************************
### Simple Sidebar Toggle
*********************************************************************
*********************************************************************/
var $mainSidebar = $("#contactAddSidebar");

$mainSidebar.simplerSidebar({
	attr: "sidebar-main",
	init: "closed",
	selectors: {
		trigger: "#contactAddSidebarTrigger",
		quitter: ".quitter"
	},
	animation: {
		easing: "easeOutQuint"
	},
	sidebar: {
		width: 420
	},
	mask: {
		display: true
	}

});
/**********************************************************************
***********************************************************************
### jQuery DOB Picker Active JS
*********************************************************************
*********************************************************************/
$(document).ready(function () {
	$.dobPicker({
		// Selectopr IDs
		daySelector: '#dobday',
		monthSelector: '#dobmonth',
		yearSelector: '#dobyear',

		// Default option values
		dayDefault: 'Day',
		monthDefault: 'Month',
		yearDefault: 'Year',

		// Minimum age
		minimumAge: 12,

		// Maximum age
		maximumAge: 80
	});
});
/**********************************************************************
***********************************************************************
### Contact Add Sidebar Scrollbar
*********************************************************************
*********************************************************************/
// Contact Add Sidebar Scrollbar
new PerfectScrollbar('#contactAddSidebar', {
	suppressScrollX: true
});


/**********************************************************************
***********************************************************************
### PerfectScrollbar
*********************************************************************
*********************************************************************/
$(function () {
	'use strict'
	// Phone Style 
	$('#phone').formatter({
		'pattern': '+1 ({{999}}) {{999}}-{{9999}}',
		'persistent': true
	});
});