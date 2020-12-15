/**********************************************************************
***********************************************************************
### PerfectScrollbar
*********************************************************************
*********************************************************************/
// mail-menu-scroll
new PerfectScrollbar('.mail-menu-scroll', {
	suppressScrollX: true
});
// mailbox-mail-list
new PerfectScrollbar('.mailbox-mail-list', {
	suppressScrollX: true
});

// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-1', {
	suppressScrollX: true
});

// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-2', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-3', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-4', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-5', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-6', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-7', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-8', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-9', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-10', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-11', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-12', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-13', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-14', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.mailbox-details-scroll-15', {
	suppressScrollX: true
});

// Mail Compose Sidebar
new PerfectScrollbar('#mailComposeSidebar', {
	suppressScrollX: true
});
/**********************************************************************
***********************************************************************
### Quill Editor
*********************************************************************
*********************************************************************/
// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-1', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-2', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-3', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-4', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-5', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-6', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-7', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-8', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-9', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-10', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-11', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-12', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-13', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-14', {
	theme: 'snow'
});

// mailbox-details-editor-1 editor
var quill = new Quill('#mailbox-details-editor-15', {
	theme: 'snow'
});
// quill editor
var quill = new Quill('#sidebarComposeEditor', {
	theme: 'snow'
});


/**********************************************************************
***********************************************************************
### Simple Sidebar Toggle
*********************************************************************
*********************************************************************/
var $mainSidebar = $("#mailComposeSidebar");

$mainSidebar.simplerSidebar({
	attr: "sidebar-main",
	init: "closed",
	selectors: {
		trigger: "#mailComposeSidebarTrigger",
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
### Tab Active JS
*********************************************************************
*********************************************************************/
function openCity(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
}


/**********************************************************************
***********************************************************************
### Localization Picker JS
*********************************************************************
*********************************************************************/
$('#locationMap').locationpicker({
	location: {
		latitude: 46.15242437752303,
		longitude: 2.7470703125
	},
	radius: 250,
	inputBinding: {
		latitudeInput: $('#us3-lat'),
		longitudeInput: $('#us3-lon'),
		radiusInput: $('#us3-radius'),
		locationNameInput: $('#us3-address')
	},
	enableAutocomplete: true,
	onchanged: function (currentLocation, radius, isMarkerDropped) {
		// Uncomment line below to show alert on each Location Changed event
		//alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
	}
});
/**********************************************************************
***********************************************************************
### Emoji Picker JS
*********************************************************************
*********************************************************************/ // emoji-picker-1
$('.emoji-picker-1').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-2
$('.emoji-picker-2').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-3
$('.emoji-picker-3').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-4
$('.emoji-picker-4').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-5
$('.emoji-picker-5').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-6
$('.emoji-picker-6').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-7
$('.emoji-picker-7').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-8
$('.emoji-picker-8').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-9
$('.emoji-picker-9').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-10
$('.emoji-picker-10').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-11
$('.emoji-picker-11').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-12
$('.emoji-picker-12').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-13
$('.emoji-picker-13').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-14
$('.emoji-picker-14').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
// emoji-picker-15
$('.emoji-picker-15').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});


// emoji-picker-compose-sidebar
$('.emoji-picker-compose-sidebar').lsxEmojiPicker({
	twemoji: true,
	onSelect: function (emoji) {
		console.log(emoji);
	}
});
/**********************************************************************
***********************************************************************
### Selectize Active JS
*********************************************************************
*********************************************************************/
// <select id="select-to"></select>
var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
	'(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';

var formatName = function (item) {
	return $.trim((item.first_name || '') + ' ' + (item.last_name || ''));
};

$('#selectTo, #selectCC, #selectBCC').selectize({
	persist: false,
	maxItems: null,
	valueField: 'email',
	labelField: 'name',
	searchField: ['first_name', 'last_name', 'email'],
	sortField: [{
			field: 'first_name',
			direction: 'asc'
		},
		{
			field: 'last_name',
			direction: 'asc'
		}
	],
	options: [{
			email: 'nikola@tesla.com',
			first_name: 'Nikola',
			last_name: 'Tesla'
		},
		{
			email: 'brian@thirdroute.com',
			first_name: 'Brian',
			last_name: 'Reavis'
		},
		{
			email: 'someone@gmail.com',
			first_name: 'Ruhul',
			last_name: 'Hasan'
		},
		{
			email: 'hannah_hariston@gmail.com',
			first_name: 'Hannah',
			last_name: 'Hariston'
		},
		{
			email: 'johndeo@gmail.com',
			first_name: 'John',
			last_name: 'Deo'
		},
		{
			email: 'dyanneaceron@tesla.com',
			first_name: 'Dyanne',
			last_name: 'Aceron'
		},
		{
			email: 'aceron@thirdroute.com',
			first_name: 'Anne',
			last_name: 'Aceron'
		},
		{
			email: 'maryadams@gmail.com',
			first_name: 'Mary',
			last_name: 'Adams'
		},
		{
			email: 'richardscaleb@gmail.com',
			first_name: 'Richards',
			last_name: 'Caleb'
		},
		{
			email: 'edwardlane@gmail.com',
			first_name: 'Edward',
			last_name: 'Lane'
		},
	],
	render: {
		item: function (item, escape) {
			var name = formatName(item);
			return '<div>' +
				(name ? '<span class="name">' + escape(name) + '</span>' : '') +
				(item.email ? '<span class="email">' + escape(item.email) + '</span>' : '') +
				'</div>';
		},
		option: function (item, escape) {
			var name = formatName(item);
			var label = name || item.email;
			var caption = name ? item.email : null;
			return '<div>' +
				'<span class="label">' + escape(label) + '</span>' +
				(caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
				'</div>';
		}
	},
	createFilter: function (input) {
		var regexpA = new RegExp('^' + REGEX_EMAIL + '$', 'i');
		var regexpB = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
		return regexpA.test(input) || regexpB.test(input);
	},
	create: function (input) {
		if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
			return {
				email: input
			};
		}
		var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
		if (match) {
			var name = $.trim(match[1]);
			var pos_space = name.indexOf(' ');
			var first_name = name.substring(0, pos_space);
			var last_name = name.substring(pos_space + 1);

			return {
				email: match[2],
				first_name: first_name,
				last_name: last_name
			};
		}
		alert('Invalid email address.');
		return false;
	}
});

/**********************************************************************
***********************************************************************
### Popover JS
*********************************************************************
*********************************************************************/
$('body').on('click', function (e) {
	//did not click a popover toggle or popover
	if ($(e.target).data('toggle') !== 'popover' &&
		$(e.target).parents('.popover.in').length === 0) {
		$('[data-toggle="popover"]').popover('hide');
	}
});