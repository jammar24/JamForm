<?php

namespace App\Http\Controllers;
//use es lo que usa php para  mandar a ejecutar una accion dentro de un componete 
use App\Models\Categoria;
use App\Models\Cuestionario;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Cuestionario/Index', [
            'cuestionarios' => Cuestionario::all(),
        ]);//visulizamos nuesta aplicaio
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Cuestionario/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultCues = Cuestionario::create($request->all());
        $categorias = $request->input('categorias');
        $formattedCategories = [];
        $formattedPreguntas = [];
        foreach ($categorias as &$categoria) {
            $formattedCategoria = [
                'categoria_nombre' => $categoria['categoria_nombre'] ?? '',
                'categoria_descripcion' => $categoria['categoria_descripcion'] ?? '',
                'fkid_cuestionario' => $resultCues->id,
            ];
            $categoria['fkid_cuestionario'] = $resultCues->id;
            $formattedCategories[] = $formattedCategoria;
            $resultCat = Categoria::create($formattedCategoria);
            $preguntas = $categoria['preguntas'];
            foreach ($preguntas as &$pregunta) {
                $formattedPregunta = [
                    'pregunta_nombre' => $pregunta['pregunta_nombre'] ?? '',
                    'pregunta_tipo' => $pregunta['pregunta_tipo'] ?? '',
                    'fkid_categoria' => $resultCat->id,
                ];
                $resultPreg = Pregunta::create($formattedPregunta);
            }
        }/// show muestra todas la informacion de una accion en este caso el cuestionario


        return redirect()->route('cuestionario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Cuestionario/Edit', [
            'cuestionario' => Cuestionario::getDataById($id),
        ]);
    }//update del cuestinario

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $cuestionario = Cuestionario::find($id);

        if ($cuestionario) {
            $cuestionario->delete($id);
            return redirect()->route('cuestionario.index');
        }//funcion para eliminar  los cuestianarios 
    }
}
