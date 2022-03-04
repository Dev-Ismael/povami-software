$(document).ready( function (){
    "use strict";


    /* ====================================================================
    |   |   |   |   |   |   |   Home
	===================================================================== */


		/*=================== Navbar ============================*/

			// At Scroll change backgroundColor
			$(window).scroll(function() {
				if ($(window).scrollTop() > 5 ) {
					$("#home nav.navbar").css({
						'box-shadow' : '0px 0px 2px 2px #717171cc',
						'background-color' : '#fff' ,
					});
					$("#home  nav.navbar a").css("color" , "#29004f");
					$("#home  nav.navbar .navbar-toggler").css("color" , "#29004f");
					$("#home .navbar-brand img").attr("src" , "images/icons/Logo1.png");
				} else {
					$("#home  nav.navbar").css({
						'box-shadow' : 'none' ,
						'background-color' : 'transparent' ,
					});
					$("#home  nav.navbar a").css("color" , "#fff");
					$("#home  nav.navbar .navbar-toggler").css("color" , "#fff");
					$("#home  .navbar-brand img").attr("src" , "images/icons/Logo2.png");
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


			

		/*=================== testmonilas ============================*/
			var feedbackSlider = $('.feedback-slider');
			feedbackSlider.owlCarousel({
				items: 1,
				nav: true,
				dots: true,
				autoplay: true,
				loop: true,
				mouseDrag: true,
				touchDrag: true,
				navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
				responsive:{

					// breakpoint from 767 up
					767:{
						nav: true,
						dots: false
					}
				}
			});

			feedbackSlider.on("translate.owl.carousel", function(){
				$(".feedback-slider-item h3").removeClass("animated fadeIn").css("opacity", "0");
				$(".feedback-slider-item img, .feedback-slider-thumb img, .customer-rating").removeClass("animated zoomIn").css("opacity", "0");
			});

			feedbackSlider.on("translated.owl.carousel", function(){
				$(".feedback-slider-item h3").addClass("animated fadeIn").css("opacity", "1");
				$(".feedback-slider-item img, .feedback-slider-thumb img, .customer-rating").addClass("animated zoomIn").css("opacity", "1");
			});
			feedbackSlider.on('changed.owl.carousel', function(property) {
				var current = property.item.index;
				var prevThumb = $(property.target).find(".owl-item").eq(current).prev().find("img").attr('src');
				var nextThumb = $(property.target).find(".owl-item").eq(current).next().find("img").attr('src');
				var prevRating = $(property.target).find(".owl-item").eq(current).prev().find('span').attr('data-rating');
				var nextRating = $(property.target).find(".owl-item").eq(current).next().find('span').attr('data-rating');
				$('.thumb-prev').find('img').attr('src', prevThumb);
				$('.thumb-next').find('img').attr('src', nextThumb);
				$('.thumb-prev').find('span').next().html(prevRating + '<i class="fa fa-star"></i>');
				$('.thumb-next').find('span').next().html(nextRating + '<i class="fa fa-star"></i>');
			});
			$('.thumb-next').on('click', function() {
				feedbackSlider.trigger('next.owl.carousel', [300]);
				return false;
			});
			$('.thumb-prev').on('click', function() {
				feedbackSlider.trigger('prev.owl.carousel', [300]);
				return false;
			});





}); 