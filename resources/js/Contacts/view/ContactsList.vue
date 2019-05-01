<template>
    <div>
        <h5>Contacts</h5>
    </div>
</template>

<script>

    import axios from 'axios';

    let api = axios.create({
        baseURL: process.env.MIX_SERVICE_ID ,
        headers: {'Content-Type': 'application/json'},
        crossdomain: true
    });

    export default {

        data () {

            return {
                items: []
            }
        },

        created () {

            let contacts = [];

            api.get('/api/contacts')
                .then(function(response){
                    contacts.push(response.data);
                }).catch(function(error){
                console.log(error);
            });

            this.items.push(contacts);
        }
    }
</script>