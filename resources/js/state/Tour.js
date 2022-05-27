import axios from "axios";
import { createStore } from "vuex";
import Toaster from "@meforma/vue-toaster";
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
                    console.log(res);
                }).catch(err => {
                    console.log(err.response);

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