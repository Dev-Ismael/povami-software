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

		/*===== Counter Up ========*/
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});



			/*================= Admin Sidebar =================*/
			var fullHeight = function() {

				$('.js-fullheight').css('height', $(window).height());
				$(window).resize(function(){
					$('.js-fullheight').css('height', $(window).height());
				});
		
			};
			fullHeight();
		
			$('#sidebarCollapse').on('click', function () {
			  $('#sidebar').toggleClass('active');
		  });
		

}); 