jQuery( document ).ready( function( $ ) {
/*================= Image Add  Attributes =================*/
		 $('img').load(function() { 
			var wsbwid = $(this).width();
			var wsbhei = $(this).height();	
			$(this).attr("width",wsbwid);
			$(this).attr("height",wsbhei);
		 }); 
} );