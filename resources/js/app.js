import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import router from './Contacts/router';

import App from './Contacts/layout/Default';

Vue.use(BootstrapVue);

new Vue({
    el: '#app',
    router,
    render: h => h(App)
});