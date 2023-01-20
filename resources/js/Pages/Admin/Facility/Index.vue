<template>
    <Head title="Facilities" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Facilities
                </h2>
                <button
                    class="p-2 text-white bg-blue-500 rounded"
                    @click="createFacility"
                >
                    Add new facility
                </button>
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
                                    Name
                                </th>
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    Description
                                </th>
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    Rate (per hour)
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
                                v-for="facility in facilities"
                                :key="facility.id"
                                class="bg-white dark:bg-gray-800"
                            >
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    {{ facility.name }}
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    {{ facility.description }}
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    RM {{ facility.rate_per_hour }}
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    <a
                                        class="bg-blue-500 text-white px-2 py-1 rounded-sm"
                                        :href="
                                            route(
                                                'admin.facilities.show',
                                                facility.id
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
        facilities: {
            type: Array,
            required: true,
        },
    },
    methods: {
        createFacility() {
            this.$inertia.visit(route("admin.facilities.create"));
        },
    },
});
</script>
