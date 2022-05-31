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

export default {
    props: ["passengerID","tourID"],
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

                    console.log(res);
                })
                .catch((err) => {
                    console.log(err);
                    return Promise.reject(err);
                });
        },
    },
};
</script>
