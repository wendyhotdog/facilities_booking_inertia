<template>
    <AuthenticatedLayout>
        <div
            class="px-3 md:lg:xl:px-40 bg-cover border-t border-b py-20 bg-opacity-10"
            style="background-image: url('public/images/mainbg.jpg')"
        >
            <article class="rounded-xl bg-white p-3 shadow-lg mb-4">
                <a href="#">
                    <div
                        class="relative flex items-end overflow-hidden rounded-xl max-h-[20rem]"
                    >
                        <img :src="facility.image" />
                        <div
                            class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-4 w-4"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-1 p-2">
                        <h2 class="text-slate-700">IOI City Mall</h2>
                        <p class="mt-1 text-sm text-slate-400">
                            IOI City, Putrajaya
                        </p>

                        <div class="mt-3 flex items-end justify-between">
                            <p>
                                <span class="text-lg font-bold text-teal-600"
                                    >Badminton Court</span
                                >
                            </p>
                        </div>
                    </div>
                </a>
            </article>

            <div
                class="grid grid-cols-3 md:lg:xl:grid-cols-3 group bg-white shadow-xl shadow-neutral-100 border shadow-xl shadow-teal-300"
            ></div>

            <!-- Reservation create goes here -->
            <ReservationCreate :facility="facility" />
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { defineComponent } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ReservationCreate from "@/Pages/Reservation/Create.vue";
export default defineComponent({
    name: "FacilityShow",
    components: {
        AuthenticatedLayout,
        ReservationCreate,
    },
    props: {
        facility: Object,
    },
});
</script>
