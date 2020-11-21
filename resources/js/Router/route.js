import Router from 'vue-router';

import Vue from 'vue';

import Index from '../Pages/index.vue';


Vue.use(Router);

const routes = [
    {
        name: 'index',
        path: '/',
        component: Index
    },
];

export default new Router({
    mode: 'history',
    linkExactActiveClass: 'is-active',
    routes
});