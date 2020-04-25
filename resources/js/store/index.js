import Vue from 'vue'
import Vuex from 'vuex'

// modulos
import shoppingcart from './modules/shoppingcart';

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        shoppingcart
    }
})