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
}
