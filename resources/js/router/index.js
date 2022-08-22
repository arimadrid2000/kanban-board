import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: () => import('../components/auth/LoginComponent'),
        name: 'login',
    },
    {
        path: '/register',
        component: () => import('../components/auth/RegisterComponent'),
        name: 'register',
    },
    {
        path: '/cards',
        component: () => import('../components/cards/CardListComponent'),
        name: 'card',
    }
];  	

const router = new VueRouter({routes});

export default router;