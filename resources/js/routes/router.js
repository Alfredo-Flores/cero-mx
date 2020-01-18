import Vue from 'vue'
import Router from 'vue-router'
import Welcome from '../views/welcome.vue'
import AuthLayout from "../components/Layout/AuthLayout";
import Register from "../views/auth/Register";
import Login from "../views/auth/Login";

Vue.use(Router)

export default new Router({
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'Home',
            component: AuthLayout,
            redirect: "/Welcome",
            children: [
                {
                    path: '/Welcome',
                    name: 'Welcome',
                    component: Welcome
                },
                {
                    path: '/Register',
                    name: 'Register',
                    component: Register
                },
                {
                    path: '/Login',
                    name: 'Login',
                    component: Login
                }
            ]
        },
    ],
    scrollBehavior (to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return { x: 0, y: 0 }
        }
    }
})
