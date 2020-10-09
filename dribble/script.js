Vue.directive('out', {

    bind: function (el, binding, vNode) {
      const handler = (e) => {
        if (!el.contains(e.target) && el !== e.target) {
          vNode.context[binding.expression] = false
        }
      }
      el.out = handler
      document.addEventListener('click', handler)
    },

    unbind: function (el, binding) {
      document.removeEventListener('click', el.out)
      el.out = null
    }
  })

  const contentMenu = [
    { id: 1, name: 'All', link: '/all' },
    { id: 2, name: 'Animation', link: '/animation' },
    { id: 3, name: 'Branding', link: '/branding' },
    { id: 4, name: 'Illustration', link: '/illustration' },
    { id: 5, name: 'Mobile', link: '/mobile' },
    { id: 6, name: 'Print', link: '/print' },
    { id: 7, name: 'Product Design', link: '/pruduct' },
    { id: 8, name: 'Typography', link: '/typography' },
    { id: 9, name: 'Web Design', link: '/webdesign' }
  ];

  new Vue({
    el: '#app',
    data: {
      contentMenu: contentMenu,
      openBurger1: false,
      notificationBarHide: false,
      toggleHeaderSubmenu: false,
      hoverOut: false,
      popularActive: false,
      popup: false,
      mobileMenuActive: true,
      contentItemClose: true,
      contentItemOpen: false
    },

    methods: {
      burgerClick1: function () {
        this.openBurger1 = !this.openBurger1;
        this.mobileMenuActive = !this.mobileMenuActive;
      },
      closeTopBar: function () {
        this.notificationBarHide = !this.notificationBarHide;
      },
      hover: function (event) {
        this.toggleHeaderSubmenu = true
      },
      hoverout: function () {
        this.toggleHeaderSubmenu = false
      },
      popularDropdown: function () {
        this.popularActive = !this.popularActive
      },
      closeFunc: function () {
        this.contentItemClose = !this.contentItemClose;
      },
      openFunc: function () {
        this.contentItemOpen = !this.contentItemOpen
        this.contentItemClose = !this.contentItemClose
      }
    }
  })

  document.onkeydown = function (e) {
    let itemOpen = document.querySelector('.main-content-item-open');
    if (e.keyCode == 27) {
      itemOpen.classList.add('contentItemClose');
    }
  };

  $(document).ready(function () {
    setTimeout(function () {
      $('.header-top-bar').addClass('header-top-bar-show');
    }, 1000)

    $(window).resize(function () {
      if ($(window).width() > 1200) {
        $('.header-bar-mobile-menu').addClass('contentItemClose');
      }
    });

    $('.main-content-item-open').on('click', function (e) {
      if (e.target !== this)
        return;
      $(this).addClass('contentItemClose');
    });

  });
