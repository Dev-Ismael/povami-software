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

		/*============= collapse =============*/
		$('.panel-collapse').on('show.bs.collapse', function () {
			$(this).siblings('.panel-heading').addClass('active');
		});
	
		$('.panel-collapse').on('hide.bs.collapse', function () {
			$(this).siblings('.panel-heading').removeClass('active');
		});

		// Add Active Class
		$(".panel-group .panel.panel-default:first-child .panel-heading").addClass("active");
		$(".panel-group .panel.panel-default:first-child .panel-collapse").addClass("show");

		/*============= ddSlick Plugin =============*/
		$('#myDropdown').ddslick({ });

		/*============= payment system radio checked =============*/
		$(".custom-radios label.option").click(function(e){
			$(".custom-radios .milestone-text").toggleClass("d-none");
		});


		/*============= coupon =============*/
		$("#account-page .coupon p.thanks").click(function (e){
			$("#account-page #acceptContractModal .coupon").addClass("d-none");
		});
}); 
