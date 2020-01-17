/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.config.devtools = false;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/HotComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
var csrf = $('meta[name="csrf-token"]').attr('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrf;

Vue.component('hot-component', require('./components/HotComponent.vue').default);
Vue.component('city-component', require('./components/CityComponent.vue').default);
Vue.component('hot-tours', require('./components/Hottours.vue').default);
Vue.component('pick-me-tour', require('./components/PickMeTour.vue').default);
Vue.component('installment-tours', require('./components/InstallmentTours.vue').default);
Vue.component('currency', require('./components/Currency.vue').default);
Vue.component('review', require('./components/Review.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});