<script setup>
import {ref, computed} from 'vue';
import {Head} from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import DropdownItem from '@/Components/DropdownItem.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const showSidebar = ref(false);

computed(() => {
    return showSidebar.value
});

</script>

<template>
    <nav class="bg-white border-b border-gray-100 fixed top-0 z-50 w-full">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <Link :href="route('dashboard')">
                            <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800"/>
                        </Link>
                    </div>
                    <div class="shrink-0 flex px-2 items-center">
                        <button @click="showSidebar = !showSidebar"
                                class="space-x-8 text-cyan-600 font-extrabold md:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </NavLink>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <NavLink :href="route('usuarios.index')" :active="route().current('usuarios.index')">
                            Usuarios
                        </NavLink>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ $page.props.auth.user.name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')">
                                    <i class="fa-solid fa-users-rectangle"></i> Perfil de Usuario
                                </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    <i class="fa-solid fa-right-from-bracket"></i> Salir
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{
                                    hidden: showingNavigationDropdown,
                                    'inline-flex': !showingNavigationDropdown,
                                }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{
                                    hidden: !showingNavigationDropdown,
                                    'inline-flex': showingNavigationDropdown,
                                }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </ResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">
                        {{ $page.props.auth.user.name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('profile.edit')">
                        <i class="fa-solid fa-users-rectangle"></i> Perfil de Usuario
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                        <i class="fa-solid fa-right-from-bracket"></i> Salir
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav>

    <aside
            class="fixed bg-gradient-to-r from-cyan-500 to-blue-500 top-0 left-0 z-40 w-64 h-screen py-20 transition-transform -translate-x-full border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
            :class="{ 'h-32 relative -translate-x-1 overflow-hidden': showSidebar }">
        <div class="h-full px-3 pb-4 overflow-y-auto dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-house"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-bank"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Kanban</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-gear"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Configuraci&oacuten</span>
                        <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 hover:bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300"><i
                                class="fa-solid fa-chevron-down"></i></span>
                    </a>
                </li>
                <li>
                    <a :href="route('usuarios.index')"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-user"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <DropdownItem title="Ajuste" icon="fa-gear">
                    <li>
                        <a :href="route('usuarios.index')"
                           class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fa-solid fa-user"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap"> Varios</span>
                        </a>
                    </li>
                </DropdownItem>
                <DropdownItem title="PDVSA" icon="fa-folder">
                    <li>
                        <a :href="route('usuarios.index')"
                           class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
                            <i class="fa-solid fa-user"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap"> Varios</span>
                        </a>
                    </li>
                </DropdownItem>

            </ul>

        </div>
    </aside>

    <div class="p-4 sm:ml-64 max-w-max">
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto mt-12 py-2 px-2 sm:px-6 lg:px-8">
                <slot name="header"/>
            </div>
        </header>

        <div class="p-4 border-2 border-blue-500 border-dashed rounded-lg dark:border-gray-700">
            <slot></slot>
        </div>
    </div>
</template>
