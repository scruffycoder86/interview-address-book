<template>
    <div>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
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
                    description="Part of a Contact Detail."
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
                    description="Part of a Contact Detail."
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
            <b-button type="submit" variant="outline-primary">Save Contact</b-button>
            <b-button type="submit" @click="addDetail()" variant="outline-secondary">Add Detail</b-button>
            <b-button type="reset" variant="danger">Dispose Entry</b-button>
            <b-button type="submit" @click="viewContacts()" variant="primary" class="pull-right">View Contacts</b-button>
        </b-card-footer>
    </div>
</template>

<script>
    import DetailComponent from './../component/DetailComponent';
    import BCol from "bootstrap-vue/src/components/layout/col";

    export default {

        components: {BCol, DetailComponent },

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

            onSubmit(evt) {

                evt.preventDefault();

                alert(JSON.stringify(this.form))
            },

            onReset(evt) {

                evt.preventDefault();

                this.form.first_name = '';
                this.form.last_name = '';
                this.form.number = '';
                this.form.email = '';

                this.show = false;

                this.$nextTick(() => {
                    this.show = true
                })
            },

            addDetail(evt) {

                evt.preventDefault();
                console.log(evt);
            },

            viewContacts() {

            }
        }
    }
</script>