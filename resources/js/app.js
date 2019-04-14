require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);

import App from './components/App.vue';
import Home from './components/HomeComponent.vue';
import JabatanIndex from './components/jabatan/JabatanIndex.vue';
import JabatanCreate from './components/jabatan/JabatanCreate.vue';
import JabatanEdit from './components/jabatan/JabatanEdit.vue';
import PegawaiIndex from './components/pegawai/PegawaiIndex';
import PegawaiCreate from './components/pegawai/PegawaiCreate';
import PegawaiEdit from './components/pegawai/PegawaiEdit';

const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'jabatan',
        path: '/jabatan',
        component: JabatanIndex
    },
    {
        name: 'jabatantambah',
        path: '/jabatan/tambah',
        component: JabatanCreate
    },
    {
        name: 'jabatanedit',
        path: '/jabatan/edit/:id',
        component: JabatanEdit
    },
    {
        name:'pegawai',
        path: '/pegawai',
        component: PegawaiIndex
    },
    {
        name: 'pegawaitambah',
        path: '/pegawai/tambah',
        component: PegawaiCreate
    }, {
        name: 'pegawaiedit',
        path: '/pegawai/edit/:id',
        component: PegawaiEdit
    },
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
