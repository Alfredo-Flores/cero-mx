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
    meta: {
        auth: ['empresa'],
        redirect: "/"
    },
    children: [
        {
            path: "oferta",
            name: "Ofertas Empresariales",
            component: EmpresasOferta,
            meta: {
                auth: ['empresa'],
                redirect: "/"
            }
        },
        {
            path: "calendario",
            name: "Calendario Empresarial",
            component: EmpresasCalendario,
            meta: {
                auth: ['empresa'],
                redirect: "/"
            }
        },
        {
            path: "perfil",
            name: "Perfil Empresarial",
            component: EmpresasPerfil,
            meta: {
                auth: ['empresa'],
                redirect: "/"
            }
        }
    ]
};

let orgPages = {
    path: "/organizacion",
    component: OrganizacionesLayout,
    children: [
        {
            path: "oferta",
            name: "Ofertas publicas",
            component: OrganizacionesOferta,
            meta: {
                auth: ['organizacion'],
                redirect: "/"
            }
        },
        {
            path: "calendario",
            name: "Calendario de la organización",
            component: OrganizacionesCalendario,
            meta: {
                auth: ['organizacion'],
                redirect: "/"
            }
        },
        {
            path: "recepcion",
            name: "Recepción de la organización",
            component: OrganizacionesCalendario,
            meta: {
                auth: ['organizacion'],
                redirect: "/"
            }
        },
        {
            path: "perfil",
            name: "Perfil de la organización",
            component: OrganizacionesPerfil,
            meta: {
                auth: ['organizacion'],
                redirect: "/"
            }
        }
    ]
};

const routes = [
    authPages,
    empPages,
    orgPages
];

export default routes;
