import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('./views/Home.vue')
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('./views/Login.vue')
        },
        {
            path: '/products',
            name: 'products',
            component: () => import('./views/ProductList.vue')
        },
        {
            path: '/manage',
            name: 'manage',
            component: () => import('./views/ProductManagement.vue')
        }
    ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');
