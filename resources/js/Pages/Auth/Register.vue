<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo2.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />

    <!-- new register form -->

    <section class="bg-white dark:bg-zinc-100">
    <div class="flex justify-center min-h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/5" style="background-image: url('images/kb.jpg')">
        </div>

        <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full">
                <ApplicationLogo class="mb-8"/>
                <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize">
                    Get your free account now.
                </h1>

                <p class="mt-4 text-teal-600">
                    Let’s get you all set up so you can verify your personal account and begin setting up your profile.
                </p>

                <form @submit.prevent="submit" class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">


            <div class="mt-4">
                <label class="block mb-2 text-sm text-gray-600" for="name" value="Name">Name</label>

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="John Snow"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm text-gray-600" for="email" value="Email">Email</label>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    placeholder="johnsnow@example.com"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm text-gray-600" for="password" value="Password">Password</label>

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                    placeholder="Enter your password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm text-gray-600" for="password_confirmation" value="Confirm Password">Confirm Password</label>

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm your password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-600"
                >
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4 font-semibold tracking-wider flex items-center justify-between w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                </PrimaryButton>
            </div>

                </form>
            </div>
        </div>
    </div>
</section>

    <!-- end new register form -->
</template>
