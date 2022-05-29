import axios from "axios";
import { createStore } from "vuex";
import Swal from "sweetalert2";
import router from "../router";
const EditTour = createStore({
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

    },
    actions: {
        GET_TOUR_DATA(context, id) {
            axios
                .get(`../api/show-tour-details/${id}`)
                .then((res) => {
                    if (res && res.status == 200) {
                        context.commit('setTourData', res.data.tour);
                    }
                })
                .catch((err) => {
                    return Promise.reject(err);

                });
        }
    },
    getters: {
        getData(state) {
            return state.tour;
        }
    }
});

export default EditTour;