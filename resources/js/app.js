import Vue from 'vue'; // Importing Vue Library
import VueRouter from 'vue-router'; // importing Vue router library
Vue.use(require('vue-resource'));



import Vue2Filters from 'vue2-filters'

Vue.use(Vue2Filters)


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueRouter);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('Seitbar', require('./components/Seitbar.vue').default);

window.Bus = new Vue();
Vue.component('flash-message', require('./components/FlashMessage.vue').default);
//Vue.component('projekt', require('./components/Projekt.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 *UnTafeln
 */

import Notifications from 'vue-notification';
import velocity from 'velocity-animate';

Vue.use(Notifications, { velocity });
Vue.component('toaster-group', require('laralabs-vue-toaster/src/ToasterGroupComponent.vue'));
Vue.component('toaster-logic', require('laralabs-vue-toaster/src/ToasterLogicComponent.vue'));


 import Welcome from './components/dashboard.vue'
 import ProjektForm from './components/ProjektForm.vue'
 import Projekt from './components/Projekt.vue'
 import Kundenform from './components/Kundencreateform.vue'
 import Kunden from './components/kunden.vue'
 import Aufgaben from './components/Aufgabe.vue'
 import Aufgabenform from './components/Aufgabeform.vue'
 import Projektdash from './components/Projektdasch.vue'
 import Kontakte from './components/KontakteForm.vue'
 import Admin from './components/Admin.vue'
 import Lager from './components/UnTafeln.vue'



const router = new VueRouter({
    base: 'admin',
    routes: [
        {
            path: '/',
            component: Welcome
        },
        {
            name:'projekt',
            path: '/projekt',
            component:Projekt
        },
        {
            name:'newprojekt',
            path: '/newprojekt',
            component:ProjektForm
        },
        {
            name:'projektdasch',
            path: '/projektdasch',
            component:Projektdash
        },
        {
            name:'kundenform',
            path: '/kundencrate',
            component:Kundenform
        },
        {
            name:'kunden',
            path: '/kunden',
            component:Kunden
        },
        {
            name:'Aufgaben',
            path: '/aufgaben',
            component:Aufgaben
        },
        {
            name:'aufgabenform',
            path: '/newaufgaben/',
            component:Aufgabenform
        },
        {
            name:'Kontakte',
            path: '/Kontakte/',
            component:Kontakte
        },
        {
            name:'Admin',
            path: '/Admin/',
            component:Admin
        },
        {
            name:'lager',
            path: '/lager/',
            component:Lager
        },

    ],
})





 const app = new Vue({
    el: '#app',
    router
});
