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
                <!-- <p class=" text-white"> <span class="text-4xl font-medium">Still Confused ?</span> <br> <span class="text-lg">Book For Free Career Consultation Today ! </span></p>
            <button class="px-5 py-3  font-medium text-slate-700 shadow-xl  hover:bg-white duration-150  bg-yellow-400">BOOK AN APPOINTMENT </button> -->
                <h1 class="text-2xl font-medium mb-5">Recent bookings</h1>
                <!-- searchbar -->
                <div class="p-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="table-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-80 pl-10 p-2.5"
                            placeholder="Search for items"
                        />
                    </div>
                </div>
                <!-- searchbar end -->
                <!-- component -->
                <div class="flex justify-center items-center">
                    <card
                        class="w-screen grid grid-cols-6 max-w-5xl rounded-xl bg-gray-200 shadow-lg hover:shadow-xl"
                        v-for="reservation in reservations"
                        :key="reservation.id"
                    >
                        <div class="col-span-4">
                            <h2
                                class="font-bold text-3xl text-teal-600 ml-10 mt-8"
                            >
                                {{ reservation.facility.name }}
                            </h2>
                            <h2 class="font-bold text-xl text-gray-500 ml-10">
                                Court
                            </h2>
                            <p class="font-bold text-black text-sm ml-10 mt-5">
                                {{ reservation.start_time }} -
                                {{ reservation.end_time }}
                            </p>
                            <p class="font-bold text-black text-sm ml-10">
                                {{ reservation.reservation_date }}
                            </p>
                            <button
                                class="text-teal-600 font-semibold ml-10 mt-5 mb-8 group"
                            >
                                View details
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="inline-block h-6 w-6 group-hover:translate-x-2 transition delay-100 transition-200"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"
                                    />
                                </svg>
                            </button>
                        </div>
                    </card>
                </div>
                <!-- component end -->
            </div>
        </div>
    </authenticated-layout>
</template>
<script>
import { defineComponent } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default defineComponent({
    components: {
        AuthenticatedLayout,
    },
    props: ["reservations"],
});
</script>
