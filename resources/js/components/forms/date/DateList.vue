<template >
   <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(date,index) in dates" :key="index">
                        <td>{{formatDate(date)}}</td>
                        <td>
                            <button class="btn btn-danger" v-on:click="Remove(index)">Remove</button>
                        </td>
                    </tr>
                </tbody>
          </table>
</template>
<script>
import moment from 'moment';
import Tour from './../../../state/Tour';
export default {
    props:['dates'],
  
    methods:{
        formatDate(data)
        {
            return moment(data).format('MM/DD/YYYY');
        },
        Remove(index)
        {
            Tour.commit('removeDate',index);
        }
    },  
    mounted()
    {
    }
}
</script>
<style >
    
</style>