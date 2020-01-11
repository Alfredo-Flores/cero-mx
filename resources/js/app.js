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
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';



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

// Internalicionalizacion
const lang = document.documentElement.lang.substr(0, 2);

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

import DashboardPlugin from "./material-dashboard";

import PricingCard from "./components/Cards/PricingCard.vue";
import SignupCard from "./components/Cards/SignupCard.vue";
import LockCard from "./components/Cards/LockCard.vue";
import LoginCard from "./components/Cards/LoginCard.vue";
import StatsCard from "./components/Cards/StatsCard.vue";
import ChartCard from "./components/Cards/ChartCard.vue";
import TestimonialCard from "./components/Cards/TestimonialCard.vue";
import GlobalSalesCard from "./components/Cards/GlobalSalesCard.vue";
import NavTabsCard from "./components/Cards/NavTabsCard.vue";
import ProductCard from "./components/Cards/ProductCard.vue";

import SimpleWizard from "./components/Wizard/Wizard.vue";
import WizardTab from "./components/Wizard/WizardTab.vue";
import FirstStep from "./components/Wizard/Steps/FirstStep.vue";
import SecondStep from "./components/Wizard/Steps/SecondStep.vue";
import EmpresaStep from "./components/Wizard/Steps/EmpresaStep.vue";
import OrganizacionStep from "./components/Wizard/Steps/OrganizacionStep.vue";
import InternacionalStep from "./components/Wizard/Steps/InternacionalStep.vue";
import IconCheckbox from "./components/Inputs/IconCheckbox.vue";

import SlideYDownTransition from "vue2-transitions";
import { required, email } from "vee-validate/dist/rules";

Vue.component("validation-provider", ValidationProvider);
Vue.component("validation-observer", ValidationObserver);
Vue.component("pricing-card", PricingCard);
Vue.component("login-card", LoginCard);
Vue.component("simple-wizard", SimpleWizard);
Vue.component("wizard-tab", WizardTab);
Vue.component("first-step", FirstStep);
Vue.component("second-step", SecondStep);
Vue.component("empresa-step", EmpresaStep);
Vue.component("organizacion-step", OrganizacionStep);
Vue.component("internacional-step", InternacionalStep);
Vue.component("icon-checkbox", IconCheckbox);
Vue.component("signup-card", SignupCard);

Vue.use(DashboardPlugin);

Vue.config.performance = true;

// Chartist
Object.defineProperty(Vue.prototype, "$Chartist", {
    get() {
        return Chartist;
    }
});

// Buildear Vue
const app = new Vue({
    el: '#app',
    i18n,
    mixins: window.pageMix
});
