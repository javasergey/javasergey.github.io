new Vue({
  el: '#app',
  data: {
    name: 'land5',
    burgerActive: false
  },
  methods: {
    burgerClick1: function () {
      this.burgerActive = !this.burgerActive
    }
  }
})




$(document).ready(function () {
  $(window).resize(function () {
    if ($(window).width() < 1070) {
      $('.header4').addClass("hide");
      $('.header44').addClass("active");
    } else if ($(window).width() > 1070) {
      $('.header4').removeClass("hide");
      $('.header44').removeClass("active");
    }
    if ($(window).width() > 767) {
      $('.header-submenu').slideUp();
      $('.header-top-bar').removeClass("burgerActive");
      $('#nav-icon1').removeClass("open");
    }
  });

  $("#nav-icon1").click(function () {
    $(".header-submenu").slideToggle();
  })


});