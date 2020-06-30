require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import VueLazyload from 'vue-lazyload';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueLazyload, {
    preLoad: 1
});

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});

