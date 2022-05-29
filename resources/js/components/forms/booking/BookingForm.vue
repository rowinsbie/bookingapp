<template lang="">
    <div class="row">
        <div class="col-lg-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4>Passenger's Booking</h4>
                    <h6>Tour Name</h6>
                    <hr>
                    <form action="">
                        
                         <div class="form-group">
                            <select name="date" id="date" class="form-control">
                                <option value="">Select Date</option>
                                <option v-for="(date,index) in showDates" value="{{date.date}}">{{date.date}}</option>
                            </select>
                        </div>
                       
                        <div class="mt-3">
                            <div class="form-group mt-3">
                                    <label for="firstName">First Name</label>
                                    <input type="text" id="fname" name="fname" class="form-control">
                            </div>
                             <div class="form-group mt-3">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" id="lname" name="lname" class="form-control">
                            </div>
                             <div class="form-group mt-3">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                    <label for="passport">Passport</label>
                                    <input type="text" id="passport" name="passport" class="form-control">
                            </div>
                             <div class="form-group mt-3">
                                    <label for="datebirth">Date of Birth</label>
    <Datepicker v-model="date" :format="format" ></Datepicker>
                            </div>
                            <div class="form-group mt-3">
                                    <label for="specreq">Special Request</label>
                                   <textarea name="specreq" id="specreq" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="form-group mt-3 text-center">
                                                                <router-link to="/tour-list" class="btn border m-2">Cancel</router-link>

                                <button type="button" class="btn btn-primary ">Add Passenger</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mt-5">
                <PassengersList />
        </div>
    </div>
</template>
<script>
import PassengersList from './PassengersList.vue';
import Booking from '../../../state/Booking';
import { useRoute } from "vue-router";
 import Datepicker from '@vuepic/vue-datepicker';
    import '@vuepic/vue-datepicker/dist/main.css'
import { ref } from '@vue/reactivity';

export default {
    components:{
        PassengersList,
        Datepicker
    },
    setup()
    {
            const date = ref(new Date());

            const format = (date) => {
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();

                return `${day}/${month}/${year}`;
            }

            return {
  date,
            format
            }
          
    },
    data()
    {
        return {
            id:useRoute().params.id,
            date:''
        }
    },  
    mounted()
    {
        Booking.dispatch('GET_DATES',this.id);
    },
    computed:{
        showDates()
        {
            return Booking.getters.getDates;
        }
    }
};
</script>
<style lang=""></style>
