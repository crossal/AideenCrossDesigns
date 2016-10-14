jQuery(document).ready(function ($) {
    setInterval(function () {
        moveRight();
    }, 5000);
  
	var slideCount = $('.slider ul li').length;
	var slideWidth = 500;//$('.slider ul li').width();
	var slideHeight = 700;//$('.slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('.slider').css({ width: slideWidth, height: slideHeight });
	
	$('.slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	
    $('.slider ul li:last-child').prependTo('.slider ul');

    function moveRight() {
        $('.slider ul').animate({
            left: - slideWidth
        }, 500, function () {
            $('.slider ul li:first-child').appendTo('.slider ul');
            $('.slider ul').css('left', '');
        });
    };
});  