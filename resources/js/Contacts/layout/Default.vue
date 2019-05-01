<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header class="justify-content-end d-flex">
                    <h3>{{ appName }}</h3>
                </header>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <b-button @click="contactOverview" class="pb-1" variant="primary">Overview</b-button>
                <b-button @click="createNewContact" variant="outline-primary">Add New</b-button>
            </div>
            <div class="col-md-6">
                <div class="input-group justify-content-end d-flex pull-right">
                    <input type="text" class="form-control col-md-6" placeholder="Search here">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12 card">
                <b-card-body>
                    <router-view></router-view>
                </b-card-body>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data: function() {

            return {
                appName: 'AddressBook Demo'
            };
        },

        methods: {

            contactOverview() {
                this.$router.push({ name: "Contact Overview" });
            },

            createNewContact() {
                this.$router.push({ name: "Create Contact" });
            }
        }
    }
</script>

<style>

</style>