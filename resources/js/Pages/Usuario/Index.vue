<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import WarningButton from '@/Components/WarningButton.vue';
import SecundaryButton from '@/Components/SecondaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import Modal from '@/Components/Modal.vue';
import { nextTick, ref } from 'vue';
import Swal from 'sweetalert2';
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination';
import VueDatePicker from '@vuepic/vue-datepicker';

const nameInput = ref(null);
const modal = ref(false);
const title = ref('');
const operation = ref(1);
const id = ref('');
const date = ref(new Date());

const props = defineProps({
  usuarios: { type: Object, default: () => {} },
  roles: { type: Object, default: () => {} },

});

/*const format = (date) => {
  const day = date.getDate();
  const month = date.getMonth() + 1;
  const year = date.getFullYear();

  return `${day}/${month}/${year}`;
}*/

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  primer_nombre: '',
  segundo_nombre: '',
  primer_apellido: '',
  segundo_apellido: '',
  cedula: '',
  fecha: '',
  lugarnac: '',
  nacionalidad: '',
  parentesco_id: '',
  sexo: '',
  celular: '',
  estados_id: '',
  ciudades_id: '',
  municipios_id: '',
  parroquias_id: '',
  urbanizacion: '',
  tzona: '',
  nzona: '',
  tcalle: '',
  ncalle: '',
  tvivienda: '',
  nvivienda: '',
  rol: '',
});

const formPage = useForm({});
const onPageClick = (event) => {
  formPage.get(route('usuarios.index', { page: event }));
}

const openModal = (op, name, email, usuarios, roles) => {
  modal.value = true;
  nextTick(() => nameInput.value.focus());
  operation.value = op;
  id.value = usuarios;
  if (op == 1) {
    title.value = 'Crear Usuario';
  } else {
    title.value = 'Editar Usuario';
    form.name = name;
    form.email = email;
    form.primer_nombre = props.usuarios[0].persona.primer_nombre;
    form.segundo_nombre = props.usuarios[0].persona.segundo_nombre;
    form.primer_apellido = props.usuarios[0].persona.primer_apellido;
    form.segundo_apellido = props.usuarios[0].persona.segundo_apellido;
    form.cedula = props.usuarios[0].persona.cedula;
    form.fecha = props.usuarios[0].persona.fecha;
    form.sexo = props.usuarios[0].persona.sexo;
    form.lugarnac = props.usuarios[0].persona.lugarnac;
    form.nacionalidad = props.usuarios[0].persona.nacionalidad;
    form.parentesco_id = props.usuarios[0].persona.parentesco_id;
    form.rol = props.roles;
    

    //let user = props.usuarios.filter(u => u.id == 1)

    //console.log(user)

  }

}

const closeModal = () => {
  modal.value = false;
  form.reset();
}

const save = () => {
  if (operation.value == 1) {
    form.post(route('usuarios.store'), {
      onSuccess: () => {
        ok('Usuario Creado')
      }
    });
  } else {
    form.put(route('usuarios.update', id.value), {
      onSuccess: () => {
        ok('Usuario Actualizado')
      }
    });
  }
}

const ok = (msj) => {
  form.reset();
  closeModal();
  Swal.fire({ title: msj, icon: 'success' });
}

const deleteEmployee = (id, name) => {

  const alerta = Swal.mixin({
    buttonsStyling: true
  });
  alerta.fire({
    title: 'Esta seguro de eliminar ' + name + ' ?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: '<i class="fa-solid fa-check"></i> Si¡, Eliminar',
    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      form.delete(route('usuarios.destroy', id), {
        onSuccess: () => {
          ok('Usuario Eliminado')
        }
      });
    }
  })
}

console.log(props.usuarios[0].persona.primer_nombre)

</script>

