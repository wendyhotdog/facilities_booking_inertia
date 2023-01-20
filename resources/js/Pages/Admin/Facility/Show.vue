<template>
    <AuthenticatedLayout>
        <!-- Standard page that shows the users details -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="">
                        <img :src="facility.image" class="w-[100%]" />
                    </div>
                    <div class="p-6 text-center">
                        <div
                            class="text-3xl font-medium text-gray-800 dark:text-gray-200"
                        >
                            <span v-if="!editMode">
                                {{ facility.name }}
                            </span>
                            <span v-if="editMode">
                                Name :
                                <input
                                    type="text"
                                    class="border-2 border-gray-300 p-2 rounded w-[30%] dark:bg-gray-800 dark:text-white"
                                    v-model="name"
                                />
                            </span>
                        </div>
                        <div
                            class="mt-4 text-xl text-gray-700 dark:text-gray-200"
                        >
                            <span class="font-bold">Description :</span>
                            <span v-if="!editMode">{{
                                facility.description
                            }}</span>
                            <span v-if="editMode">
                                <textarea
                                    class="border-2 border-gray-300 p-2 rounded w-[30%] dark:bg-gray-800 dark:text-white"
                                    v-model="description"
                                ></textarea>
                            </span>
                        </div>
                        <div
                            class="mt-4 text-xl text-gray-700 dark:text-gray-200"
                        >
                            <span class="font-bold">Rate :</span>

                            <span v-if="!editMode">{{
                                facility.rate_per_hour
                            }}</span>
                            <span v-if="editMode">
                                <input
                                    type="number"
                                    class="border-2 border-gray-300 p-2 rounded w-[25%] dark:bg-gray-800 dark:text-white"
                                    v-model="rate_per_hour"
                                />
                            </span>
                        </div>
                        <div
                            class="mt-4 text-xl text-gray-700 dark:text-gray-200"
                        >
                            <button
                                class="bg-blue-700 p-2 rounded"
                                v-if="!editMode"
                                @click="editMode = true"
                            >
                                Edit Facility
                            </button>
                            <button
                                class="bg-blue-700 p-2 rounded"
                                v-if="editMode"
                                @click="submitEdit"
                            >
                                Save Facility
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Roles Section -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                ></div>
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
        facility: Object,
    },
    data() {
        return {
            editMode: false,
            name: this.facility.name,
            description: this.facility.description,
            rate_per_hour: this.facility.rate_per_hour,
        };
    },
    methods: {
        submitEdit() {
            this.$inertia.post(
                route("admin.facilities.update", this.facility.id),
                {
                    name: this.name,
                    description: this.description,
                    rate_per_hour: this.rate_per_hour,
                },
                {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => {
                        this.editMode = false;
                    },
                }
            );
        },
    },
});
</script>
