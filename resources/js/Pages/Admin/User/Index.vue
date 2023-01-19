<template>
    <Head title="User" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Users
            </h2>
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
                                    Email
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
                                v-for="user in users"
                                :key="user.id"
                                class="bg-white dark:bg-gray-800"
                            >
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    {{ user.name }}
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    {{ user.email }}
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    <a
                                        class="bg-blue-500 text-white px-2 py-1 rounded-sm"
                                        @click="onView(user.id)"
                                        >View</a
                                    >
                                    <a
                                        class="bg-green-500 text-white px-2 py-1 rounded-sm"
                                        @click="onEdit(user.id)"
                                        >Edit</a
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
        users: {
            type: Array,
            required: true,
        },
    },
    methods: {
        onView(id) {
            // navigate to view page for user with id
        },
        onEdit(id) {
            // navigate to edit page for user with id
        },
        onDelete(id) {
            // delete user with id
        },
    },
});
</script>
