require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import LoginComponent from './components/LoginComponent.vue';
import HomeComponent from './components/HomeComponent.vue';
import CreateProjetComponent from './components/CreateProjetComponent.vue';
import CreateToDoComponent from './components/CreateToDoComponent.vue';
import EditToDoComponent from './components/EditToDoComponent.vue';
import CreateTaskComponent from './components/CreateTaskComponent.vue';

const routes = [{
        name: 'login',
        path: '/',
        component: LoginComponent
    },

    {
        name: 'home',
        path: '/home',
        component: HomeComponent
    },

    {
        name: 'createprojet',
        path: '/createprojet',
        component: CreateProjetComponent
    },
    {
        name: 'createtodo',
        path: '/createtodo',
        component: CreateToDoComponent
    },
    {
        name: 'edittodo',
        path: '/edittodo/:id',
        component: EditToDoComponent
    },
    {
        name: 'createtask',
        path: '/createtask/:id',
        component: CreateTaskComponent
    },

];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});
const app = new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
