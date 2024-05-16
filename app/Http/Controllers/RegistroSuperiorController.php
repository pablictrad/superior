<?php

namespace App\Http\Controllers;

use App\Models\AgenteModel;
use Illuminate\Http\Request;
use App\Models\UsuarioModel;
use App\Models\Agentes;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;

class RegistroSuperiorController extends Controller
{
    public function mostrarFormulario(){
        return view('login.registro');
    }

    public function guardarDatos(Request $request) {
      // dd($request);
        /**"_token" => "aEDzPFi2EZSoA9tSu23ccgTi0ZUQsGcLKbrgsZA7"
             "Documento" => "23232323"
            "nombre" => "Mario"
            "apellido" => "Alonso"
            "correo" => "mariaalonso@gmail.com"
            "clave" => "123" */
       //validación de los datos del formulario
    //    $request->validate([
    //     'Documento' => 'required',
    //     'nombre' => 'required',
    //     'apellido' => 'required',
    //     'correo' => 'required',
    //     'clave' => 'required',
    //    ]);
     
     
    
        //buscar Agente
        $agente = DB::table('tb_agentes')->where('Documento', $request->Documento)->first();
        //dd($agente);
        //verificar si se encontro el agente
        if(!$agente) {
            //dd("aqui");
            //inserta en la tabla usuarios
            $na = new UsuarioModel();
                $na->Nombre = $request->apellido . " " . $request->nombre;
                $na->Usuario = $request->apellido . " " . $request->nombre;
                $na->email = $request->correo;
                $na->Clave = $request->clave;
                $na->Agente = $request->Documento;
                $na->Modo = 7;
               // $na->Turno = 1;
            $na->save();

            //inserta en la tabla agentes
            $a = new Agentes();
            $a->ApeNom = $request->apellido . " " . $request->nombre;
            $a->Documento = $request->Documento;
            $a->save();
  
            return redirect('/registro')->with('ConfirmarNuevoUsuario', 'OK');
            
        } else {
            return redirect('/registro')->with('ConfirmarNuevoUsuarioError', 'OK');
    
        } 
    } 
       
}