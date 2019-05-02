<template>
    <div>
        <h5>Create Contact</h5>
        <b-row>
            <contact-form></contact-form>
        </b-row>
    </div>
</template>

<script>

    import ContactForm from './../component/ContactForm';

    export default {

        components: { ContactForm },

        methods: {

            onReset() {

            },

            onSubmit(event) {


            }
        }
    }
</script>