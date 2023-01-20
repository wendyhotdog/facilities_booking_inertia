<template>
    <AuthenticatedLayout>
        <!-- Standard page that shows the users details -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6">
                        <div
                            class="text-3xl font-medium text-gray-800 dark:text-gray-200"
                        >
                            {{ user.name }}
                        </div>
                        <div
                            class="mt-4 text-xl text-gray-700 dark:text-gray-200"
                        >
                            Email: {{ user.email }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Roles Section -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6">
                        <div
                            class="text-3xl font-medium text-gray-800 dark:text-gray-200"
                        >
                            Roles
                        </div>
                        <div
                            class="mt-4 text-xl text-gray-700 dark:text-gray-200"
                        >
                            <span
                                v-for="role in user.roles"
                                :key="role.id"
                                class="bg-blue-500 text-white px-2 py-1 rounded-sm"
                                >{{ role.name }}</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { defineComponent } from "vue";

export default defineComponent({
    components: { AuthenticatedLayout },
    props: {
        user: Object,
    },
});
</script>
