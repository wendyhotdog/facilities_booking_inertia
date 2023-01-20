<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Add Facility
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <section class="text-gray-600 body-font">
                        <div
                            class="container px-5 py-24 mx-auto flex flex-wrap items-center"
                        >
                            <div
                                class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0"
                            >
                                <h1
                                    class="title-font font-medium text-3xl text-gray-900 dark:text-white"
                                >
                                    Add a facility
                                </h1>
                                <p class="leading-relaxed mt-4">
                                    Fill in the details of the facility
                                </p>
                            </div>
                            <div
                                class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0"
                            >
                                <h2
                                    class="text-gray-900 text-lg font-medium title-font mb-5"
                                >
                                    Facility Details
                                </h2>
                                <div class="relative mb-4">
                                    <label
                                        for="full-name"
                                        class="leading-7 text-sm text-gray-600"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        id="full-name"
                                        name="full-name"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        v-model="form.name"
                                    />
                                </div>
                                <div class="relative mb-4">
                                    <label
                                        for="full-name"
                                        class="leading-7 text-sm text-gray-600"
                                        >Description</label
                                    >
                                    <textarea
                                        type="text"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        v-model="form.description"
                                    />
                                </div>
                                <div class="relative mb-4">
                                    <label
                                        for="full-name"
                                        class="leading-7 text-sm text-gray-600"
                                        >Capacity</label
                                    >
                                    <input
                                        type="number"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        v-model="form.capacity"
                                    />
                                </div>
                                <div class="relative mb-4">
                                    <label
                                        for="full-name"
                                        class="leading-7 text-sm text-gray-600"
                                        >Rate (per hour)</label
                                    >
                                    <input
                                        type="number"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        v-model="form.rate_per_hour"
                                    />
                                </div>
                                <div class="relative mb-4">
                                    <label
                                        for="full-name"
                                        class="leading-7 text-sm text-gray-600"
                                        >Image</label
                                    >
                                    <input
                                        type="file"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        @change="onFileChange"
                                    />
                                </div>
                                <button
                                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                    @click="onSubmit"
                                >
                                    Submit Facility
                                </button>
                            </div>
                        </div>
                    </section>
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
    methods: {
        onSubmit() {
            this.$inertia.post(route("admin.facilities.store"), this.form);
        },
        onFileChange(e) {
            const file = e.target.files[0];
            this.form.image = file;
        },
    },
    data() {
        return {
            form: {
                name: "",
                description: "",
                image: "",
                capacity: "",
                rate_per_hour: "",
            },
        };
    },
});
</script>
