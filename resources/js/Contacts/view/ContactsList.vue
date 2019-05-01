<template>
    <div>
        <h5>Contacts</h5>
        <p v-show="showAlert">
            <b-alert>You currently have no Contacts in the system. Click "Add New" to create an entry.</b-alert>
        </p>
        <demo-table-list :items="items"></demo-table-list>
    </div>
</template>

<script>

    import axios from 'axios';
    import DemoTableList from './../component/TableList';

    let api = axios.create({
        baseURL: process.env.MIX_SERVICE_ID ,
        headers: {'Content-Type': 'application/json'},
        crossdomain: true
    });

    export default {

        components: { DemoTableList },

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
        },

        methods: {

            showAlert() {

                return (this.items.length);
            }
        }
    }
</script>