import Vue from 'vue'
import Router from 'vue-router'

import defaultsAccount from './accounts'

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        defaultsAccount
    ]
});