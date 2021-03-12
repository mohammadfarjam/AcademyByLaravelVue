
import './bootstrap';
import Vue from 'vue';

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import routes from './routes';
Vue.use(VueRouter);


Vue.component('Header', require('./components/Header.vue').default);


const app = new Vue({
    el: '#app',
    // router : new VueRouter(routes)
});
