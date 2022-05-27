<template>
    <div class="col-lg-6 offset-md-3 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Create Tour</h3>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="tourName">Tour Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="tour-name"
                                name="tour-name"
                            />
                        </div>
                        <div class="form-group">
                            <label for="itinerary">Itenerary</label>
                            <textarea
                                name="itinerary"
                                id="itenerary"
                                class="form-control"
                                cols="30"
                                rows="5"
                            ></textarea>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Tour Dates Available</h5>
                        <div class="mt-2">
                            <AddDateFormVue />
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row mt-4">
                    <div class="col-lg-12 text-end">
                        <router-link to="/tour-list" class="btn border mr-2"
                            >Cancel</router-link
                        >
                        <button class="btn btn-primary ">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import AddDateFormVue from "./AddDateForm.vue";
export default {
    components: {
        AddDateFormVue,
    },
    mounted() {},
};
</script>
<style></style>
