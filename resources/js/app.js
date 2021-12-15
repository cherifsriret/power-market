import Vue from 'vue';
import router from './router';
import App from './components/App';
import store from './store';

require('./bootstrap');

Vue.component('chat-component', require('./components/ChatComponent.vue').default);

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)


const app = new Vue({
    el: '#app',
    components: {
        App
    },

    router,

    store,
});
