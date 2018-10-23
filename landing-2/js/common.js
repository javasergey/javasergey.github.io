$().ready(function(){


	// -------------OWL-CAROUSEL-------------

	$('.owl-carousel').owlCarousel({
		
		items : 1,
		centerMode: true,
		// autoHeight : true,
		navText : ["<img src='img/back.png'>","<img src='img/next.png'>"]
	
	});




	// -----------------------------------------------------------


	$('.nav-menu-link-1').click(function(){
		$('html, body').animate({scrollTop:3400});
	})
	$('.nav-menu-link-2').click(function(){
		$('html, body').animate({scrollTop:4900});
	})
	$('.nav-menu-link-3').click(function(){
		$('html, body').animate({scrollTop:600});
	})
	$('.nav-menu-link-4').click(function(){
		$('html, body').animate({scrollTop:7500});
	})
	$('.nav-menu-link-5').click(function(){
		$('html, body').animate({scrollTop:9400});
	})
	$('.nav-menu-link-6').click(function(){
		$('html, body').animate({scrollTop:6100});
	})
	$('.nav-menu-link-7').click(function(){
		$('html, body').animate({scrollTop:10350});
	})



// ---------------------------- DROP MENU -----------------


	$(window).resize(function(){
		if($(this).width() > 992) {
			$('.nav-menu').removeAttr('style');
		}
	})


	$(window).resize(function(){
		if($(this).width() < 992) {
			$('.positions-adaptive').show();
			$('.video-section-adaptive').show();
		}
		if($(this).width() > 1200) {
			$('.positions-adaptive').hide();
			$('.video-section-adaptive').hide();
		}
	})


	$('.nav-menu-active-link').css({'borderTop':'3px solid #009EE0', 'borderBottom':'3px solid #009EE0'});


	$('.nav-menu a').click(function(){
		$('.nav-menu-active-link').css('border','none');
		$(this).addClass('nav-menu-act');
		
	})









});



	
















