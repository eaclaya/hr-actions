<script setup>
import AppLayout from "@/Layouts/App.vue";
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    translation: Object,
    employee: Object,
    hractions: Array,
});
</script>

<template>
    <AppLayout>
        <div class="flex flex-col">
            <div class="flex justify-between items-center px-4">
                <h2 class="font-semibold text-lg text-center py-4">
                    {{ translation?.history }}
                </h2>
                <Link
                    :href="route('actions.create')"
                    class="bg-gradient-to-r from-green-400 to-blue-500 w-48 rounded-md text-center py-2 text-white font-semibold"
                    >Nueva solicitud</Link
                >
            </div>
            <ul class="flex flex-col">
                <li
                    v-for="action in hractions"
                    class="w-full px-2 py-2 flex flex-col border-b border-gray-300 hover:bg-gray-200"
                >
                    <Link :href="route('actions.edit', action.id)">
                        <p>
                            {{ translation?.date }}:
                            <span>{{ action.from_date }}</span>
                            |
                            <span>{{ action.to_date }}</span>
                        </p>
                        <span
                            :class="
                                action.status === 'rejected'
                                    ? 'text-red-500'
                                    : action.status === 'approved'
                                    ? 'text-green-500'
                                    : 'text-yellow-500'
                            "
                            >{{ translation[action.status] }}</span
                        >
                    </Link>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
