<script setup>

// Importación de componentes y librerías
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'


// Define las propiedades del componente
defineProps({
    cuestionarios: {
        type: Array,
        required: true,
    },
});

// Función para eliminar un cuestionario por su $id
function deleteCuestionario(id) {
    if (confirm('¿Estás seguro de que quieres eliminar este cuestionario?')) {
        router.delete(route('cuestionario.destroy', id))
    }
}
</script>

<template>
  
    <AppLayout title="Dashboard">
        <Link :href="route('cuestionario.create')" class="text-white bg-purple-700 rounded-md m-15">Crear Cuestionario</Link>
        <div class="bg-white h-[700px]">
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>

               <!--columnas de la tabla -->
                <th class="px-6 py-3 bg-gray-175">
                    <span class="text-xs font-medium text-gray-500 uppercase">Nombre del Cuestionario</span>
                </th>
                <th class="px-6 py-3 bg-gray-175">
                    <span
                        class="text-xs font-medium text-gray-500 uppercase">Autor</span>
                </th>
                <th class="px-6 py-3 bg-gray-175">
                    <span
                        class="text-xs font-medium text-gray-500 uppercase">Tipo</span>
                </th>
                <th class="px-6 py-3 bg-gray-175">
                    <span class="text-xs font-medium text-gray-500 uppercase">Estado</span>
                </th>
                <th class="px-6 py-3 bg-gray-175">
                    <span class="text-xs font-medium text-gray-500 uppercase">Acciones</span>
                </th>
            </tr>
            <!-- Otras columnas: Autor, Tipo, Estado y Acciones -->
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in cuestionarios" :key="item.id">
                <tr class="bg-gray-200">
                   <!--  información de cada cuestionario  de la tabla -->
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-center shadow-md rounded-md">
                        {{ item.cuestionario_nombre }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-center shadow-md rounded-md">
                        {{ item.cuestionario_autor }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-center shadow-md rounded-md">
                        {{ item.cuestionario_tipo }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-center shadow-md rounded-md">
                        {{ item.cuestionario_estado }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-center shadow-md rounded-md">
                        <div v-if="$page.props.auth?.user?.tipo === 'AD'">
                            <Link :href="route('cuestionario.edit', item.id)"
                                         class="mr-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Editar
                            </Link>

                        <!--para eliminar el cuestionario -->

                            <button @click="deleteCuestionario(item.id)"


                                  class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Eliminar</button>
                        </div>
                        <div v-else>                   
                            <button v-if="$page.props.auth?.user?.tipo === 'TE'"  @click="deleteCompany(item.id)"
                                    class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Realizar</button>
                        </div>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
    </AppLayout>
</template>
