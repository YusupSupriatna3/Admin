// header slider
$('.owl-carousel.header-carousel').owlCarousel({
	loop: true,
	margin: 10,
	nav: true,
	items: 1,
	dots: true,
	autoplay:true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	navText : ["<i class='material-icons'>chevron_left</i>","<i class='material-icons'>chevron_right</i>"],
	smartSpeed: 1500,
	animateOut: 'fadeIn',
})