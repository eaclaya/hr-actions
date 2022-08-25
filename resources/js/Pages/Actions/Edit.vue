<script setup>
import AppLayout from "@/Layouts/App.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ActionsTable from "@/Components/ActionsTable.vue";
import { Inertia } from "@inertiajs/inertia";
const props = defineProps({
    translation: Object,
    employee: Object,
    categories: Array,
    action: Object,
});
const submitForm = async () => {
    const form = document.getElementById("actions-form");
    const formData = new FormData(form);
    formData.append("employee_id", props.employee.id);
    formData.append("account_id", props.employee.account_id);
    const { data } = await Inertia.post("/actions", formData);
    return data;
};
</script>

<template>
    <AppLayout>
        <div class="max-w-5xl mx-auto py-4 relative overflow-hidden">
            <img
                src="https://kmmotos.miposvirtual.com/logo/Qe8VzjgsFWsc8s7ikOxDChnsz6hY9bz6.jpeg?no_cache=1660864308"
                alt="Logo"
                class="absolute top-0 lg:top-4 left-4 w-12 lg:w-24"
            />
            <h1 class="text-center font-bold text-md lg:text-2xl">Accion de personal</h1>
            <h2 class="text-center font-bold text-md lg:text-xl mb-12">
                Departamento de talento humano
            </h2>
            <div class="flex justify-between items-center">
                <p class="text-sm lg:text-md">
                    Colaborador: {{ employee?.first_name }}
                    {{ employee?.last_name }}
                </p>
                <p class="text-sm lg:text-md">Puesto: {{ employee?.profile }}</p>
            </div>

            <ActionsTable :items="action.items" :categories="categories" />

            <div class="flex items-center gap-4 mb-8">
                <p class="text-sm lg:text-md">Fechas que implica el movimiento:</p>
                <p class="flex items-center gap-4">
                    <span
                        >Desde:
                        <input
                            type="date"
                            name="from_date"
                            :value="action.from_date"
                            disabled
                    /></span>
                    <span
                        >Hasta:
                        <input
                            type="date"
                            name="to_date"
                            :value="action.to_date"
                            disabled
                    /></span>
                </p>
            </div>
            <div class="w-full flex gap-4 mb-24">
                <p class="text-sm lg:text-md">Explicacion:</p>
                <textarea
                    name="comments"
                    id="comments"
                    class="w-full h-32"
                    disabled
                    >{{ action.comments }}</textarea
                >
            </div>
        </div>
    </AppLayout>
</template>