<template>
  <Head title="Usuario" />

  <DashboardLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Usuarios</h2>
    </template>

    {{ $props.usuarios.persona }}

    <div class="py-12">
      <div class="max-w-max mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">

          <div class="bg-white grid v-screen place-items-center overflow-x-auto">
            <PrimaryButton @click="$event => openModal(1)" class="my-2">
              <i class="fa-solid fa-plus-circle"> Nuevo Usuario</i>
            </PrimaryButton>
          </div>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  #
                </th>
                <th scope="col" class="px-6 py-3">
                  Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                  Email
                </th>
                <th scope="col" class="px-6 py-3">
                  Status
                </th>
                <th scope="col" class="px-6 py-3">
                  Acci&oacuten
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="emp, i in usuarios" :key="emp.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ (i + 1) }}
                </th>
                <td class="px-6 py-4">
                  {{ emp.name }}
                </td>
                <td class="px-6 py-4">
                  {{ emp.email }}
                </td>
                <td class="px-6 py-4 w-">
                  {{ emp.status }}
                </td>
                <td class="px-6 py-4">
                  <WarningButton @click="$event => openModal(2, emp.name, emp.email, emp.id)">
                    <i class="fa-solid fa-edit"></i>
                  </WarningButton>
                  <DangerButton @click="$event => deleteEmployee(emp.id, emp.name)">
                    <i class="fa-solid fa-trash"></i>
                  </DangerButton>
                </td>
              </tr>

            </tbody>
          </table>

        </div>
        <br>
        <div class="relative overflow-x-auto ali shadow-md sm:rounded-lg">
          <VueTailwindPagination :current="usuarios.currentPage" :total="usuarios.total" :per-page="usuarios.perPage"
            @page-changed="$event => onPageClick($event)">
          </VueTailwindPagination>
        </div>


        <Modal :show="modal" @close="closeModal">

          <div class="isolate bg-white px-6 py-12 sm:py-32 lg:px-8">
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
              aria-hidden="true">
              <div
                class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
              </div>
            </div>
            <div class="mx-auto max-w-2xl text-center">
              <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ title }}</h2>
              <!--<p class="mt-2 text-lg leading-8 text-gray-600">Aute magna irure deserunt veniam aliqua magna enim
                        voluptate.</p>-->
            </div>
            <div class="mx-auto mt-16 max-w-xl sm:mt-20">
             
              <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3">
                <div>
                  <InputLabel for="primer_nombre" value="Primer Nombre:"></InputLabel>
                  <TextInput id="primer_nombre" ref="nameInput" v-model="form.primer_nombre" type="text" class="mt-1"
                    placeholder="Primer Nombre">
                  </TextInput>
                  <InputError :message="form.errors.primer_nombre" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="segundo_nombre" value="Segundo Nombre:"></InputLabel>
                  <TextInput id="segundo_nombre" v-model="form.segundo_nombre" type="text" class="mt-1"
                    placeholder="Segundo Nombre">
                  </TextInput>
                  <InputError :message="form.errors.segundo_nombre" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="primer_apellido" value="Primer Apellido:"></InputLabel>
                  <TextInput id="primer_apellido" v-model="form.primer_apellido" type="text" class="mt-1"
                    placeholder="Primer Apellido">
                  </TextInput>
                  <InputError :message="form.errors.primer_apellido" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="segundo_apellido" value="Segundo Apellido:"></InputLabel>
                  <TextInput id="segundo_apellido" v-model="form.segundo_apellido" type="text" class="mt-1"
                    placeholder="Segundo Apellido">
                  </TextInput>
                  <InputError :message="form.errors.segundo_apellido" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="cedula" value="Numero de Cedula:"></InputLabel>
                  <TextInput id="cedula" v-model="form.cedula" type="text" class="mt-1" placeholder="Numero de Cedula">
                  </TextInput>
                  <InputError :message="form.errors.cedula" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="fecha" value="Fecha:"></InputLabel>
                  <div class="mt-1">
                    <VueDatePicker id="fecha" v-model="fecha" locale="es"></VueDatePicker>
                    <InputError :message="form.errors.fecha" class="mt-2"></InputError>
                  </div>
                </div>
                <div>
                  <InputLabel for="sexo" value="Sexo:"></InputLabel>
                  <TextInput id="sexo" v-model="form.sexo" type="text" class="mt-1" placeholder="Sexo">
                  </TextInput>
                  <InputError :message="form.errors.sexo" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="lugarnac" value="Lugar de Nacimiento:"></InputLabel>
                  <TextInput id="lugarnac" v-model="form.lugarnac" type="text" class="mt-1"
                    placeholder="Lugar de Nacimiento">
                  </TextInput>
                  <InputError :message="form.errors.lugarnac" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="nacionalidad" value="Nacionalidad:"></InputLabel>
                  <TextInput id="nacionalidad" v-model="form.nacionalidad" type="text" class="mt-1"
                    placeholder="Nacionalidad">
                  </TextInput>
                  <InputError :message="form.errors.nacionalidad" class="mt-2"></InputError>
                </div>
                
                <div>
                  <InputLabel for="parentesco_id" value="Parentesco:"></InputLabel>
                  <TextInput id="parentesco_id" v-model="form.parentesco_id" type="text" class="mt-1" placeholder="Parentesco">
                  </TextInput>
                  <InputError :message="form.errors.parentesco" class="mt-2"></InputError>
                </div>
                <!--<div class="">
                  <InputLabel for="estados_id" value="Estado:"></InputLabel>
                  <SelectInput id="estados_id" :options="Estado" v-model="form.estados_id" type="text"
                    class="mt-1 block w-3/4" placeholder="Estado"></SelectInput>
                  <InputError :message="form.errors.estados_id" class="mt-2"></InputError>
                </div>-->
                <div class="sm:col-span-3">
                  <InputLabel for="coments" value="Observacion:"></InputLabel>
                  <div class="mt-2.5">
                    <textarea name="message" id="message" rows="4"
                      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                  </div>
                </div>
              </div>

              <br>
              <hr>
              <br>

              <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3">
                <div>
                  <InputLabel for="name" value="Nombre:"></InputLabel>
                  <TextInput id="name" v-model="form.name" type="text" class="mt-1"
                    placeholder="Name">
                  </TextInput>
                  <InputError :message="form.errors.nacionalidad" class="mt-2"></InputError>
                </div>
                <div class="sm:col-span-2">
                  <InputLabel for="email" value="Email:"></InputLabel>
                  <TextInput id="email" v-model="form.email" type="emails" class="mt-1" placeholder="Email">
                  </TextInput>
                  <InputError :message="form.errors.nacionalidad" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="password" value="Password"></InputLabel>
                  <TextInput id="password" v-model="form.password" type="" class="mt-1" placeholder="Password"></TextInput>
                  <InputError :message="form.errors.password" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="password_confirmation" value="Confirmar Password"></InputLabel>
                  <TextInput id="password_confirmation" v-model="form.password_confirmation" type="" class="mt-1" placeholder="Confirmar Password"></TextInput>
                  <InputError :message="form.errors.password_confirmation" class="mt-2"></InputError>
                </div>
                <div>
                  <InputLabel for="rol" value="Rol"></InputLabel>
                  <SelectInput id="rol" :options="roles" v-model="form.rol" class="mt-1 block w-3/4" type="text" placeholder="Rol"></SelectInput>
                  
                </div>
              </div>
              <div class="mt-10">
                <button type="submit"
                  class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Let's
                  talk</button>
              </div>
            </div>
          </div>



          <div class="flex">
            <div class="p-3 mt-6 flex">
              <PrimaryButton class="p-3 flex mt-2" :disabled="form.processing" @click="save">
                <i class="fa-solid fa-save"> Guardar</i>
              </PrimaryButton>
            </div>
            <div class="p-3 mt-6 flex justify-end">
              <SecundaryButton class="ml-3" :disabled="form.processing" @click="closeModal">
                Cancelar
              </SecundaryButton>
            </div>
          </div>
        </Modal>
      </div>

    </div>
  </DashboardLayout>
</template>