<template>
    <b-col>
        <b-form  @reset="onReset">
            <b-form-group id="input-group-0">
                <span class="pull-right"><i>You can either enter Contact Number or Contact Email for a valid Contact Detail</i></span>
            </b-form-group>
            <b-form-group id="input-group-1" label="First Name:" label-for="input-1">
                <b-form-input
                        id="input-1"
                        v-model="form.first_name"
                        placeholder="Enter fist name"
                ></b-form-input>
            </b-form-group>
            <b-form-group id="input-group-2" label="Last Name:" label-for="input-2">
                <b-form-input
                        id="input-2"
                        v-model="form.last_name"
                        placeholder="Enter last name"
                ></b-form-input>
            </b-form-group>
            <b-form-group
                    id="input-group-3"
                    label="Number:"
                    label-for="input-3"
            >
                <b-form-input
                        id="input-3"
                        v-model="form.number"
                        type="text"
                        placeholder="Enter number"
                ></b-form-input>
            </b-form-group>
            <b-form-group
                    id="input-group4"
                    label="Email:"
                    label-for="input-4"
            >
                <b-form-input
                        id="input-4"
                        v-model="form.email"
                        type="email"
                        placeholder="Enter email"
                ></b-form-input>
            </b-form-group>
        </b-form>
        <b-card-footer>
            <b-button type="submit" @click="addDetail($event)" variant="outline-secondary">Add Detail</b-button>
            <b-button type="submit" @submit="onSubmit($event)" variant="outline-primary">Save Contact</b-button>
            <b-button type="reset" variant="danger">Dispose Entry</b-button>
        </b-card-footer>
    </b-col>
</template>
<script>

    import axios from 'axios';

    let api = axios.create({
        baseURL: process.env.MIX_SERVICE_ID ,
        headers: {'Content-Type': 'application/json'},
        crossdomain: true
    });

    export default {

        name: 'contact-form',

        data() {

            return {
                form: {
                    first_name: '',
                    last_name: '',
                    number: '',
                    email: ''
                },
                details: [ ],
            }
        },

        methods: {

            addDetail(event) {

                let entry = {
                    number: this.form.number,
                    email: this.form.email
                };

                this.details.push(entry);

                event.preventDefault();
            },

            onReset() {

            },

            onSubmit(event) {

                alert(JSON.stringify(this.form));

                api.post('/api/contacts', {
                    params: {
                        first_name: this.form.first_name,
                        last_name: this.form.last,
                        details: this.details }
                }).then(function(response){
                        this.$router.push({ name: "Contact List" });
                    }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>