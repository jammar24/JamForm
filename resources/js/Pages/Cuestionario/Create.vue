<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  cuestionario_nombre: '',
  cuestionario_autor: '',
  cuestionario_tipo: '',
  categorias: [
    {
      categoria_nombre: 'Nombre de la Categoría',
      categoria_descripcion: '',
      categoria_activa: true,
      preguntas: [
        {
          pregunta_nombre: 'Mi primera pregunta',
          pregunta_tipo: 'TE',
          pregunta_activa: true,
          opciones: [{ opcion_nombre: 'Opcion 1', opcion_correcta: 0 }],
        },
      ],
    },
  ],
})

function submit() {
  router.post('/cuestionario', form)
}

function agregarCategoria() {
  //cambiar categoria_activa a false la que estaba activa
  const categoriaActiva = form.categorias.find(
    (categoria) => categoria.categoria_activa,
  )
  if (categoriaActiva) {
    categoriaActiva.categoria_activa = false
  }
  form.categorias.push({
    categoria_nombre: 'Nombre de la Categoría',
    categoria_descripcion: '',
    categoria_activa: true,
    preguntas: [
      {
        pregunta_nombre: 'Mi primera pregunta',
        pregunta_activa: true,
        pregunta_tipo: 'TE',
        opciones: [{ opcion_nombre: 'Opcion 1', opcion_correcta: true }],
      },
    ],
  })
}

function agregarOpcion(pregunta) {
    pregunta.opciones.push({
    opcion_nombre: 'Opcion 1',
    opcion_correcta: true,
  })
}

function agregarPregunta(categoria) {

    categoria.preguntas.push({
        pregunta_nombre: 'Mi primera pregunta',
        pregunta_activa: true,
        pregunta_tipo: 'TE',
        opciones: [{ opcion_nombre: 'Opcion 1', opcion_correcta: true }],
    })
}
</script>
<template>
  <div class="flex flex-col items-center justify-center w-full h-full">
    <form
      @submit.prevent="submit"
      class="w-full max-w-sm bg-white shadow-md rounded-md p-6"
    >
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

      <div class="p-10"></div>

      <div class="flex flex-col items-center justify-center w-full h-full">
        <div v-for="categoria in form.categorias">
            <div class="border p-5 mt-8">
                <h1 class="text-2xl font-semibold mb-4">
                    {{ categoria?.categoria_nombre ?? 'Nombre de la Categoría' }}
                </h1>
                <div>
                    <div v-if="categoria?.categoria_activa">
                    <!-- agregar categoria -->
                    <button
                        type="button"
                        class="w-full bg-purple-700 text-white font-semibold py-2 px-4 rounded-md"
                        @click="agregarCategoria"
                    >
                        Agregar Categoría
                    </button>
                    </div>
                    <input
                    id="categoria_nombre"
                    v-model="categoria.categoria_nombre"
                    type="text"
                    class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
                    />
                    <input
                    id="categoria_descripcion"
                    v-model="categoria.categoria_descripcion"
                    type="text"
                    class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
                    placeholder="Descripción de la Categoría"
                    />
                    <div class="p-10"></div>

                    <div
                    class="flex flex-col items-center justify-center w-full h-full"
                    >
                    <div v-for="pregunta in categoria.preguntas">
                        <h1 class="text-2xl font-semibold mb-4">
                        {{ pregunta?.pregunta_nombre ?? 'Nombre de la Pregunta' }}
                        </h1>
                        <button type="button" class="w-full bg-purple-700 text-white font-semibold py-2 px-4 rounded-md" @click="agregarPregunta(categoria)">
                        Agregar Pregunta
                        </button>
                        <input
                        id="pregunta_nombre"
                        v-model="pregunta.pregunta_nombre"
                        type="text"
                        class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
                        placeholder="Nombre de la Pregunta"
                        />
                        <select
                        type="text"
                        v-model="pregunta.pregunta_tipo"
                        id="pregunta_tipo"
                        class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
                        placeholder="Tipo de Pregunta"
                        >
                        <option value="TE">Texto</option>
                        <option value="OP">Opción Múltiple</option>
                        </select>
                        <div class="p-10"></div>

                        <!-- only show this if pregunta.pregunta_tipo === 'OP' -->
                        <div v-if="pregunta.pregunta_tipo === 'OP'">
                        <div
                            class="flex flex-col items-center justify-center w-full h-full"
                        >
                            <button
                            type="button"
                            class="w-full bg-purple-700 text-white font-semibold py-2 px-4 rounded-md"
                            @click="agregarOpcion"
                            >
                            Agregar Opción
                            </button>
                            <h1 class="text-2xl font-semibold mb-4">Opciones</h1>
                            <div v-for="opcion in pregunta.opciones">
                            <input
                                id="opcion_nombre"
                                v-model="opcion.opcion_nombre"
                                type="text"
                                class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
                                placeholder="Nombre de la Opción"
                            />
                            <select
                                type="text"
                                v-model="opcion.opcion_correcta"
                                id="opcion_correcta"
                                class="mb-4 w-full bg-gray-100 border-2 border-gray-200 rounded-md"
                                placeholder="Opción Correcta"
                            >
                                <option value="0">Correcta</option>
                                <option value="1">Incorrecta</option>
                            </select>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <button
          type="submit"
          class="w-full bg-purple-700 text-white font-semibold py-2 px-4 rounded-md"
        >
          Guardar Cuestionario
        </button>
      </div>
    </form>
  </div>
</template>
