$().ready(function(){


	// ----------------------feedback-slick-----------
	$('.feedback-container').slick({
		slidesToShow: 1,
		dots: true,
		autoplay: true,
		arrows: false,
  		autoplaySpeed: 2000
	});

	$('.header-slider').slick({
		slidesToShow: 4,
	  	slidesToScroll: 1,
	  	autoplay: true,
	  	autoplaySpeed: 2000,
	});

	$('.slick-prev').hide();

	// -----------------------------------animated----------------------
	$('.header').addClass('wow animated fadeIn')
	$('.header-forms-container').addClass('wow animated fadeIn slower');

	// ---------------------------------------------modal------------------
	$('.header-menu-insurance').click(function(){
		$('.header-menu-modal').fadeToggle(100);
	})

	


	// --------------------------    DROPMENU    ---------------------------
		$('.header-dropmenu-button').click(function(){
			$('header').toggleClass('header-active');
			$('.header-content').toggleClass('header-content-active')
			$('.header-menu-active').slideToggle(100);
		})



		// $('.feedback-container button').removeClass('slick-arrow');




	// --------------------------------------- FORM------------------
	$('.header-form a').click(function(){
	$('.header-form a').removeClass('active-form');
	$(this).addClass('active-form');
	
})


$('.active-osago').click(function(){
	$('.header-osago-form').hide();
	$('.header-osago-form-1').css('display','flex');
	
})

$('.active-kasko').click(function(){
	$('.header-osago-form').hide();
	$('.header-osago-form-2').css('display','flex');
	
})

$('.active-osmotr').click(function(){
	$('.header-osago-form').hide();
	$('.header-osago-form-3').css('display','flex');
	
})

$('.active-insurance').click(function(){
	$('.header-osago-form').hide();
	$('.header-osago-form-4').css('display','flex');
	
})



// dd

	
  });


	




















