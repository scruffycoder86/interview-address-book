<template>
    <div>
        <h4>Contact List</h4>
    </div>
</template>

<script>

    import ContactsService from './../service/ContactsService';

    export default {

        mounted() {

            console.log(ContactsService.fetch())
        }
    }
</script>