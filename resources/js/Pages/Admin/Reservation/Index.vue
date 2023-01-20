<template>
    <Head title="reservation" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Reservations
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-800">
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    Facility Name
                                </th>
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    Date
                                </th>
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    Start Time
                                </th>
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    End Time
                                </th>
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    Status
                                </th>
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="reservation in reservations"
                                :key="reservation.id"
                                class="bg-white dark:bg-gray-800"
                            >
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    {{ reservation.facility.name }}
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    {{ reservation.reservation_date }}
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    {{ reservation.start_time }}
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    {{ reservation.end_time }}
                                </td>
                                <!-- Status -->
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-blue-100 rounded-sm dark:bg-blue-700 dark:text-green-100"
                                        >{{ reservation.status }}</span
                                    >
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    <a
                                        class="bg-blue-500 text-white px-2 py-1 rounded-sm"
                                        :href="
                                            route(
                                                'admin.reservations.show',
                                                reservation.id
                                            )
                                        "
                                        >View</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { defineComponent } from "vue";
import { Head } from "@inertiajs/vue3";

export default defineComponent({
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        reservations: {
            type: Array,
            required: true,
        },
    },
});
</script>
