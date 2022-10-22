

/*=======  import vue router =======*/
import { createRouter, createWebHistory } from 'vue-router'

// Import Pages
import DashboardPage from '../views/dashboard.vue';
import ServicePage from '../views/service.vue';
import MessegePage from '../views/messege.vue';
import ClientPage from '../views/client.vue';
import SeoManagmentPage from '../views/seoManagment.vue';
import PlanPage from '../views/plan.vue';
import NewsletterPage from '../views/newsletter.vue';
import SubscriberPage from '../views/subscriber.vue';
import ProfilePage from '../views/profile.vue';
import SettingsPage from '../views/settings.vue';
import notFoundPage from '../views/notFoundPage.vue';

// Routes
const routes = [
    { path: '/admin/profile' , component: ProfilePage },
    { path: '/admin/service' , component: ServicePage },
    { path: '/admin/newsletter' , component: NewsletterPage },
    { path: '/admin/subscriber' , component: SubscriberPage },
    { path: '/admin/client' , component: ClientPage },
    { path: '/admin/messege' , component: MessegePage },
    { path: '/admin/seo-managment' , component: SeoManagmentPage },
    { path: '/admin/plan' , component: PlanPage },
    { path: '/admin/settings' , component: SettingsPage },
    { path: '/admin/dashboard' , component: DashboardPage },
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
