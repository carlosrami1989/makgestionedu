<?php

namespace App\Models\Modulos\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class familia extends Model
{
    use HasFactory;
    protected $table = 'familias';
    public $timestamps = false;

    protected $fillable = [
        'id',
       'MNombres',
       'MApellidos',
       'MOcupacion',
       'MDomicilio',
       'MLugar_Trabajo',
       'MTelefono',
       'MFecha_Nacimiento', 
       'PNombres',
       'PApellidos',
       'POcupacion',
       'PDomicilio',
       'PLugar_Trabajo',
       'PTelefono',
       'PFecha_Nacimiento',

       'id_EstadoCivil',
       
       'PARNombres',
       'PARApellidos',
       'PAROcupacion',
       'PARentesco',
       'PARTelefono',

        'Medico',
        'Telefono',
        'observacion_medica',
        'id_Estudiante',
        'created_at',
        'updated_at'
    
    ];

}
