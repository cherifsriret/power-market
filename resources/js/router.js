import Vue from 'vue';
import VueRouter from 'vue-router';
import UserShow from "./views/Users/Show";
import NewsFeed from "./views/NewsFeed";

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/InterCome/power-market/admin/social/', name: 'home', component: NewsFeed,
            meta: { title: 'social Media' }
          },
        {
            path: '/InterCome/power-market/admin/my-profil/users/:userId', name: 'user.show', component: UserShow,
            meta: {title: 'Profile'}
        },
     ]
});
