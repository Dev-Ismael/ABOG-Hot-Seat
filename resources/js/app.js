/*======= import Vue from dependencies =======*/
import { createApp } from 'vue';
// create vue app & name it var (app)
const app = createApp({});


/*======= import Vue router =======*/
import router from './router/vue-router';
app.use(router);


/*======= Sweetalert2 =======*/
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
app.use(VueSweetalert2);


/*======= ckeditor5 =======*/
import CKEditor from '@ckeditor/ckeditor5-vue';
app.use( CKEditor );


/*====================================================
===== Import Admin JS Components
====================================================*/
// Layouts
import admin_navbar from './Admin/Components/Layouts/admin_navbar.vue';
import admin_sidebar from './Admin/Components/Layouts/admin_sidebar.vue';
app.component('admin_navbar', admin_navbar);
app.component('admin_sidebar', admin_sidebar);


app.mount('#app');
