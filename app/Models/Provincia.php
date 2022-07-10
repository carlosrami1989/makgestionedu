<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'provincias';

    protected $fillable = [
        'region_id',
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
