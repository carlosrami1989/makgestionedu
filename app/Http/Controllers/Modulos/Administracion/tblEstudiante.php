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

    public function createEstudiante(Request $request){
        //return  response()->json(['data' =>$request->all()], 200);
        // $request->validate([
             
         
        //     'peso' => 'required|not_in:0',
        //     'tipo_desechos' => 'required|not_in:0',
        //     'clasificacion_desechos' => 'required|not_in:0',
        //     'descripcion_desechos' => 'required',
        //     'responsable' => 'required|not_in:0',
        //     'id_departamento' => 'required|not_in:0',
        // ]);
    
    
       //return  response()->json(['data' =>$request->all()], 200);
        try {
            //code...
    
            // $var = tbIngresoInfo::All();
            // return  response()->json(['data' =>$var], 200);
    
    
            $crear = Estudiante::UpdateOrCreate([
                'id'=>$request->id,
            ],
            [   
                'CtxApellidoPaterno'=> $request->CtxApellidoPaterno, 
                'CtxApellidoMaterno'=> $request->CtxApellidoMaterno, 
                'CtxPrimerNombre'=> $request->CtxPrimerNombre, 
                'CtxSegundoNombre'=> $request->CtxSegundoNombre, 
                'CtxPrimerNombre'=> $request->CtxPrimerNombre, 
                'cedula'=>  $request->cedula, 
                'telefono'=> $request->telefono, 
                           
                
    
            ]
    
            );
    
            $wasCreated = $crear->wasRecentlyCreated; 
    
            return  response()->json(['data' =>$wasCreated], 200);
        } catch (Exception $e) {
            return  response()->json(['data' => $e->getMessage()], 500);
            //throw $th;
        }
    }
}
