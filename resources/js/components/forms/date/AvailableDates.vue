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
                                <td>{{data.status_id}}</td>
                                <td>
                                    <button class="btn btn-primary">Disable</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 
</template>
<script>
export default {
    props:['tourID','datelist']
}
</script>
<style lang="">
    
</style>