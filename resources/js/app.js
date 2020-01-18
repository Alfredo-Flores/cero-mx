// Boostrap y axios por defecto
import {ValidationObserver, ValidationProvider} from "vee-validate";

require("./bootstrap");

window.Vue = require('vue');

// Modulos NPM
import VueToastr from "vue-toastr";
import VueMaterial from 'vue-material'
import SideBar from "./components/SidebarPlugin";
import Chartist from "chartist";
import VueRouter from 'vue-router';
import DashboardPlugin from "./material-dashboard";
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';
import App from './App.vue'
import routes from "./routes/routes";
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueAuth from '@websanova/vue-auth'

// CSS para el Modulos
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/vue-material.css'

// Importar a Vue
Vue.use(VueMaterial);
Vue.use(VueToastr);
Vue.use(VueRouter);
Vue.use(DashboardPlugin);
Vue.use(SideBar);
Vue.use(VueInternationalization);

axios.defaults.baseURL = 'http://localhost:50000/api';

// Internalicionalizacion
const lang = document.documentElement.lang.substr(0, 2);

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

Vue.http.options.root = 'https://api-demo.websanova.com/api/v1';

// configure router
Vue.router = new VueRouter({
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



Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/vue-resource.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js')
});


// global library setup
Vue.prototype.$Chartist = Chartist;

// Chartist
Object.defineProperty(Vue.prototype, "$Chartist", {
    get() {
        return Chartist;
    }
});

new Vue({
    el: "#app",
    render: h => h(App),
    router
});
