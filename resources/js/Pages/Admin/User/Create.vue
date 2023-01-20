<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Add User
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
                                    Create a new user account
                                </h1>
                                <p class="leading-relaxed mt-4">
                                    Fill in the details of the user
                                </p>
                            </div>
                            <div
                                class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0"
                            >
                                <h2
                                    class="text-gray-900 text-lg font-medium title-font mb-5"
                                >
                                    Sign Up
                                </h2>
                                <div class="relative mb-4">
                                    <label
                                        for="full-name"
                                        class="leading-7 text-sm text-gray-600"
                                        >Full Name</label
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
                                        for="email"
                                        class="leading-7 text-sm text-gray-600"
                                        >Email</label
                                    >
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        v-model="form.email"
                                    />
                                </div>
                                <div class="relative mb-4">
                                    <label
                                        for="password"
                                        class="leading-7 text-sm text-gray-600"
                                        >Password</label
                                    >
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        v-model="form.password"
                                    />
                                </div>
                                <div class="relative mb-4">
                                    <label
                                        for="password"
                                        class="leading-7 text-sm text-gray-600"
                                        >Confirm Password</label
                                    >
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        v-model="form.password_confirmation"
                                    />
                                </div>
                                <div class="relative mb-4">
                                    <label
                                        for="roles"
                                        class="leading-7 text-sm text-gray-600"
                                        >Roles</label
                                    >
                                    <select
                                        id="roles"
                                        name="roles"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        v-model="form.roles"
                                    >
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <button
                                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                    @click="onSubmit"
                                    :disabled="
                                        !form.name ||
                                        !form.email ||
                                        !form.password ||
                                        !form.roles
                                    "
                                    :class="{
                                        'opacity-50 cursor-not-allowed':
                                            !form.name ||
                                            !form.email ||
                                            !form.password ||
                                            !form.roles,
                                    }"
                                >
                                    Create User
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
            this.$inertia.post(route("admin.users.store"), this.form);
        },
    },
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                roles: "",
            },
        };
    },
});
</script>
