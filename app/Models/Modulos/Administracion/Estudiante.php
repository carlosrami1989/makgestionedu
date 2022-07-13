<?php

namespace App\Models\Modulos\Administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'tb_estudiante';
    /**
     * @var string
     */
   
    public $timestamps = false;

    protected $fillable = [
        'id',
        'CtxApellidoPaterno',
        'CtxApellidoMaterno',
        'CtxPrimerNombre',
        'CtxSegundoNombre',
        'cedula',
        'telefono',
        'direccion',
        'sexo',
        'direccion_secundaria',
        'ciudad',
        'provincia',
        'parroquia',
        'es_extranjero',
        'email',
        'CtxNombre',
        'created_at',
        'updated_at'
    ];
    protected $appends = [
        'FULLNAME' 
  ];
  public function getFULLNAMEattribute()
    {
        $nombres =  $this->CtxApellidoPaterno.' '.$this->CtxApellidoMaterno.' '.$this->CtxPrimerNombre.' '.$this->CtxSegundoNombre;

        return $nombres;
    }
}
