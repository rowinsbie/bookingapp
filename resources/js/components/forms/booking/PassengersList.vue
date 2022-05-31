<template lang="">
    <div class="card">
        <div class="card-body">
            <h4>Passenger's List</h4>
            <h6>Tour Name</h6>
            <hr />
            <div v-if="PassengersList.length >= 1">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Passport</th>
                                <th>Date of Birth</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(data, index) in PassengersList"
                                ::key="index"
                            >
                                <td>
                                    {{ data.passenger.given_name }}
                                    {{ data.passenger.surname }}
                                </td>
                                <td>{{ data.passenger.email }}</td>
                                <td>{{ data.passenger.mobile }}</td>
                                <td>{{ data.passenger.passport }}</td>
                                <td>{{ data.passenger.birthdate }}</td>
                                <td style="display:flex">
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                    >
                                        Edit
                                    </button>
                                    <Remove :tourID="data.tour_booking.tour_id" :passengerID="data.passenger.id" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div v-else class="text-center">
                <img
                    src="/images/addfile.png"
                    alt="Add file"
                    class="img-responsive img-fluid"
                    width="400"
                />
                <h4>Hey there!</h4>
                <p>
                    To view passengers, Please select a date in the tour
                    available dates
                </p>
            </div>
        </div>
    </div>
</template>
<script>
import Booking from "../../../state/Booking";
import Remove from '../booking/actions/Remove';
export default {
    components:{
        Remove
    },
    mounted() {},
    computed: {
        PassengersList() {
            return Booking.getters.getPassengers;
        },
    },
};
</script>
<style lang=""></style>
