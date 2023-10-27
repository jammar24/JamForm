<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    cuestionario_nombre: '',
    cuestionario_autor: '',
    cuestionario_tipo: '',
})

function submit() {
    router.post('/cuestionario', form)
}
</script>
<template>
  <div class="flex flex-col items-center justify-center w-full h-full">
    <form @submit.prevent="submit" class="w-full max-w-sm bg-white shadow-md rounded-md p-6">
      <h1 class="text-2xl font-semibold mb-4">Crear Cuestionario</h1>
      <input
        id="cuestionario_nombre"
        v-model="form.cuestionario_nombre"
        type="text"
        class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
        placeholder="Nombre del Cuestionario"
      />
      <input
        id="cuestionario_autor"
        v-model="form.cuestionario_autor"
        type="text"
        class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
        placeholder="Autor"
      />
        <!-- el tipo de cuestionario es un select con las opciones de: MA, IN, FI -->
        <select
        type="text"
        v-model="form.cuestionario_tipo"
        id="cuestionario_tipo"
        class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
        placeholder="Tipo de Cuestionario"
        >
            <option value="MA">Matematicas</option>
            <option value="IN">Ingles</option>
            <option value="FI">Fisica</option>
        </select>

        <button type="submit" class="w-full bg-purple-700 text-white font-semibold py-2 px-4 rounded-md">
        Crear Cuestionario
        </button>
    </form>
  </div>
</template>
