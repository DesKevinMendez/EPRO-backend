require('./bootstrap');

window.Vue = require('vue');


Vue.component('Scanner', require('./components/scanner.vue').default);

const app = new Vue({
    el: '#app',
});
