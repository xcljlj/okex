
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// window.Vue = require('vue');

import  http from './http'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// import ElementUI from 'element-ui';
// Vue.use(ElementUI);
// import 'element-ui/lib/theme-chalk/index.css';

import Vant from 'vant'
Vue.use(Vant);
import { Lazyload } from 'vant'
Vue.use(Lazyload);


import 'vant/lib/vant-css/index.css';


import App from './App.vue';
import router from './router/index.js';

Vue.prototype.$http = http

const app = new Vue({
  el: '#app',
  router,
  render: h => h(App)
});
