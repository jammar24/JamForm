<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
// $fillable se una para especificar atributos 
    protected $fillable = [
        'pregunta_nombre',
        'pregunta_tipo',
        'fkid_categoria',
    ];
}
