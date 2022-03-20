$(document).ready( function (){
    "use strict";


	/*===== Navbar ========*/

		// if in medium page
		if ($(window).scrollTop() > 5 ) {
			$("nav.navbar").addClass('sticky');
		}
		// At Scroll change backgroundColor
		$(window).scroll(function() {
			if ($(window).scrollTop() > 5 ) {
				$("nav.navbar").addClass('sticky');
			} else {
				$("nav.navbar").removeClass('sticky');
			}
		});

		// At Click Navbar Toggler
		$(" button.navbar-toggler").click( function (){
			$("nav.navbar").toggleClass('collapse-open');
			$("nav.navbar").css("height" , "auto");
		}); 

		

}); 