<template>
    <AuthenticatedLayout>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-col">
                <div class="lg:w-5/6 mx-auto border-[2px] rounded">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img
                            alt="content"
                            class="object-cover object-center h-full w-full"
                            :src="facility.image"
                        />
                    </div>
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                            <div
                                class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400"
                            ></div>
                            <div
                                class="flex flex-col items-center text-center justify-center"
                            >
                                <h2
                                    class="font-medium title-font mt-4 text-gray-900 text-lg dark:text-white"
                                >
                                    {{ facility.name }}
                                </h2>
                                <div
                                    class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"
                                ></div>
                                <p class="text-base dark:text-white">
                                    RM{{ facility.rate_per_hour }}/hour
                                </p>
                            </div>
                        </div>
                        <div
                            class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left"
                        >
                            <p
                                class="leading-relaxed text-lg mb-4 dark:text-gray-200 mb-24"
                            >
                                {{ facility.description }}
                            </p>
                            <!-- Align Right -->
                            <button class="bg-green-500 rounded p-2 text-white">
                                Book this Facility
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
<script>
import { defineComponent } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default defineComponent({
    name: "FacilityShow",
    components: {
        AuthenticatedLayout,
    },
    props: {
        facility: Object,
    },
});
</script>
