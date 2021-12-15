import Vue from 'vue';
import VueRouter from 'vue-router';
import UserShow from "./views/Users/Show";
import NewsFeed from "./views/NewsFeed";

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: process.env.MIX_APP_URL+'/admin/social/', name: 'home', component: NewsFeed,
            meta: { title: 'social Media' }
          },
     ]
});
