<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
defineProps({
    translation: Object,
});
const form = useForm({
    id_number: "",
});
</script>

<template>
    <Head title="Login" />

    <section
        class="flex items-center justify-center h-screen w-full bg-gray-100"
    >
        <div class="max-w-2xl w-full bg-white px-12 py-16 shadow-lg rounded-md">
            <form
                @submit.prevent="form.post(route('employees.validate'))"
                class="flex flex-col gap-8"
            >
                <div class="flex flex-col gap-2">
                    <label for="id_number">{{ translation.id_number }}</label>
                    <input
                        type="text"
                        class="w-full border-gray-400 rounded-md"
                        :placeholder="translation.id_number_placeholder"
                        v-model="form.id_number"
                    />
                    <p v-if="form.errors.id_number" class="w-full text-red-500">
                        {{ translation[form.errors.id_number] }}
                    </p>
                </div>

                <div class="flex justify-center items-center">
                    <button
                        class="w-full bg-gradient-to-r from-green-400 to-blue-500 text-white rounded-md py-2"
                    >
                        {{ translation.continue }}
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>
