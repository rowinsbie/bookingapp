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
                            
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  
    mounted()
    {
    }
}
</script>
<style >
    
</style>