<template>
    <authenticated-layout>
        <div
            class="px-3 md:lg:xl:px-40 bg-cover border-t border-b py-20 bg-opacity-10"
            style="
                background-image: url('../../../../public/images/mainbg.jpg');
            "
        >
            <div
                class="w-full bg-slate-50 shadow-xl shadow-teal-300 py-10 px-20 items-center"
            >
                <h1 class="text-2xl font-medium mb-5">Reservation Details</h1>
                <section class="text-gray-600 body-font">
                    <div
                        class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center"
                    >
                        <div
                            class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0"
                        >
                            <img
                                class="object-cover object-center rounded"
                                alt="Facility Image"
                                :src="reservation.facility.image"
                            />
                        </div>
                        <div
                            class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center"
                        >
                            <h1
                                class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"
                            >
                                {{ reservation.facility.name }}
                            </h1>
                            <p class="mb-8 leading-relaxed">
                                <span class="text-sm">
                                    {{ reservation.start_time }} -
                                    {{ reservation.end_time }}
                                    <br />
                                </span>

                                {{ reservation.facility.description }}
                            </p>
                            <div class="flex justify-center">
                                <button
                                    class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg"
                                    @click="cancelReservation"
                                >
                                    Cancel Reservation
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </authenticated-layout>
</template>
<script>
import { defineComponent } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default defineComponent({
    components: { AuthenticatedLayout },
    props: ["reservation"],
    methods: {
        cancelReservation() {
            this.$inertia.post(
                this.route("reservations.cancel", this.reservation.id)
            );
        },
    },
});
</script>
