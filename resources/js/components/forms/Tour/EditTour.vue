<template lang="">
    <div class="col-lg-7 offset-md-2 mt-5">
        <div class="card">
            <div class="card-body">
                <div>
                    <h3>Tour Information</h3>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Itinerary</label>
                        <textarea
                            name="itinerary"
                            class="form-control"
                            id="itinerary"
                            cols="30"
                            rows="3"
                        ></textarea>
                    </div>
                    <div class="form-group text-end mt-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <AvailableDates :tourID="this.id" class="mt-3" />
    </div>
</template>
<script>
import AvailableDates from '../date/AvailableDates.vue';
import { useRoute } from "vue-router";
export default {
    components:{
        AvailableDates
    },  
    data() {
        return {
            id: useRoute().params.id,
        };
    },
    mounted() {
        axios
            .get(`../api/show-tour-details/${this.id}`)
            .then((res) => {
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>
<style lang=""></style>
