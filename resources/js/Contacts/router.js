import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

import Default from './layout/Default';

import ContactsList from './view/ContactsList';
import CreateContact from './view/CreateContact';

const router = new Router({
    mode: 'hash',
    redirect: 'list',
    component: Default,
    routes: [
        {
            path: 'list',
            name: 'Contact Overview',
            component: ContactsList
        },
        {
            path: 'create',
            name: 'Create Contact',
            component: CreateContact
        }
    ]
});

export default router;