$(document).ready( function (){
    "use strict";


    /* ====================================================================
    |   |   |   |   |   |   |   Home
	===================================================================== */


		/*=================== Navbar ============================*/

			// At Scroll change backgroundColor
			$(window).scroll(function() {
				if ($(window).scrollTop() > 5 ) {
					$(" nav.navbar").css({
						'box-shadow' : '0px 0px 2px 2px #717171cc',
						'background-color' : '#fff' ,
					});
					$("  nav.navbar a").css("color" , "#29004f");
					$("  nav.navbar .navbar-toggler").css("color" , "#29004f");
					$(" .navbar-brand img").attr("src" , "images/icons/Logo1.png");
				} else {
					$("  nav.navbar").css({
						'box-shadow' : 'none' ,
						'background-color' : 'transparent' ,
					});
					$("  nav.navbar a").css("color" , "#fff");
					$("  nav.navbar .navbar-toggler").css("color" , "#fff");
					$("  .navbar-brand img").attr("src" , "images/icons/Logo2.png");
				}
			});

			// At Click Navbar Toggler
			$(" button.navbar-toggler").click( function (){
				$(" nav.navbar").css({
					'box-shadow' : '0px 0px 2px 2px #717171cc' ,
					'background-color' : '#fff' ,
				});
				$("nav.navbar").css("height" , "auto");
				$("navbar-collapse.collapse.show").css("background-color" , "#fff");
				$("nav.navbar a").css("color" , "#29004f");
				$(".navbar-brand img").attr("src" , "images/icons/Logo1.png");
				$(this).css("color" , "#29004f")
			}); 


			

		




}); 