import moment from "moment";
export default {
    methods: {
        DateFormat(date) {
            return moment(date).format('YYYY-M-D');
        }
    },
}