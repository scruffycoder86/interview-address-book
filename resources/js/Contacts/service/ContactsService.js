'use strict';

import axios from 'axios';

let api = axios.create({
    baseURL: process.env.MIX_SERVICE_ID ,
    headers: {'Content-Type': 'application/json'},
    crossdomain: true
});

class ContactsService
{
    static async fetch() {

        api.get('/api/contacts')
            .then(function (resp) {

                return resp.data;
            })
            .catch(function (err) {

                return err;
            });
    }
}

export default ContactsService;