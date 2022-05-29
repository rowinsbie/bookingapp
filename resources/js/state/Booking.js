import axios from "axios";
import { createStore } from "vuex";
import Swal from "sweetalert2";
import router from "../router";
const Booking = createStore({
    state() {
        return {
            availableDates: [],
            passenger: {

            }
        }
    },
    mutations: {
        setPassenger(state, data) {
            state.passenger = data;
        },
        setAvailableDates(state, dates) {
            state.availableDates = dates;
        }

    },
    actions: {
        ADD_PASSENGER(context, data) {

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
        }
    }
});

export default Booking;