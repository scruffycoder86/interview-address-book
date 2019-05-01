<template>
    <div>
        <h4>Contact List</h4>
        <b-alert variant="success"  v-if={ items.length == 0 }>You currently have no contacts on your list. Click "Add New" from buttons above to ceate one.</b-alert>
        <b-table striped hover :fields="fields">
            <template slot="number" slot-scope="item">
                {{ item.item.number }}
                <b-badge pill variant="primary">3</b-badge>
            </template>
            <template slot="email" slot-scope="item">
                {{ item.item.email }}
                <b-badge pill variant="primary">2</b-badge>
            </template>
            <template slot="actions" slot-scope="item">
                <a :href="`#edit/${item.item.id}`">Edit</a>
                &nbsp;|&nbsp;
                <a :href="`#delete/${item.item.id}`">Delete</a>
                &nbsp;|&nbsp;
                <a :href="`#view/${item.item.id}`">View</a>
            </template>
        </b-table>
    </div>
</template>

<script>

    'use strict';

    import AxiosService from 'axios';



    export default {

        data: function() {

            return {

                fields: [
                    {
                        key: 'first_name',
                        label: 'First Name'
                    },{
                        key: 'last_name',
                        label: 'Last Name'
                    },
                    {
                        key: 'number',
                        label: 'Last Name'
                    },
                    {
                        key: 'email',
                        label: 'Last Name'
                    },
                    {
                        key: 'actions',
                        label: 'Last Name'
                    }
                ],
                items: []
            }
        },

        mounted() {

            let axios = AxiosService.create({
                baseURL: process.env.MIX_SERVICE_ID ,
                headers: {'Content-Type': 'application/json'}
            });

            let app = this;

            axios.get('/contacts')
                .then(function (resp) {
                    app.items = resp;
                })
                .catch(function (resp) {
                    alert("You currently have no contacts. Create new contacts by clicking Add New from above.");
                });
        },

        methods: {

            edit(item) {

                this.$router.push({ name: "edit" });
            },

            remove(item) {

                if(confirm("Are you sure you want to remove " + item.first_name)){
                    console.log(item.first_name + " will be removed");
                }
            }
        }
    }
</script>