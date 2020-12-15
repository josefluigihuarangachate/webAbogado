/**********************************************************************
***********************************************************************
### PerfectScrollbar
*********************************************************************
*********************************************************************/
// chat-contact-list Scrollbar
new PerfectScrollbar('.chat-contact-list', {
	suppressScrollX: true
});

// chat-details-body Scrollbar
new PerfectScrollbar('.chat-details-body-scroll-1', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-2', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-3', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-4', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-5', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-6', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-7', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-8', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-9', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-10', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-11', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-12', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-13', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-14', {
	suppressScrollX: true
});
// mailbox-details-body
new PerfectScrollbar('.chat-details-body-scroll-15', {
	suppressScrollX: true
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
###  JS
*********************************************************************
*********************************************************************/