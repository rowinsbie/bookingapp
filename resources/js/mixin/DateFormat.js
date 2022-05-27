import moment from "moment";
export default {
    methods: {
        DateFormat(date) {
            return moment(date).format('MM/DD/YYYY');
        }
    },
}