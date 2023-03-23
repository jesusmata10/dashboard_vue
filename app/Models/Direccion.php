<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $fillable = [
        'personas_id',
        'estados_id',
        'municipios_id',
        'ciudades_id',
        'parroquias_id',
        'urbanizacion',
        'zonas_id',
        'name_zona',
        'areas_id',
        'name_area',
        'hogares_id',
        'name_hogar',
        'status'
    ];
}
