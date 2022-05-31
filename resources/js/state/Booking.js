import axios from "axios";
import { createStore } from "vuex";
import Swal from "sweetalert2";
import router from "../router";
const Booking = createStore({
    state() {
        return {
            availableDates: [],
            passengers: []
        }
    },
    mutations: {
        setPassenger(state, data) {
            state.passengers.push(data);
        },
        setPassengerList(state, data) {
            state.passengers = data;
        },
        setAvailableDates(state, dates) {
            state.availableDates = dates;
        }

    },
    actions: {
        ADD_PASSENGER(context, data) {

            axios.post('../api/book-passenger', data)
                .then(res => {
                    if (res && res.status == 200) {
                        // context.commit('setPassenger', res.data);

                    }
                }).catch(err => {
                    if (err && err.response && err.response.status == 422) {
                        Swal.fire({
                            title: "Attention!",
                            text: "Please fill out all the fields",
                            icon: "warning"
                        });

                    }
                    return Promise.reject(err);
                });
        },

        SHOW_PASSENGERS(context, data) {

            axios.post(`../api/show-passengers/`, {
                    date: data.date,
                    tourID: data.tourID
                })
                .then(res => {
                    if (res && res.data) {
                        console.log(res.data);
                        context.commit('setPassengerList', res.data);
                    }
                }).catch(err => {
                    return Promise.reject(err);
                })
        },

        GET_DATES(context, id) {
            axios.get(`../api/get-dates/${id}`)
                .then(res => {
                    if (res && res.data) {
                        context.commit('setAvailableDates', res.data);
                    }
                }).catch(err => {
                    return Promise.reject(err);
                })
        }
    },
    getters: {
        getDates(state) {
            return state.availableDates;
        },
        getPassengers(state) {
            return state.passengers;
        }
    }
});

export default Booking;