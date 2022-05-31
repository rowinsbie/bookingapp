<template lang="">
    <div class="row">
        <div class="col-lg-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4>Passenger's Booking </h4>
                    <h6>Tour Name</h6>
                    <hr />
                    <form action="">
                        <div class="form-group">
                            <label for="dates">Available Dates</label>
                            <select v-on:change="showPassengers()" name="date" v-model="Passenger.date" id="date" class="form-control">
                                <option value="">Select Date</option>
                                <option
                                    v-for="(date, index) in showDates"
                                    
                                >
                                    {{ date.date }}
                                </option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <div class="form-group mt-3">
                                <label for="firstName">First Name</label>
                                <input
                                    type="text"
                                    id="fname"
                                    name="fname"
                                    class="form-control"
                                    v-model="Passenger.given_name"
                                />
                            </div>
                            <div class="form-group mt-3">
                                <label for="lastName">Last Name</label>
                                <input
                                    type="text"
                                    id="lname"
                                    name="lname"
                                    class="form-control"
                                    v-model="Passenger.surname"
                                />
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input
                                    type="text"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    v-model="Passenger.email"
                                />
                            </div>
                            <div class="form-group mt-3">
                                <label for="mobile">Mobile</label>
                                <input
                                    type="text"
                                    id="mobile"
                                    name="mobile"
                                    class="form-control"
                                     v-model="Passenger.mobile"
                                />
                            </div>
                            <div class="form-group mt-3">
                                <label for="passport">Passport</label>
                                <input
                                    type="text"
                                    id="passport"
                                    name="passport"
                                    class="form-control"
                                     v-model="Passenger.passport"
                                />
                            </div>
                            <div class="form-group mt-3">
                                <label for="datebirth">Date of Birth</label>
                                <Datepicker
                                    v-model="Passenger.birthDate"
                                    :format="format"
                                ></Datepicker>
                            </div>
                            <div class="form-group mt-3">
                                <label for="specreq">Special Request</label>
                                <textarea
                                    name="specreq"
                                    id="specreq"
                                    cols="30"
                                    rows="4"
                                    class="form-control"
                                    v-model="Passenger.Request"
                                ></textarea>
                            </div>
                            <div class="form-group mt-3 text-center">
                                <router-link
                                    to="/tour-list"
                                    class="btn border m-2"
                                    >Cancel</router-link
                                >

                                <button
                                    type="button"
                                    v-on:click="AddPassengers()"
                                    class="btn btn-primary"
                                >
                                    Add Passenger
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mt-5">
            <PassengersList />
        </div>
    </div>
</template>
<script>
import PassengersList from "./PassengersList.vue";
import Booking from "../../../state/Booking";
import { useRoute } from "vue-router";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import { ref } from "@vue/reactivity";

export default {
    components: {
        PassengersList,
        Datepicker,
    },
    setup() {
        const date = ref(new Date());

        const format = (date) => {
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();

            return `${day}/${month}/${year}`;
        };

        return {
            date,
            format,
        };
    },
    data() {
        return {
            Passenger: {
                tourID: useRoute().params.id,
                date: null,
            },
        };
    },
    mounted() {
        Booking.dispatch("GET_DATES", this.Passenger.tourID);
    },
    methods: {
        emptyForm(date)
        {
            this.Passenger = {
                date:date,
                given_name:"",
                surname:"",
                email:"",
                mobile:"",
                passport:"",
                Request:"",
                birthDate:""
            }
        },
        AddPassengers() {
            Booking.dispatch("ADD_PASSENGER", {
                data:this.Passenger
            });

          
             this.emptyForm(this.Passenger.date);
             this.showPassengers();
           
        },

        showPassengers()
        {
             Booking.dispatch("SHOW_PASSENGERS", {
                 tourID:this.Passenger.tourID,
                 date:this.Passenger.date
             });
        }
    },
    computed: {
        showDates() {
            return Booking.getters.getDates;
        },
    },
};
</script>
<style lang=""></style>
