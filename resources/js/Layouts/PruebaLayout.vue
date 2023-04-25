<script setup>
import { ref, computed } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

const showingNavigationDropdown = ref(false);
const showSidebar = ref(false);

const showHideSidebar = computed(() => {
  return showSidebar.value
});

</script>
<template>
  <div class="relative flex h-screen">
    <!--Sidebar-->
    <div
      class="bg-gradient-to-r from-cyan-500 to-blue-500 text-cyan-100 w-48 space-y-6 px-2 absolute inset-y-0 left-0 md:relative md:-translate-x-0 transform -translate-x-full transition duration-200 ease-in-out"
      :class="{ 'relative -translate-x-10': showSidebar }">
      
      <nav class=" relative top-0 left-0 z-40 ">
        <div>
          <a href="" class=" space-x-2 flex items-center px-4 py-4">
            <i class="fa-solid fa-bank"><span class=" font-bold text-white"> Laravell</span></i>
          </a>
        </div>
        <a href="" class="flex group items-center space-x-2 py-3 px-4 hover:bg-cyan-700 hover:text-cyan-300 rounded-lg"><i
            class="fa-solid fa-file"></i><span class="text-white group-hover:text-cyan-300"> Dashboard</span></a>
        <a href="" class="flex group items-center space-x-2 py-3 px-4 hover:bg-cyan-700 hover:text-cyan-300 rounded-lg"><i
            class="fa-solid fa-file"></i><span class="text-white group-hover:text-cyan-300"> User</span></a>
        <a href="" class="flex group items-center space-x-2 py-3 px-4 hover:bg-cyan-700 hover:text-cyan-300 rounded-lg"><i
            class="fa-solid fa-file"></i><span class="text-whitegroup-hover:text-cyan-300"> Team</span></a>
        <a href="" class="flex group items-center space-x-2 py-3 px-4 hover:bg-cyan-700 hover:text-cyan-300 rounded-lg"><i
            class="fa-solid fa-file"></i><span class="text-white group-hover:text-cyan-300"> Calendar</span></a>
        <a href="" class="flex group items-center space-x-2 py-3 px-4 hover:bg-cyan-700 hover:text-cyan-300 rounded-lg"><i
            class="fa-solid fa-file"></i><span class="text-white group-hover:text-cyan-300"> Tables</span></a>
      </nav>
    </div>
    <!--Main content-->
    <div class="flex-1">
      <!--Header-->


      <nav class="bg-white border-b border-gray-100 w-full fixed">
        <!-- Primary Navigation Menu -->
        <div class=" mx-auto px-2 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex ">
              <!--Button showSidebar-->
              <div class="shrink-0 flex items-center">
                <button @click="showSidebar = !showSidebar" class="space-x-8 text-cyan-600 font-extrabold md:hidden">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                  </svg>
                </button>
              </div>
              <div class="shrink-0 flex items-center">
                <Link :href="route('dashboard')">
                <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                </Link>
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

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                          fill="currentColor">
                          <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <DropdownLink :href="route('profile.edit')">
                      Perfil de Usuario
                    </DropdownLink>
                    <DropdownLink :href="route('logout')" method="post" as="button">
                      Cerrar Sesión
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
                  }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path :class="{
                    hidden: !showingNavigationDropdown,
                    'inline-flex': showingNavigationDropdown,
                  }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{
          block: showingNavigationDropdown,
          hidden: !showingNavigationDropdown,
        }" class="sm:hidden">
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
              <div class="font-medium text-sm text-gray-500">
                {{ $page.props.auth.user.email }}
              </div>
            </div>

          <div class="mt-3 space-y-1">
            <ResponsiveNavLink :href="route('profile.edit')">
              Perfil de Usuario
            </ResponsiveNavLink>
              <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                Cerrar Sesión
              </ResponsiveNavLink>
            </div>
          </div>
        </div>
      </nav>



      <!-- Content 
          <div class="container mx-auto mt-12 px-4 bg-gray-200">
            <main>
              <slot/>
            </main>
          </div>-->
      <!--Content-->
      <div class="grow p-8 mt-10 text-cyan-700 font-bold">
        <slot></slot>
      </div>

      <!-- Footer -->
      <footer class="p-1 bg-gray-300">&copy; Jesus Mata 2023</footer>


    </div>
  </div>
</template>