<template>
    <AuthenticatedLayout>
        <!-- Standard page that shows the users details -->
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
