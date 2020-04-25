
require('./bootstrap');

import 'vue-select/dist/vue-select.css';
import router from './router'
import GlobalComponents from './GlobalComponents'
window.Vue = require('vue');

// store
const Vuex = require('vuex');
window.store = new Vuex.Store({
    state: {
        productsCount: 0
    },
    // mutations
    mutations: {
        increment(state){
         return  state.productsCount++;
        },
        set(state, value){
            return  state.productsCount = value;
        }
    }
});

Vue.use(GlobalComponents);
const app = new Vue({
    el: '#app',
    router
});
