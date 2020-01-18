import EmpresasLayout from "/resources/js/components/Layout/EmpresasLayout";
import OrganizacionesLayout from "/resources/js/components/Layout/OrganizacionesLayout";
import AuthLayout from "/resources/js/components/Layout/AuthLayout.vue";

let authPages = {
  path: "/",
  component: AuthLayout,
  name: "Authentication",
  children: [
    {
      path: "/login",
      name: "Login",
      component: Login
    },
    {
      path: "/register",
      name: "Register",
      component: Register
    },
  ]
};

const routes = [
  {
    path: "/",
    redirect: "/dashboard",
    name: "Home"
  },
  authPages,
  {
    path: "/",
    component: DashboardLayout,
    children: [
      {
        path: "dashboard",
        name: "Dashboard",
        components: { default: Dashboard }
      },
    ]
  }
];

export default routes;
