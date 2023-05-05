<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue', 'options']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <select class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" :value="modelValue"
        @change="$emit('update:modelValue', $event.target.value)" ref="input">
        <option v-for="op in options" :key="op.id" :value="op.id">
            {{ op.name }}
        </option>
    </select>
</template>
