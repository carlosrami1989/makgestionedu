<?php

namespace App\Http\Controllers\Modulos\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulos\Parametrizacion\Genero;
use App\Models\Modulos\Parametrizacion\Ciudad;
use App\Models\Modulos\Parametrizacion\Provincia;
use App\Models\Modulos\Administracion\Docente;

class tblDocente extends Controller
{
    public function consultargenero(){
        try {
            //code...
            $genero = Genero::All();

            return response()->json(['genero' => $genero], 200);
        } catch (Exception $e) {
            //throw $th;
            return response()->json(['msj' => $e->getMessage()], 500);
        }
    }
    public function consultarciudad($idprovincia){
        try {
            //code...
            $cuidad = Ciudad::where('provincia',$idprovincia)->get();

            return response()->json(['cuidad' => $cuidad], 200);
        } catch (Exception $e) {
            //throw $th;
            return response()->json(['msj' => $e->getMessage()], 500);
        }
    }

    public function consultarProvincia(){
        try {
            //code...
            $provincia = Provincia::All();

            return response()->json(['provincia' => $provincia], 200);
        } catch (Exception $e) {
            //throw $th;
            return response()->json(['msj' => $e->getMessage()], 500);
        }
    }

    public function consultardocentes(){
        try {
            //code...
            $docentes = Docente::All();
             

            return response()->json(['docente' => $docentes], 200);
        } catch (Exception $e) {
            //throw $th;
            return response()->json(['msj' => $e->getMessage()], 500);
        }
    }

}
