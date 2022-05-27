<template>
    <div>
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="Date">Date</label>
                    <datepicker v-model="picked" class="form-control" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <button
                        type="button"
                        v-on:click="AddDate()"
                        class="btn btn-primary mt-4 form-control"
                    >
                        Add
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <DateList v-if="getDateList.length > 0" :dates="getDateList" />
                <div v-else class="text-center">
                    <img
                        src="images/calendar.png"
                        class="img-responsive img-fluid"
                        width="200"
                    />
                    <h1>No dates</h1>
                    <p>Please select date and add</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import DateFormat from "../../mixin/DateFormat";
import DateList from "./date/DateList.vue";
import Datepicker from "vue3-datepicker";
import { ref } from "vue";
import Tour from "./../../state/Tour";
export default {
    mixins: [DateFormat],
    data() {
        return {
            picked: ref(new Date()),
           
        };
    },
    methods: {
        AddDate() {
            if (this.getDateList.includes(this.DateFormat(this.picked))) {
                this.$toast.error(
                    "The date you've selected is already on the list",
                    {
                        position: "bottom",
                    }
                );
                return false;
            }
            Tour.commit("setAvailableDates", this.DateFormat(this.picked));
        },
    },
    components: {
        Datepicker,
        DateList,
    },
    mounted() {},
    computed: {
        getDateList() {
            return Tour.getters.getDates;
        },
    },
};
</script>
<style></style>
