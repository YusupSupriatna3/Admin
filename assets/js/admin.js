if ($(window).width() > 514) {
    $('.wrapper-navsecond.menu').addClass('active');
    $('.wrapper-content').addClass('active');
}
// menu
$('#menu').on('click', function(){
	$('.wrapper-content').addClass('active');
    $('.wrapper-content').addClass('transition'); 
	$('.wrapper-navsecond.menu').addClass('active');
    $('.wrapper-navsecond').addClass('transition');
	$('.wrapper-navsecond.notifications').removeClass('active');
	$('#menu').addClass('active');
	$('#notifications').removeClass('active');
})

$('#notifications').on('click', function(){
    $('.wrapper-content').addClass('active');
    $('.wrapper-content').addClass('transition'); 
	$('.wrapper-navsecond.notifications').addClass('active');
	$('.wrapper-navsecond.menu').removeClass('active');
    $('.wrapper-navsecond').addClass('transition');
	$('.wrapper-content').addClass('active');
	$('#notifications').addClass('active');
	$('#menu').removeClass('active');
})

$('.btnClose').on('click', function(){
	$('.wrapper-navsecond.notifications').removeClass('active');
	$('.wrapper-navsecond.menu').removeClass('active');
	$('.wrapper-content').removeClass('active');
})

$('#search').on('click', function(){
	$('.search').toggleClass('active');
})

$('.closeSearch').on('click', function(){
	$('.search').removeClass('active');
})

$('.profile').on('click', function(){
	$('.profile-menu').toggleClass('active');
})