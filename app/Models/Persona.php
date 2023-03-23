<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'cedula',
        'rif',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha',
        'telefono',
        'celular',
        'email',
        'lugarnac',
        'nacionalidad',
        'sexo',
        'status',
        'user_id',
        'user_create',
        'parentesco_id',
        'vocero_id'
    ];
}
