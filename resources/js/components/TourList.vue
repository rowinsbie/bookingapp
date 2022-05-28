<template >
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
               <div class="row">
                   <div class="col-lg-6">
                        <h3>Tours List</h3>
                   </div>
                   <div class="col-lg-6 text-end ">
                        <router-link to="/create-tour" class="btn btn-primary">Create tour</router-link>
                        <router-link to="/" class="btn border ml-2">View Bookings</router-link>
                   </div>
               </div>
                <hr />
                <div class="table-responsive">
                    <table class="table table-bordered">
                            
                                <thead>
                                    <tr>
                                    <th>id</th>
                                    <th>Tour Name</th>
                                  
                                    <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in list" :key="index">
                                        <td>{{data.id}}</td>
                                        <td>{{data.name}}</td>
                                        <td>
                                            <button class="btn btn-primary">Edit</button>
                                             <button class="btn border">Bookings</button>
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
            list:[]
        }
    },
    mounted()
    {
        axios.get("api/get-tour")
        .then(res => {
            console.log(res);
           if(res && res.data)
           {
               this.list = res.data;
               
           }
        }).catch(err => {
            console.log(err); 
        });
    }
}
</script>
<style >
    
</style>