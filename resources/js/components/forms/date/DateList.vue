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
                        <td>{{DateFormat(date)}}</td>
                        <td>
                            <button class="btn btn-danger" v-on:click="Remove(index)">Remove</button>
                        </td>
                    </tr>
                </tbody>
          </table>
</template>
<script>
import DateFormat from '../../../mixin/DateFormat';
import Tour from './../../../state/Tour';
export default {
    props:['dates'],
    mixins:[DateFormat],
    methods:{
       
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