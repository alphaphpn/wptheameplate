/** Slide Animate **/
$(document).ready(function(){
	// Add smooth scrolling to all links in navbar + footer link
	$(".navbar a, footer a[href='#myHome']").on('click', function(event) {
		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
			// Prevent default anchor click behavior
			event.preventDefault();

			// Store hash
			var hash = this.hash;

			// Using jQuery's animate() method to add smooth page scroll
			// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 900, function(){
				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			});
		} // End if
	});

	$(window).scroll(function() {
		$(".slideanim").each(function(){
			var pos = $(this).offset().top;

			var winTop = $(window).scrollTop();
			if (pos < winTop + 600) {
				$(this).addClass("slide");
			}
		});
		
		$("#back-to-top").css("display","inline");

		// var wScroll = $(window).scrollTop();
		// $('.parallax--bg').css('background-position', 'center ' + (wScroll*0.01) + 'px');
		// $('.site-content').css('margin-top', '96px');
	});

	$(window).on("load", function () {
		var urlHash = window.location.href.split("#")[1];
		if (urlHash &&  $('#' + urlHash).length )
		$('html,body').animate({
			scrollTop: $('#' + urlHash).offset().top-200
		}, 1000);
	});
	
	$(".content").slice(0, 4).show();$(window).scroll(function() {
		if($(window).scrollTop() == $(document).height() - $(window).height()) {
			$(".content:hidden").slice(0, 4).show();
			if($(".content:hidden").length == 0) {
				$("#loadMore").text("...").addClass("noContent");
			}
		}
	});

	$("#loadMore").on("click", function(e){
		e.preventDefault();
		$(".content:hidden").slice(0, 4).show();
		if($(".content:hidden").length == 0) {
			$("#loadMore").text("...").addClass("noContent");
		}
	});
});

/** Slick Slider **/
$(".slick-hero-banner").slick({
	infinite: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: false,
});

$(".featrd-products-slick").slick({
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	autoplay: true,
	dots: false,
	arrows: false,
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		}
	]
});

$(".featrd-news-slick").slick({
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	autoplay: true,
	dots: false,
	arrows: false,
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		},
		{
			breakpoint: 500,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		}
	]
});

$(".slick-brand-logo").slick({
	infinite: true, 
	slidesToShow: 6, 
	slidesToScroll: 1, 
	autoplay: true, 
	autoplaySpeed: 1000, 
	speed: 1000,
	dots: false,
	arrows: false,
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		},
		{
			breakpoint: 500,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		}
	]
});

$(".slick-testimonial").slick({
	infinite: false, 
	slidesToShow: 1, 
	slidesToScroll: 1, 
	autoplay: true,
	dots: false,
	arrows: false,
});

$(".slick-img-gallery").slick({
	infinite: true, 
	slidesToShow: 6, 
	slidesToScroll: 1, 
	autoplay: true, 
	autoplaySpeed: 1000, 
	speed: 1000,
	dots: false,
	arrows: false,
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		},
		{
			breakpoint: 500,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1, 
				autoplay: true, 
				autoplaySpeed: 1000, 
				speed: 1000,
			}
		}
	]
});

/** Default Script **/

/** Custom Script - Start Here **/
