<script setup>
import { computed, ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const showDropdown = ref(true);

const props = defineProps({

    title: {
        type: String,
        required: true,

    },
    icon: {
        type: String,
        required: true,
    },
    
});

</script>
<template>
    <li>
        <button type="button" @click="showDropdown = !showDropdown"
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
            <i class="fa-solid " :class="icon"></i>
            <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ title }}</span>
            <i class="fa-solid fa-chevron-down"></i>
        </button>
        <ul class="py-2 space-y-2" :class="{ ' hidden py-2 space-y-2': showDropdown }">
            <slot>

            </slot>
        </ul>
    </li>
</template>