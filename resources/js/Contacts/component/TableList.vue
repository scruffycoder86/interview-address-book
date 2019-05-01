<template>
    <b-row>
        <b-col>
            <b-table striped hover :fields="fields" :items="items">
                <template slot="first_name" slot-scope="item">
                    {{ item.item[0].first_name }}
                </template>
                <template slot="last_name" slot-scope="item">
                    {{ item.item[0].last_name }}
                </template>
                <template slot="number" slot-scope="item">
                    {{ item.item[0].number }}
                </template>
                <template slot="email" slot-scope="item">
                    {{ item.item[0].email }}
                </template>
                <template slot="actions" slot-scope="item">
                    <a :href="`#edit/${item.item[0].id}`">Edit</a>
                    &nbsp;|&nbsp;
                    <a :href="`#delete/${item.item[0].id}`">Delete</a>
                    &nbsp;|&nbsp;
                    <a :href="`#view/${item.item[0].id}`">View</a>
                </template>
            </b-table>
        </b-col>
    </b-row>
</template>

<script>

    export default {

        name: "demo-table-list",

        props: [ "items" ],

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
                        label: 'Number'
                    },
                    {
                        key: 'email',
                        label: 'Email'
                    },
                    {
                        key: 'actions',
                        label: 'Action'
                    }
                ]
            }
        }
    }
</script>