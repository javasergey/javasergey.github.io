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

let item = [
  {id: 1, name: "./assets/item1.jpg"},
  {id: 2, name: "./assets/item2.jpg"},
  {id: 3, name: "./assets/item3.jpg"},
  {id: 4, name: "./assets/item4.jpg"},
  {id: 5, name: "./assets/item5.jpg"},
  {id: 6, name: "./assets/item6.jpg"},
  {id: 7, name: "./assets/item7.jpg"},
  {id: 8, name: "./assets/item8.jpg"},
  {id: 9, name: "./assets/item9.jpg"},
  {id: 10, name: "./assets/item10.jpg"},
  {id: 11, name: "./assets/item11.jpg"},
  {id: 12, name: "./assets/item12.jpg"},
  {id: 13, name: "./assets/item13.jpg"},
  {id: 14, name: "./assets/item14.jpg"},
  {id: 15, name: "./assets/item15.jpg"},
  {id: 16, name: "./assets/item16.jpg"},
  {id: 17, name: "./assets/item17.jpg"},
  {id: 18, name: "./assets/item18.jpg"},
  {id: 19, name: "./assets/item19.jpg"},
  {id: 20, name: "./assets/item20.jpg"},
  {id: 21, name: "./assets/item21.jpg"},
  {id: 22, name: "./assets/item22.jpg"},
  {id: 23, name: "./assets/item23.jpg"},
  {id: 24, name: "./assets/item24.jpg"},
  {id: 25, name: "./assets/item25.jpg"},
  {id: 26, name: "./assets/item26.jpg"},
  {id: 27, name: "./assets/item27.jpg"},
  {id: 28, name: "./assets/item28.jpg"},
  {id: 29, name: "./assets/item29.jpg"},
  {id: 30, name: "./assets/item30.jpg"}
];

new Vue({
  el: '#app',
  data: {
    name: 'pint',
    mobileMain: false,
    itemHover: false,
    itemHoverButtons: false,
    itemData: item
  },
  methods: {
    test: function () {
      this.mobileMain != this.mobileMain
    },
    itemHover: function(){
      this.itemHover != this.itemHover
      console.log('itemhoverrr')
    }
  }
})








$().ready(function () {
  $('.my-masonry-grid').masonryGrid({
    'columns': 5
  });

});