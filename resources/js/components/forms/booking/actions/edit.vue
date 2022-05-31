<template>
    <div class="row">
        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5>Edit Passenger</h5>
                    <hr />
                    <form>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="fname">Given Name</label>
                                <input
                                    type="text"
                                    v-model="PassengerInfo.given_name"
                                    id="fname"
                                    name="fname"
                                    class="form-control"
                                />
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input
                                    type="text"
                                    id="lname"
                                    v-model="PassengerInfo.surname"
                                    name="lname"
                                    class="form-control"
                                />
                            </div>
                            <div class="form-group">
                                <label for="datebirth">Date of Birth</label>
                                <Datepicker
                                    v-model="PassengerInfo.birthdate"
                                    :format="format"
                                ></Datepicker>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="text"
                                    v-model="PassengerInfo.email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                />
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input
                                    type="text"
                                    v-model="PassengerInfo.mobile"
                                    id="mobile"
                                    name="mobile"
                                    class="form-control"
                                />
                            </div>
                            <div class="form-group">
                                <label for="passport">Passport</label>
                                <input
                                    type="text"
                                    v-model="PassengerInfo.passport"
                                    id="passport"
                                    name="passport"
                                    class="form-control"
                                />
                            </div>
                            <div class="form-group">
                                <label for="specreq">Special Request</label>
                                <textarea
                                    v-model="PassengerInfo.special_request"
                                    name="specreq"
                                    id="specreq"
                                    cols="30"
                                    rows="2"
                                    class="form-control"
                                ></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <button v-on:click="Update()" class="btn btn-primary form-control" type="button">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import { ref } from "@vue/reactivity";
import { useRoute } from "vue-router";
import router from './../../../../router';
import UpdatePassenger from "../../../../state/UpdatePassenger";
export default {
    props: ["data"],
    components: {
        Datepicker,
    },
    data() {
        return {
            Passenger: {
                id: useRoute().params.id,
                date: null,
            },
        };
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
    mounted() {
        UpdatePassenger.dispatch("GET_PASSENGER_DATA", this.Passenger.id);
    },
    methods: {
        Update()
        {
            axios.post('../api/update-passenger',this.PassengerInfo)
            .then(res => {
                if(res && res.data)
                {
                    Swal.fire({
                        title:"Updated",
                        text:"Passenger information has been updated!",
                        icon:"success"
                    }).then(result => {
                        router.push('/tour-list');
                    });
                }
            }).catch(err => {
               if(err && err.response && err.response.status == 422)
               {
                   this.$toast.error("Please complete the form",{
                       position:'bottom'
                   });
               }

            });
        }
    },
    computed: {
        PassengerInfo() {
            return UpdatePassenger.getters.passengerInfo;
        },
    },
};
</script>
