import axios from "axios";
import { createStore } from "vuex";
import Toaster from "@meforma/vue-toaster";
import Swal from "sweetalert2";
import router from "../router";
const UpdatePassenger = createStore({
    state() {
        return {
           Passenger:[]
        }
    },
    mutations: {
        setPassengerData(state, data) {
            state.Passenger = data;
        },
        
    },
    actions: {
        GET_PASSENGER_DATA(context, id) {
            axios.get(`../api/passenger-info/${id}`)
                .then(res => {
                    if(res && res.data)
                    {
                        context.commit('setPassengerData',res.data);
                    }
                }).catch(err => {
                    return Promise.reject(err);


                });
        }
    },
    getters: {
        passengerInfo(state)
        {
            return state.Passenger;
        }
    }
});

export default UpdatePassenger;