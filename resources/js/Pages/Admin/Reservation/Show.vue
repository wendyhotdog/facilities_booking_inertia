<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
            >
                <div class="p-6">
                    <div
                        class="text-2xl font-medium text-gray-800 dark:text-gray-200"
                    >
                        Reservation Details
                    </div>
                    <div class="mt-4 text-xl text-gray-700 dark:text-gray-200">
                        <div class="flex items-center">
                            <div class="mr-4">
                                Facility Name: {{ reservation.facility.name }}
                            </div>
                            <div class="mr-4">
                                Date: {{ reservation.reservation_date }}
                            </div>
                        </div>
                        <div class="mt-4 flex items-center">
                            <div class="mr-4">
                                Start Time: {{ reservation.start_time }}
                            </div>
                            <div class="mr-4">
                                End Time: {{ reservation.end_time }}
                            </div>
                        </div>
                        <div class="mt-4 flex items-center">
                            <div class="mr-4">
                                Status: {{ reservation.status }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
            >
                <div class="p-6">
                    <div
                        class="text-2xl font-medium text-gray-800 dark:text-gray-200"
                    >
                        Payment Details
                    </div>
                    <div class="mt-4 text-xl text-gray-700 dark:text-gray-200">
                        <div class="flex items-center">
                            <div class="mr-4">
                                Method: {{ reservation.payment.method }}
                            </div>
                            <div class="mr-4">
                                Amount: RM{{ reservation.payment.amount }}
                            </div>
                        </div>
                        <div class="mt-4 flex items-center">
                            <div class="mr-4">
                                Status: {{ reservation.payment.status }}
                            </div>
                        </div>
                        <!-- Image Preview -->
                        <div class="mt-4 flex items-center">
                            <div class="mr-4">
                                <img
                                    :src="reservation.payment.receipt_image_url"
                                    alt="Payment Image"
                                    class="w-64"
                                />
                            </div>
                        </div>
                        <button
                            class="bg-green-500 p-2 text-white rounded my-2"
                            @click="approvePayment"
                        >
                            Approve Payment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
    layout: AuthenticatedLayout,
    props: {
        reservation: {
            type: Object,
            required: true,
        },
    },
    methods: {
        approvePayment() {
            this.$inertia.post(
                this.route("admin.payment.approve", this.reservation.id)
            );
        },
    },
};
</script>
