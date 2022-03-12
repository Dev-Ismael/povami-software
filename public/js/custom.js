$(document).ready( function (){
    "use strict";


		/*===== Navbar ========*/

			// if in medium page
			if ($(window).scrollTop() > 5 ) {
				$("nav.navbar").addClass('sticky');
				$(".navbar-brand img").attr("src" , "images/icons/Logo1.png");
			}
			// At Scroll change backgroundColor
			$(window).scroll(function() {
				if ($(window).scrollTop() > 5 ) {
					$("nav.navbar").addClass('sticky');
					$(".navbar-brand img").attr("src" , "images/icons/Logo1.png");
				} else {
					$("nav.navbar.show").removeClass('sticky');
					$("nav.navbar.show .navbar-brand img").attr("src" , "images/icons/Logo2.png");
				}
			});

			// At Click Navbar Toggler
			$(" button.navbar-toggler").click( function (){
				$("nav.navbar").css("height" , "auto");
				// $("nav.navbar").css("background-color" , "#fff");
				$("nav.navbar").addClass('sticky');
				$(".navbar-brand img").attr("src" , "images/icons/Logo1.png");
				$(this).css("color" , "#29004f")
			}); 

		/*===== Counter Up ========*/
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});



}); 