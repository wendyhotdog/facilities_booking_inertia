<template>
    <Head title="User" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Users
                </h2>
                <a :href="route('admin.users.create')">
                    <button class="text-white bg-blue-600 p-[5px] rounded-sm">
                        Add New User
                    </button>
                </a>
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
                                    Email
                                </th>
                                <th
                                    class="text-left p-3 text-gray-600 dark:text-gray-200"
                                >
                                    Roles
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
                                    <span
                                        v-for="role in user.roles"
                                        :key="role.id"
                                        class="bg-blue-500 text-white px-2 py-1 rounded-sm"
                                        >{{ role.name }}</span
                                    >
                                </td>
                                <td
                                    class="p-3 text-gray-700 dark:text-gray-200"
                                >
                                    <a
                                        class="bg-blue-500 text-white px-2 py-1 rounded-sm"
                                        :href="
                                            route('admin.users.show', user.id)
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
        users: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            editMode: false,
        };
    },
    methods: {
        onEdit(id) {
            this.editMode = true;
        },
    },
});
</script>
