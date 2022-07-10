<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $fillable = [
        'pais_id',
        'descripcion',
        'abreviatura',
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
        'created_usu' => 'integer',
        'updated_usu' => 'integer',
        'is_visible' => 'boolean',
        'status' => 'boolean',
    ];
}
