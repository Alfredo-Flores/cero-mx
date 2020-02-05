// Boostrap y axios por defecto
require("./bootstrap");
window.Vue = require('vue');

// Modulos NPM
import VueToastr from "vue-toastr";
import VueMaterial from 'vue-material'
import SideBar from "./components/SidebarPlugin";
import VueRouter from 'vue-router';
import DashboardPlugin from "./material-dashboard";
import App from './App.vue'
import routes from "./routes/routes";
import axios from 'axios'
import VueResource from 'vue-resource'

// CSS para el Modulos
import 'vue-material/dist/vue-material.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@fortawesome/fontawesome-free/css/all.min.css'

// Importar a Vue
Vue.use(VueMaterial);
Vue.use(VueToastr);
Vue.use(VueRouter);
Vue.use(DashboardPlugin);
Vue.use(SideBar);
Vue.use(VueResource);

axios.defaults.baseURL = '/api';
Vue.http.options.root = '/api';

// configure router
const router = new VueRouter({
    mode: 'history',
    routes, // short for routes: routes
    scrollBehavior: to => {
        if (to.hash) {
            return { selector: to.hash };
        } else {
            return { x: 0, y: 0 };
        }
    },
    linkExactActiveClass: "nav-item active"
});


Vue.router = router;

Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/vue-resource.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
    rolesVar: "role",
    fetchData: {url: 'auth/userdata', method: 'GET', enabled: true},
    authRedirect: {path: '/'},
    notFoundRedirect: {path: '/'},
    forbiddenRedirect: {path: '/'},
    logoutData: {url: 'auth/logout', method: 'POST', redirect: '/', makeRequest: true},
    refreshData: {url: 'auth/userdata', method: 'GET', enabled: true, interval: 30},
    parseUserData (data) {
        return data || {}
    },
});

App.router = Vue.router;

new Vue({
    el: "#app",
    render: h => h(App),
    router
});
