// Boostrap y axios por defecto
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
import FullCalendar from "@fullcalendar/vue";
import Swal from 'sweetalert2'


// CSS para el Modulos
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/vue-material.css'
import 'font-awesome/css/font-awesome.css'

// Importar a Vue
Vue.use(VueMaterial);
Vue.use(VueToastr);
Vue.use(VueRouter);
Vue.use(SideBar);
Vue.use(VueInternationalization);
Vue.use(DashboardPlugin);

// Internalicionalizacion
const lang = document.documentElement.lang.substr(0, 2);

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

// Plugins
import App from "./App.vue";

// router setup
import routes from "./routes/routes";

// configure router
const router = new VueRouter({
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

// global library setup
Vue.prototype.$Chartist = Chartist;

/* eslint-disable no-new */
new Vue({
    el: "#app",
    render: h => h(App),
    router
});
