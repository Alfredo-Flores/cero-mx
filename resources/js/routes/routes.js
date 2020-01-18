import EmpresasLayout from "../components/Layout/EmpresasLayout";
import OrganizacionesLayout from "../components/Layout/OrganizacionesLayout";
import AuthLayout from "../components/Layout/AuthLayout.vue";

import Welcome from "../views/Welcome.vue";
import Login from "../views/Users/Login.vue";
import Register from "../views/Users/Register.vue";
import RegisterInstitution from "../views/Users/RegisterInstitution.vue";

import EmpresasOferta from "../views/Tblentemp/Main.vue";

let authPages = {
    path: "/",
    component: AuthLayout,
    children: [
        {
            path: "/",
            name: "welcome",
            component: Welcome,
            meta: {
                auth: false
            }
        },
        {
            path: "login",
            name: "login",
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: "register",
            name: "register",
            component: Register,
            meta: {
                auth: false
            }
        },
        {
            path: "oferta",
            name: "oferta",
            component: EmpresasOferta,
            meta: {
                auth: true
            }
        }
    ]
};


const routes = [
    authPages,
];

export default routes;
