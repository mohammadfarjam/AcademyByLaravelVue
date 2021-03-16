import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import AdminRoutes from "./AdminRoutes";
Vue.use(VueRouter);


Vue.component('index', require('./components/Admin/Index.vue').default);
Vue.component('add', require('./components/Admin/Toturial/Add.vue').default);


const appAdmin = new Vue({
    el: '#appAdmin',
    router : new VueRouter(AdminRoutes)
});
