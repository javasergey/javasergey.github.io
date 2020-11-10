$(function() {

	

	$(window).on("scroll", function() {
	if($(window).scrollTop() >= 250){
		$('.to-top-button').fadeIn();

	}else{
		
		$('.to-top-button').hide();
	}
});

// --------------------   to-top-button   -----------------------

	$('.to-top-button').click(function(){
		$('html, body').animate({scrollTop:0}, 1000);
	})


	

		

	

	

});

