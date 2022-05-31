<template>
       <div class="row">
        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-body">
                        <h5>Edit Passenger</h5>
                </div>
            </div>
        </div>
       </div>
</template>
<script>
export default {
    props:['data'],
    data()
    {
        return {
           
        }
    },
    setup() {},
    mounted()
    {
        
    },
    methods:{
        showModal()
        {
            new Modal().show('remove'+this.data.id);
        }
    }
};
</script>
