import Home from './components/projekt.vue';

const router = new VueRouter({
    base: 'admin',
    routes: [
        {
            path: '/',
            component: Home
        },

    ],
})
