
require('./bootstrap');
import Vue from 'vue';
// Require Vue
window.Vue = require('vue').default;
//Import v-from
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;     
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('booking-component', require('./components/BookingComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('dashboard-component', require('./components/DashboardComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);

const app = new Vue({
  el: '#app'
});
