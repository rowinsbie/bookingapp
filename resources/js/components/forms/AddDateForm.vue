<template >
  <div class="row">
    <div class="col-lg-8">
      <div class="form-group">
        <label for="Date">Date</label>
          <datepicker   v-model="picked" class="form-control" />

      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-group">
        <button type="button" class="btn btn-primary mt-4 form-control">
          Add
        </button>
      </div>
    </div>
  </div>
</template>
<script>
import Datepicker from 'vue3-datepicker'
import { ref } from 'vue'
export default {
    data()
    {
        return {
            picked:ref(new Date())
        }
    },
    components:{
        Datepicker
    },
  mounted() {},
};
</script>
<style >
</style>