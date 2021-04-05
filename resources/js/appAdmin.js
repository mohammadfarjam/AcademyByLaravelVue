import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import routes from './routesAdmin';
import Toaster from 'v-toaster';
import 'v-toaster/dist/v-toaster.css';
import MomentJalali from 'moment-jalaali';


Vue.use(Toaster, {timeout: 5000});
Vue.use(VueRouter);
Vue.use(MomentJalali);






Vue.component('dashboard', require('./components/Dashboard/Dashboard.vue').default);
Vue.component('users-index', require('./components/Admin/users/Index.vue').default);



const appAdmin = new Vue({
    el: '#appAdmin',
    router : new VueRouter(routes)
});
