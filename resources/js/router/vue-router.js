
/*=======  import vue router =======*/
import { createRouter, createWebHistory } from 'vue-router'


/*=======================================================*/
/*=============== Import Admin Pages  ==================*/
/*======================================================*/


// Import Pages
import DashboardPage from '../Admin/Pages/dashboard.vue';
import MessegePage from '../Admin/Pages/messege.vue';
import OrderPage from '../Admin/Pages/order.vue';
import UserPage from '../Admin/Pages/user.vue';
import PlanPage from '../Admin/Pages/plan.vue';
import ProfilePage from '../Admin/Pages/profile.vue';
import SettingsPage from '../Admin/Pages/settings.vue';
import notFoundPage from '../Admin/Pages/notFoundPage.vue';

// Routes
const routes = [
    { path: '/admin/dashboard' , component: DashboardPage },
    { path: '/admin/messege' , component: MessegePage },
    { path: '/admin/order' , component: OrderPage },
    { path: '/admin/user' , component: UserPage },
    { path: '/admin/plan' , component: PlanPage },
    { path: '/admin/profile' , component: ProfilePage },
    { path: '/admin/settings' , component: SettingsPage },
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
