<template lang="">

        <div class="card">
            <div class="card-body">
                <div>
                    <h3>Tour Available Dates</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data,index) in datelist" :key="index">
                                <td>{{data.date}}</td>
                                <td>{{data.tour_date_status.status}}</td>
                                <td>
                                    <button v-if="data.status_id == 1" class="btn btn-danger" v-on:click="toggleStatus(data.id,data.status_id)">Disable</button>

                                    <button v-else class="btn btn-success" v-on:click="toggleStatus(data.id,data.status_id)">Enable</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 
</template>
<script>
import EditTour from '../../../state/EditTour';
export default {
    props:['tourID','datelist'],
    methods:{
        toggleStatus(id,status_id)
        {
           axios.post('../api/booking-date-status-update',{
               current_status:status_id,
               id:id
           }).then(res => {
               if(res && res.status == 200)
               {
                   EditTour.dispatch('GET_TOUR_DATA',this.tourID);
               }
           }).catch(err => {
               console.log(err);
           });
        }
    }
}
</script>
<style lang="">
    
</style>