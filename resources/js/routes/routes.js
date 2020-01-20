import EmpresasLayout from "../components/Layout/EmpresasLayout";
import OrganizacionesLayout from "../components/Layout/OrganizacionesLayout";
import AuthLayout from "../components/Layout/AuthLayout.vue";

import Welcome from "../views/Welcome.vue";
import Login from "../views/Users/Login.vue";
import Register from "../views/Users/Register.vue";
import RegisterInstitution from "../views/Users/RegisterInstitution.vue";

import EmpresasOferta from "../views/Tblentemp/Main.vue";
import EmpresasCalendario from "../views/Tblentemp/Calendario.vue";
import EmpresasPerfil from "../views/Tblentemp/Perfil.vue";

import OrganizacionesOferta from "../views/Tblentorg/Main.vue";
import OrganizacionesCalendario from "../views/Tblentorg/Calendario.vue";
import OrganizacionesPerfil from "../views/Tblentorg/Perfil.vue";

let authPages = {
    path: "/",
    component: AuthLayout,
    children: [
        {
            path: "/",
            name: "welcome",
            component: Welcome,
            meta: {
                auth: undefined
            },
        },
        {
            path: "login",
            name: "login",
            component: Login,
            meta: {
                auth: false,
                redirect: "/"
            },
        },
        {
            path: "register",
            name: "register",
            component: Register,
            meta: {
                auth: false,
                redirect: "/"
            },

        },
        {
            path: "registerinstitution",
            name: "registerinstitution",
            component: RegisterInstitution,
            meta: {
                auth: true,
                redirect: "/"
            }
        }
    ]
};

let empPages = {
    path: "/empresa",
    component: EmpresasLayout,
    children: [
        {
            path: "oferta",
            name: "oferta",
            component: EmpresasOferta,
            meta: {
                auth: ['empresa'],
                redirect: "/"
            }
        },
        {
            path: "calendario",
            name: "calendario",
            component: EmpresasCalendario,
            meta: {
                auth: ['empresa'],
                redirect: "/"
            }
        },
        {
            path: "perfil",
            name: "perfil",
            component: EmpresasPerfil,
            meta: {
                auth: ['empresa'],
                redirect: "/"
            }
        }
    ]
};

let orgPages = {
    path: "/oroganizacion",
    component: OrganizacionesLayout,
    children: [
        {
            path: "oferta",
            name: "oferta",
            component: OrganizacionesOferta,
            meta: {
                auth: true,
                redirect: "/"
            }
        },
        {
            path: "calendario",
            name: "calendario",
            component: OrganizacionesCalendario,
            meta: {
                auth: true,
                redirect: "/"
            }
        },
        {
            path: "perfil",
            name: "perfil",
            component: OrganizacionesPerfil,
            meta: {
                auth: true,
                redirect: "/"
            }
        }
    ]
};

const routes = [
    authPages,
    empPages
];

export default routes;
