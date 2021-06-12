//$( '#top-header .df-nav a' ).on( 'click',
//function () {
//	$( '#top-header .df-nav' ).find( 'li.active' ).removeclass( 'active' );
//	$( this ).parent( 'li' ).addclass( 'active' );
//}
//);

jQuery( '#ad-button' ).on( 'click',
function () {
	jQuery( '#display-photo' ).hide();
	jQuery( '#display-mm' ).hide();
	jQuery( '#display-ad' ).show();
}
);

jQuery( '#photo-button' ).on( 'click',
function () {
	jQuery( '#display-photo' ).show();
	jQuery( '#display-mm' ).hide();
	jQuery( '#display-ad' ).hide();
}
);

jQuery( '#mm-button' ).on( 'click',
function () {
	jQuery( '#display-photo' ).hide();
	jQuery( '#display-mm' ).show();
	jQuery( '#display-ad' ).hide();
}
);

//To display image individually
jQuery( ".middle" ).on( 'click',
function () {
	var q = jQuery( this ).prev().attr('src');
	jQuery( ".zoom-photo" ).show();
	jQuery("body").css("overflow", "hidden");
	//window.alert(jQuery( ".show-image img" ).attr('src'));
	var elements = document.getElementsByClassName("show-image");
	var caption = document.getElementsByClassName("caption-part");
	for (var i = 0, len = elements.length; i < len; i++) {
		var r = jQuery(elements[i]).find('img').attr('src');
		if (q == r) {
			//window.alert(q);
			//window.alert(jQuery(elements[i]).className);
			//jQuery(elements[i]).prev(".show-image").show();
			jQuery(elements[i]).css("display", "table-row");
			jQuery(caption[i]).css("display", "flex");
			jQuery( elements[i] ).addClass( "appear-img" );
			jQuery( caption[i] ).addClass( "appear-captions" );
		}
	}
}
);

//To close the invidual image
jQuery( ".close-photo" ).on( 'click',
function () {
	jQuery( ".zoom-photo" ).hide();
	jQuery("body").css("overflow", "unset");

	var element = document.getElementsByClassName("appear-img");
	var caption = document.getElementsByClassName("appear-captions");

	jQuery(element[0]).css("display", "none");
	jQuery(caption[0]).css("display", "none");
	jQuery( element[0] ).removeClass( "appear-img" );
	jQuery( caption[0] ).removeClass( "appear-captions" );
}
);

// Display previous image.
jQuery( ".prev-image" ).on( 'click',
function () {

	var element = document.getElementsByClassName("appear-img");
	var caption = document.getElementsByClassName("appear-captions");

	if (jQuery(element[0]).prev().prev().attr('class') == 'show-image') {

		jQuery(element[0]).css("display", "none");
		jQuery(caption[0]).css("display", "none");

		//window.alert(jQuery(element[0]).prev().prev().attr('class'));

		// Accesssing the previous element having class show-image.
		jQuery(element[0]).prev().prev().css("display", "table-row");
		jQuery(element[0]).prev().css("display", "flex");
		jQuery(element[0]).prev().prev().addClass( "appear-img" );
		jQuery(caption[0]).prev().prev().addClass( "appear-captions" );

		jQuery( element[1] ).removeClass( "appear-img" );
		jQuery( caption[1] ).removeClass( "appear-captions" );

	}

}
);

// Display next image.
jQuery( ".next-image" ).on( 'click',
function () {

	//window.alert("sjfhasfj");
	var element = document.getElementsByClassName("appear-img");
	var caption = document.getElementsByClassName("appear-captions");

	if (jQuery(element[0]).next().next().attr('class') == 'show-image') {

		jQuery(element[0]).css("display", "none");
		jQuery(caption[0]).css("display", "none");

		//window.alert(jQuery(element[0]).prev().prev().attr('class'));

		// Accesssing the next element having class show-image.
		jQuery(caption[0]).next().css("display", "table-row");
		jQuery(caption[0]).next().next().css("display", "flex");
		jQuery(caption[0]).next().addClass( "appear-img" );
		jQuery(caption[0]).next().next().addClass( "appear-captions" );

		jQuery( element[0] ).removeClass( "appear-img" );
		jQuery( caption[0] ).removeClass( "appear-captions" );

	}

}
);

//jQuery( ".middle" ).hover(
//function () {
//	jQuery( '.photo-gallery' ).style.filter = "grayscale(100%)";
//}
//);

//function loadQueryResults() {
//    $('#display-photo').html("Hello <b>world!</b>");
//    return false;
//}

//( function( $ ) {
//	$( '#ad-button' ).on( 'click',
//function () {
//	$( '#display-photo' ).html("Hello <b>world!</b>");
//}
//);
// } )( jQuery );

//( function() {
//	const Eleadver = document.getElementById( 'photo-button' );
//	const disad = document.getElementById( 'display-photo' );

//	Eleadver.addEventListener( 'click', function() {
//		disad.innerHTML('iudfyiu');
//	});
//}() );


//$(document).ready(function(){
//	$("#display-photo").mouseenter(function(){
//	  alert("You entered p1!");
//	});
//  });
