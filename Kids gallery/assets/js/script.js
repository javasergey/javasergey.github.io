
jQuery(document).ready(($) => {
   
    if ($(window).innerWidth() >= 768) {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() >= 200) {
                $('.header-text').css('display', 'none');
            } 
            else {
                $('.header-text').css('display', 'block');
            }
        })
    }

    $('#aniimated-thumbnials').lightGallery({
        thumbnail: true
    });

});

