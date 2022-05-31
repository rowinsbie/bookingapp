<template>
    <div>
        <button
            type="button"
            v-on:click="confirmation()"
            class="btn btn-danger"
        >
            Remove
        </button>
    </div>
</template>
<script>
import Booking from '../../../../state/Booking';
export default {
    props: ["passengerID","tourID","date"],
    setup() {},
    methods: {
        confirmation() {
            Swal.fire({
                title: "Are you sure you want to remove this passenger??",
                showCancelButton: true,
                confirmButtonText: "Remove",
                denyButtonText: `Cancel`,
                icon: "question",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.RemovePassenger();
                }
            });
        },

        RemovePassenger() {
            axios
                .post("../api/remove-passenger", {
                    tourID:this.tourID,
                    passengerID:this.passengerID
                })
                .then((res) => {
                    Swal.fire("Removed!", "", "success");

                     Booking.dispatch("SHOW_PASSENGERS", {
                 tourID:this.tourID,
                 date:this.date
             });
                })
                .catch((err) => {
                    console.log(err);
                    return Promise.reject(err);
                });
        },
    },
};
</script>
