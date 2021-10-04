const advertisement_id = new URLSearchParams(window.location.search).get('advertisement_id');
const multimedia_id = new URLSearchParams(window.location.search).get('multimedia_id');
const photography_id = new URLSearchParams(window.location.search).get('photography_id');

function show_advertisement() {
	jQuery('#display-photo').hide();
	jQuery('#display-mm').hide();
	jQuery('#display-ad').show();
	jQuery('#photo-button').css("background-color", "#222222");
	jQuery('#mm-button').css("background-color", "#222222");
	jQuery('#ad-button').css("background-color", "#ef4634");
}

function show_multimedia() {
	jQuery('#display-photo').hide();
	jQuery('#display-mm').show();
	jQuery('#display-ad').hide();
	jQuery('#photo-button').css("background-color", "#222222");
	jQuery('#mm-button').css("background-color", "#ef4634");
	jQuery('#ad-button').css("background-color", "#222222");
}

function show_photography() {
	jQuery('#display-photo').show();
	jQuery('#display-mm').hide();
	jQuery('#display-ad').hide();
	jQuery('#photo-button').css("background-color", "#ef4634");
	jQuery('#mm-button').css("background-color", "#222222");
	jQuery('#ad-button').css("background-color", "#222222");
}

if (+advertisement_id === 11) {
	show_advertisement();
}

if (+multimedia_id === 12) {
	show_multimedia();
}

if (+photography_id === 12) {
	show_photography();
}

jQuery('#ad-button').on('click', show_advertisement);

jQuery('#photo-button').on( 'click', show_photography );

jQuery('#mm-button').on( 'click', show_multimedia );

//To display image individually
jQuery(".middle").on('click',
	function () {
		var q = jQuery(this).prev().attr('src');
		jQuery(".zoom-photo").show();
		jQuery("body").css("overflow", "hidden");
		var elements = document.getElementsByClassName("show-image");
		var caption = document.getElementsByClassName("caption-part");
		for (var i = 0, len = elements.length; i < len; i++) {
			var r = jQuery(elements[i]).find('img').attr('src');
			if (q == r) {
				jQuery(elements[i]).css("display", "table-row");
				jQuery(caption[i]).css("display", "flex");
				jQuery(elements[i]).addClass("appear-img");
				jQuery(caption[i]).addClass("appear-captions");
			}
		}
	}
);

//To close the invidual image
jQuery(".close-photo").on('click',
	function () {
		jQuery(".zoom-photo").hide();
		jQuery("body").css("overflow", "unset");

		var element = document.getElementsByClassName("appear-img");
		var caption = document.getElementsByClassName("appear-captions");

		jQuery(element[0]).css("display", "none");
		jQuery(caption[0]).css("display", "none");
		jQuery(element[0]).removeClass("appear-img");
		jQuery(caption[0]).removeClass("appear-captions");
	}
);

// Display previous image.
jQuery(".prev-image").on('click',
	function () {

		var element = document.getElementsByClassName("appear-img");
		var caption = document.getElementsByClassName("appear-captions");

		if (jQuery(element[0]).prev().prev().attr('class') == 'show-image') {

			jQuery(element[0]).css("display", "none");
			jQuery(caption[0]).css("display", "none");

			jQuery(element[0]).prev().prev().css("display", "table-row");
			jQuery(element[0]).prev().css("display", "flex");
			jQuery(element[0]).prev().prev().addClass("appear-img");
			jQuery(caption[0]).prev().prev().addClass("appear-captions");

			jQuery(element[1]).removeClass("appear-img");
			jQuery(caption[1]).removeClass("appear-captions");

		}

	}
);

// Display next image.
jQuery(".next-image").on('click',
	function () {

		var element = document.getElementsByClassName("appear-img");
		var caption = document.getElementsByClassName("appear-captions");

		if (jQuery(element[0]).next().next().attr('class') == 'show-image') {

			jQuery(element[0]).css("display", "none");
			jQuery(caption[0]).css("display", "none");

			jQuery(caption[0]).next().css("display", "table-row");
			jQuery(caption[0]).next().next().css("display", "flex");
			jQuery(caption[0]).next().addClass("appear-img");
			jQuery(caption[0]).next().next().addClass("appear-captions");

			jQuery(element[0]).removeClass("appear-img");
			jQuery(caption[0]).removeClass("appear-captions");

		}

	}
);
