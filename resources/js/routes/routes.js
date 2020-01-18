import EmpresasLayout from "../components/Layout/EmpresasLayout";
import OrganizacionesLayout from "../components/Layout/OrganizacionesLayout";
import AuthLayout from "../components/Layout/AuthLayout.vue";

import Landing from "../App/Landing.vue";
import Login from "../App/Users/Login.vue";
import Register from "../App/Users/Register.vue";
import RegisterInstitution from "../App/Users/RegisterInstitution.vue";

let authPages = {
    path: "/",
    component: AuthLayout,
    children: [
        {
            path: "/",
            name: "landing",
            component: Landing
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
    ]
};

const routes = [
    {
        path: "/",
        redirect: "/login",
        name: "Home"
    },
    authPages,
];

export default routes;
