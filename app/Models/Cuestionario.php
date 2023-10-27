<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;

    protected $fillable = [
        "cuestionario_nombre",
        "cuestionario_autor",
        "cuestionario_tipo",
        "cuestionario_estado",
    ];


    public static function getData()
    {
        $cuestionarios = Cuestionario::all();
        foreach ($cuestionarios as &$cuestionario) {
            $categorias = Categoria::where('fkid_cuestionario', $cuestionario->id)->get();
            foreach ($categorias as &$categoria) {
                $preguntas = Pregunta::where('fkid_categoria', $categoria->id)->get();
                $categoria['preguntas'] = $preguntas;
            }
            $cuestionario['categorias'] = $categorias;
        }
        return $cuestionarios;
    }

    public static function getDataById($id)
    {
        $cuestionario = Cuestionario::find($id);
        $categorias = Categoria::where('fkid_cuestionario', $cuestionario->id)->get();
        foreach ($categorias as &$categoria) {
            $preguntas = Pregunta::where('fkid_categoria', $categoria->id)->get();
            $categoria['preguntas'] = $preguntas;
        }
        $cuestionario['categorias'] = $categorias;
        return $cuestionario;
    }
}
