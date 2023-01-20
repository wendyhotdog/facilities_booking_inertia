<template>
    <div
        class="pt-40 border-t border-b py-20 h-screen flex justify-center items-center bg-gray-200 bg-cover"
        style="background-image: url('../../../../public/images/mainbg.jpg')"
    >
        <div class="bg-white w-2/3 shadow-xl rounded-lg p-6">
            <div class="border-b-2 border-dashed pb-3">
                <div class="border-l-2 border-l-teal-600 pl-2 mb-3 font-bold">
                    Confirm your booking
                </div>
                <div class="flex justify-between">
                    <div class="flex items-start">
                        <div
                            class="w-52 h-28 rounded-xl bg-gray-200 mr-3"
                        ></div>
                        <div>
                            <div class="pb-2 font-semibold">
                                {{ facility.name }}
                            </div>
                            <div class="text-xs text-gray-400 leading-6">
                                {{ facility.description }}
                            </div>
                            <div class="text-xs text-gray-400 leading-6"></div>
                            <div class="text-xs text-gray-400 leading-6">
                                <!-- {{ start_time }} P.M - 11 P.M -->
                            </div>
                            <div class="text-xs text-gray-400 leading-6">
                                20 January 2023
                            </div>
                        </div>
                    </div>
                    <div class="text-right text-sm leading-7">
                        <p>Hours：{{ duration }}</p>
                        <p>Per Hour：{{ facility.rate_per_hour }}</p>
                        <div class="font-bold">
                            Total ：<span class="text-teal-600 font-bold"
                                >RM {{ total }}</span
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-4">
                <div class="border-l-2 border-l-teal-600 pl-2 mb-4 font-bold">
                    Choose a payment method
                </div>

                <label
                    for="dropzone-file"
                    class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-teal-600 bg-white p-6 text-center mb-8"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-10 w-10 text-teal-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                        />
                    </svg>

                    <h2
                        class="mt-4 text-xl font-medium text-gray-700 tracking-wide"
                    >
                        Payment File
                    </h2>

                    <p class="mt-2 text-gray-500 tracking-wide">
                        Upload or drag & drop your file SVG, PNG, JPG or GIF.
                    </p>

                    <input
                        id="dropzone-file"
                        type="file"
                        class="hidden"
                        @change="onFileChange"
                    />
                </label>

                <div
                    class="flex items-center justify-between max-w-2xl px-8 py-4 mx-auto border cursor-pointer rounded-xl"
                    :class="{
                        'border-teal-600': paymentType === 'bank_transfer',
                    }"
                    @click="paymentType = 'bank_transfer'"
                >
                    <div class="flex items-center">
                        <div class="flex flex-col items-center mx-5 space-y-1">
                            <h2
                                class="text-lg font-medium text-gray-700 sm:text-2xl"
                            >
                                Bank Transfer
                            </h2>
                        </div>
                    </div>

                    CIMB 7625473040
                </div>
                <div
                    class="flex items-center justify-between max-w-2xl px-8 py-4 mx-auto border cursor-pointer rounded-xl"
                    :class="{
                        'border-teal-600': paymentType === 'cash',
                    }"
                    @click="paymentType = 'cash'"
                >
                    <div class="flex items-center">
                        <div class="flex flex-col items-center mx-5 space-y-1">
                            <h2
                                class="text-lg font-medium text-gray-700 sm:text-2xl"
                            >
                                Pay Later
                            </h2>
                        </div>
                    </div>

                    <h2
                        class="text-2xl font-semibold text-gray-500 sm:text-4xl"
                    >
                        <span class="text-base font-medium">with</span> Cash
                    </h2>
                </div>

                <div class="flex justify-center">
                    <button
                        class="mt-8 px-8 py-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-teal-600 rounded-md hover:bg-teal-500 focus:outline-none focus:bg-teal-500 focus:ring focus:ring-teal-300 focus:ring-opacity-80"
                        @click="submitPayment"
                    >
                        Proceed
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { defineComponent } from "vue";

export default defineComponent({
    components: {
        AuthenticatedLayout,
    },
    props: [
        "facility",
        "start_time",
        "end_time",
        "reservation_date",
        "duration",
    ],
    data() {
        return {
            paymentType: "bank_transfer",
            receipt: null,
        };
    },
    computed: {
        total() {
            return this.duration * this.facility.rate_per_hour;
        },
    },
    methods: {
        submitPayment() {
            this.$inertia.post("/payment", {
                facility_id: this.facility.id,
                start_time: this.start_time,
                end_time: this.end_time,
                reservation_date: this.reservation_date,

                method: this.paymentType,
                amount: this.total,
                receipt_image_url: this.receipt,
            });
        },
        onFileChange(e) {
            const file = e.target.files[0];
            this.receipt = file;
            // Change the dropzone-file to a preview of the image
            const dropzone = document.getElementById("dropzone-file");
            dropzone.classList.add("hidden");
            const preview = document.createElement("img");
            preview.src = URL.createObjectURL(file);
            preview.classList.add("w-64", "h-64", "object-cover");
            dropzone.parentNode.insertBefore(preview, dropzone.nextSibling);
        },
    },
});
</script>
