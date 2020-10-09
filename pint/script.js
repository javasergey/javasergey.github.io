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