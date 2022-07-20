<?php

namespace App\Http\Controllers\Modulos\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Modulos\Administracion\Estudiante;
class tblEstudiante extends Controller
{
    //
    public function ConsultarEstudiantes(){
        try {
            $estudiantes = Estudiante::All();
           
                return  response()->json(['estudiantes' => $estudiantes], 200);
          
        } catch (Exception $e) {
            return response()->json(['msj' => $e->getMessage()], 500);
        }
    }
}
