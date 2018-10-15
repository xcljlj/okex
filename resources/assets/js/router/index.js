import Vue from 'vue'
import VueRouter from 'vue-router';
Vue.use(VueRouter);

export default new VueRouter({
    saveScrollPosition: true,
    routes: [
        {
            name: 'index',
            path: '',
            component: resolve => void(require(['../components/html5/index.vue'], resolve))
        },
        {
            name: 'login',
            path: '/login',
            component: resolve => void(require(['../components/html5/login.vue'], resolve))
        },
        {
            name: 'register',
            path: '/register',
            component: resolve => void(require(['../components/html5/register.vue'], resolve))
        }
    ]
});

