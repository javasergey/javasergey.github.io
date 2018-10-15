$(function() {


	$(window).on('scroll', function(){
		if($(window).scrollTop() >= 100){
			$('.header-h1').css('display','none');
		}else{
			$('.header-h1').fadeIn();
		}
	})




	setInterval(function(){
		$('.header-h1').toggleClass('shake');
	
	}, 3000);


	setInterval(function(){
		$('.footer-h1').toggleClass('wobble');
	
	}, 4000);

	$('.footer-img').click(function(){
		$('html, body').animate({scrollTop:0}, 4000);
	})

	$('.header-arrow').click(function(){
		$('html, body').animate({scrollTop:680}, 2500);
	})







	// -------------------------   CONTEXT-MENU block   --------------------------
	$('img').bind('contextmenu', function(e) {
    	return false;
	});
	


	// --------------------------------    SCROLL    -----------------------------------







});



















	


	
