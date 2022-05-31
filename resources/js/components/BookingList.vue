<template >
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
               <div class="row">
                   <div class="col-lg-6">
                        <h3>Booking List</h3>
                   </div>
                   <div class="col-lg-6 text-end">
                        <router-link to="/tour-list" class="btn btn-primary">Tour</router-link>
                   </div>
               </div>
                <hr />
                <div class="table-responsive">
                    <table class="table table-bordered">
                            
                                <thead>
                                    <tr>
                                    <th>id</th>
                                    <th>Tour Name</th>
                                    <th>Date</th>
                                    <th>No. of Passengers</th>
                                    <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value,index) in publicBooking" :key="index">
                                        <td>{{value.id}}</td>
                                        <td>{{value.tour.name}}</td>
                                        <td>{{value.date}}</td>
                                        <td v-if="value.tour.booking[index]">{{value.tour.booking[index].passenger_booking.length}}</td>
                                                                                <td v-else> 0</td>

                                        <td>
                                           <!-- <router-link :to="{name:'editTour',params:{id:value.tour.id}}" class="btn btn-primary">Edit</router-link> -->
                                           <router-link :to="{name:'booking',params:{id:value.tour.id}}" class="btn border m-2">Booking</router-link>
                                        </td>
                                    </tr>
                                </tbody>
                            
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  data()
  {
      return {
          publicBooking:[]
      }
  },
  methods:{
      countPassenger(data)
      {
          data.passenger_booking.forEach(function(info) 
          {
              alert(info.length);
              return info.length;
          });
      }
  },
    mounted()
    {

        axios.get('api/all-booking')
        .then(res => {
            console.log(res);
            if(res && res.status)
            {
                this.publicBooking = res.data;
            }
        }).catch(err => {
            console.log(err);
        });
    }
}
</script>
<style >
    
</style>