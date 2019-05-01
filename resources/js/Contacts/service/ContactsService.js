'use strict';

import AxiosService from 'axios';

let axios = AxiosService.create({
    baseURL: process.env.MIX_SERVICE_ID ,
    headers: {'Content-Type': 'application/json'}
});

class ContactsService
{
    static async fetch() {

        axios.get('/api/v1/companies')
            .then(function (resp) {
                app.companies = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Could not load companies");
            });
    }
}

export default ContactsService;