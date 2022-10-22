

/*=======  import vue router =======*/
import { createRouter, createWebHistory } from 'vue-router'


/*=======================================================*/
/*=============== Import Front Pages  ==================*/
/*======================================================*/
import HomePage from '../web/Pages/Home.vue';
import RegisterPage from '../web/Pages/Register.vue';
import notFoundPage from '../web/Pages/notFoundPage.vue';


/*=======================================================*/
/*=============== Import Admin Pages  ==================*/
/*======================================================*/
// import HomePage from '../web/Pages/Home.vue';



// Routes
const routes = [
    { path: '/' , component: HomePage },
    { path: '/register' , component: RegisterPage },
    { path: "/:catchAll(.*)" , component: notFoundPage },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }   // at click router link vuejs go top page "vue router scroll behavior"
    }
});

export default router;
