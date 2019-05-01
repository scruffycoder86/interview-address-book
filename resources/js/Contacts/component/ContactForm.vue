<template>
    <b-col>
        <b-form @submit="onSubmit" @reset="onReset">
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
            <b-button type="submit" @click="addDetail()" variant="outline-secondary">Add Detail</b-button>
            <b-button type="submit" variant="outline-primary">Save Contact</b-button>
            <b-button type="reset" variant="danger">Dispose Entry</b-button>
        </b-card-footer>
    </b-col>
</template>
<script>

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
                detail: [
                    {
                        numbers: [],
                        emails: []
                    }
                ],
                show: true
            }
        },

        methods: {

            addDetail() {

            },

            onReset() {

            },

            onSubmit() {

            }
        }
    }
</script>