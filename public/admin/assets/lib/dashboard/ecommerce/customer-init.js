/**********************************************************************
***********************************************************************
### Customer List DataTable Toggle
*********************************************************************
*********************************************************************/
$(document).ready(function () {
	var table = $('#myTable').DataTable({
		"pageLength": 20,
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal({
					header: function (row) {
						var data = row.data();
						return 'Details for ' + data[0] + ' ';
					}
				}),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll({
					tableClass: 'table'
				})
			}
		}
	});
});
/**********************************************************************
***********************************************************************
### Customer Sidebar Toggle
*********************************************************************
*********************************************************************/
var $mainSidebar = $("#customerAddSidebar");

$mainSidebar.simplerSidebar({
	attr: "sidebar-main",
	init: "closed",
	selectors: {
		trigger: "#customerAddSidebarTrigger",
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
### Customer Add Sidebar Scrollbar
*********************************************************************
*********************************************************************/
// Customer Add Sidebar Scrollbar
new PerfectScrollbar('#customerAddSidebar', {
	suppressScrollX: true
});

/**********************************************************************
***********************************************************************
### Phone Number Formatter
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