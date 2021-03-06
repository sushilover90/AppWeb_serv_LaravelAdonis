/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-stats', require('./components/UserGlobalStats.vue').default);
Vue.component('verify-laravel-token', require('./components/VerifyLaravelToken.vue').default);
Vue.component('verify-shodan-token', require('./components/VerifyShodanToken.vue').default);
Vue.component('verify-adonis-token', require('./components/VerifyAdonisToken.vue').default);
Vue.component('create-adonis-user', require('./components/CreateAdonisUser.vue').default);
Vue.component('protocols', require('./components/Protocols.vue').default);
Vue.component('ports', require('./components/Ports.vue').default);
Vue.component('ip', require('./components/Ip.vue').default);
Vue.component('triggers', require('./components/Triggers.vue').default);
Vue.component('facets', require('./components/Facets.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
