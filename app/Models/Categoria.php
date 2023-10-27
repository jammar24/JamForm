<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
// $fillable se una para especificar atributos 

    protected $fillable = [
        'categoria_nombre',
        'categoria_descripcion',
        'fkid_cuestionario',
        'categoria_activa'
    ];
}
