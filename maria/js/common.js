$(function() {

	

	$(window).on("scroll", function() {
	if($(window).scrollTop() >= 250){
		$('.to-top-button').fadeIn();
		$('.top-menu').css('display','flex');
		$('.top-menu').slideDown(), 1000;		
		$('.top-menu').css('position','fixed');

	}else{
		$('.to-top-button').slideUp(), 1000;
		$('.top-menu').slideUp(), 800;
	}
});

// --------------------   to-top-button   -----------------------

	$('.to-top-button').click(function(){
		$('html, body').animate({scrollTop:0}, 1000);
	})


	

		

	

	

});

