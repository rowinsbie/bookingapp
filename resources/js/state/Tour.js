import axios from "axios";
import { createStore } from "vuex";
import Toaster from "@meforma/vue-toaster";
import Swal from "sweetalert2";
import router from "../router";
const Tour = createStore({
    state() {
        return {
            tour: {
                name: '',
                itinerary: '',
                dates: []
            }
        }
    },
    mutations: {
        setTourData(state, data) {
            state.tour = data;
        },
        setAvailableDates(state, dates) {
            state.tour.dates.push(dates);
        },
        removeDate(state, index) {
            if (index !== -1) {
                state.tour.dates.splice(index, 1);
            }

        }
    },
    actions: {
        CREATE_TOUR(context, data) {
            context.commit('setTourData', data);
            axios.post('api/create-tour', data)
                .then(res => {
                    Swal.fire({
                        title: "Created!",
                        text: "A tour has been created",
                        icon: "success"
                    }).then(res => {
                        router.push('/tour-list');
                    });
                }).catch(err => {
                    return Promise.reject(err);


                });
        }
    },
    getters: {
        getDates(state) {
            return state.tour.dates;
        },
        getTourData(state) {
            return state.tour;
        }
    }
});

export default Tour;