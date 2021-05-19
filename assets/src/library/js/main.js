$( '#top-header .df-nav a' ).on( 'click',
function () {
	$( '#top-header .df-nav' ).find( 'li.active' ).removeclass( 'active' );
	$( this ).parent( 'li' ).addclass( 'active' );
}
);
