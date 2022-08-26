<script setup>
import { ref } from "vue";
const props = defineProps({
    categories: Array,
    items: Array,
});
const hasItems = ref(false);
const selectedItems = ref({});
if (props.items) {
    props.items.map((item) => {
        selectedItems.value[item.action_type_id] = {
            selected: true,
            description: item.description
        }
        hasItems.value = true;
    });
}
</script>

<template>
    <ul class="flex flex-col px-2">
        <li v-for="category in categories" :key="category.id" class="my-8">
            <h2 class="w-full text-center font-bold text-md lg:text-xl mb-4">
                {{ category.name }}
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div
                    class="flex items-center gap-2"
                    v-for="_type in category.types"
                    :key="_type.id"
                >
                    <input
                        type="checkbox"
                        :name="`selectedTypes[${_type.id}][selected]`"
                        :checked="selectedItems[_type.id]"
                        :disabled="hasItems"
                    />
                    <label class="text-sm lg:text-md">{{ _type.name }}</label>
                    <span class="text-gray-500 text-sm" v-if="_type.label"
                        >({{ _type.label }})</span
                    >
                    <input
                        type="text"
                        v-if="_type.has_comments"
                        class="border-0 border-b border-gray-400"
                        :name="`selectedTypes[${_type.id}][comments]`"
                        :value="selectedItems[_type.id] ?  selectedItems[_type.id].description : '' "
                        :disabled="hasItems"
                    />
                </div>
            </div>
        </li>
    </ul>
</template>
