import { createStore } from "vuex";

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

    },
    getters: {
        getDates(state) {
            return state.tour.dates;
        }
    }
});

export default Tour;