/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import axios from 'axios'
window.axios = axios

Vue.use(Vuetify)
Vue.use(VueRouter)

import App from './views/App'
import Profile from './components/Profile'
import Workout from './components/Workout'
import Schedule from './components/Schedule'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'app',
            component: App
        },
        {
            path: '/profile',
            name: 'profile',
            component: Profile
        },
        {
            path: '/schedule',
            name: 'schedule',
            component: Schedule,
        },
        {
            path: '/workout',
            name: 'workout',
            component: Workout,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
