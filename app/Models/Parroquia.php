<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;

    protected $table = 'parroquias';

    protected $fillable = [
        'canton_id',
        'tipo_parroquia_id',
        'descripcion',
        'abreviatura',
        'path',
        'latitud',
        'longitud',
        'created_at',
        'updated_at',
        'created_usu',
        'updated_usu',
        'created_ip',
        'updated_ip',
        'is_visible',
        'status',
    ];

    protected $casts = [
        'latitud' => 'integer',
        'longitud' => 'integer',
        'created_usu' => 'integer',
        'updated_usu' => 'integer',
        'is_visible' => 'boolean',
        'status' => 'boolean',
    ];
}
