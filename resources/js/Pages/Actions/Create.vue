<script setup>
import AppLayout from "@/Layouts/App.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ActionsTable from "@/Components/ActionsTable.vue";
import { Inertia } from "@inertiajs/inertia";
const props = defineProps({
    translation: Object,
    employee: Object,
    categories: Array,
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
        <form @submit.prevent="submitForm" id="actions-form">
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
                    <p>
                        Colaborador: {{ employee?.first_name }}
                        {{ employee?.last_name }}
                    </p>
                    <p>Puesto: {{ employee?.profile }}</p>
                </div>
                <ActionsTable :categories="categories" />

                <div class="flex flex-col lg:flex-row items-center gap-4 mb-8">
                    <p>Fechas que implica el movimiento:</p>
                    <p class="flex items-center gap-4">
                        <span
                            >Desde: <input type="date" name="from_date"
                        /></span>
                        <span>Hasta: <input type="date" name="to_date" /></span>
                    </p>
                </div>
                <div class="w-full flex gap-4 mb-24">
                    <p>Explicacion:</p>
                    <textarea
                        name="comments"
                        id="comments"
                        class="w-full h-32"
                    ></textarea>
                </div>
                <div class="w-full flex gap-4 mb-24">
                    <p>Adjuntar documentos:</p>
                    <input
                        type="file"
                        name="images[]"
                        multiple
                        accept=".doc,.docx,.pdf,.jpg,.jpeg,.png"
                    />
                </div>
                <div class="flex flex-col justify-center">
                    <button
                        type="submit"
                        class="bg-gradient-to-r from-green-400 to-blue-500 px-8 py-2 rounded-md font-semibold text-white"
                    >
                        Guardar
                    </button>
                </div>
                <!-- <div class="flex items-center gap-4 mb-24">
                <p class="border-t border-gray-600 w-full text-center">
                    Empleado
                </p>
                <p class="border-t border-gray-600 w-full text-center">
                    Jefe inmediato
                </p>
            </div>

            <div class="flex items-center gap-4 mb-16">
                <p class="border-t border-gray-600 w-full text-center">
                    Jefe/Gerente area
                </p>
                <p class="border-t border-gray-600 w-full text-center">
                    Gerente General
                </p>
            </div> -->
            </div>
        </form>
    </AppLayout>
</template>
