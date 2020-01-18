import Vue from 'vue'
import Router from 'vue-router'
import Welcome from '../views/welcome.vue'
import AuthLayout from "../components/Layout/AuthLayout";

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
