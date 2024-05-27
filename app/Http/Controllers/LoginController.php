<?php

namespace App\Http\Controllers;

use App\Models\ExtensionModel;
use App\Models\InstitucionModel;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   
    public function index(Request $request){
        
        if ($request->session()->has('Usuario') == false) {
            //dd($request->session()->has('Usuario'));
            $datos=array(
                'mensajeError'=>"Bloqueado"
            );
            return view('login.index',$datos);
        
        }else{
            session(['Validar' => '']);
            $datos=array(
                'mensajeError'=>"Bloqueado"
            );
            return view('login.index',$datos);
        }
    }
        

    public function validar(Request $request){
        //dd($request);
        if($request->email!="" && $request->clave!=""){
            $usuario= UsuarioModel::where('email',$request->email)
            ->where('Clave',$request->clave)
            ->join('tb_turnos_usuario', 'tb_turnos_usuario.idTurnoUsuario', 'tb_usuarios.Turno') 
            ->join('tb_modos', 'tb_modos.idModo', 'tb_usuarios.Modo')        //no olvidar dar turno
            ->get();
            //dd($usuario);
            $cantidadEncontrados=count($usuario);
            if($cantidadEncontrados){   
                 //creo la session para que cargue el menu
                session(['Usuario'=>$usuario[0]->Nombre]);
                session(['NombreInstitucion'=>$usuario[0]->Usuario]);
                //creo registro superio
                session(['NombreModo'=>$usuario[0]->Descripcion]);
                session(['idUsuario'=>$usuario[0]->idUsuario]);
                //session(['idReparticion'=>$usuario[0]->idReparticion]); //ya no lo uso, ahora el cue esta en la misma tabla usuario
                session(['UsuarioEmail'=>$usuario[0]->email]);
                session(['UsuarioCUE'=>$usuario[0]->CUE]);
                session(['Modo'=>$usuario[0]->Modo]);
                session(['TurnoDescripcion'=>$usuario[0]->Descripcion]);
                session(['idTurnoUsuario'=>$usuario[0]->Turno]);
                //obtengo el usuario que es la escuela a trabajar
               // $idReparticion = session('idReparticion');
                //consulto a reparticiones
                //$reparticion = DB::table('tb_reparticiones')
                //->where('tb_reparticiones.idReparticion',$idReparticion)
                //->get();
                //dd($reparticion[0]->Organizacion);
                
                /*$subOrganizacion=DB::table('tb_suborganizaciones')
                ->where('tb_suborganizaciones.idsuborganizacion',$reparticion[0]->subOrganizacion)
                ->select('*')
                ->get();
                */
                $institucionExtension=DB::table('tb_institucion_extension')
                ->where('tb_institucion_extension.CUECOMPLETO',$usuario[0]->CUECOMPLETO)
                ->where('tb_institucion_extension.idTurnoUsuario',$usuario[0]->Turno)
                ->get();

                //dd($institucionExtension);
                if ($institucionExtension->isNotEmpty()) {
                    session(['CUE' => $institucionExtension[0]->CUE ?? null]);
                    session(['CUECOMPLETO' => $institucionExtension[0]->CUECOMPLETO ?? null]);
                    session(['idInstitucionExtension' => $institucionExtension[0]->idInstitucionExtension ?? null]);
                    session(['Validar' => 'ok']);
                } else {
                    session(['CUE' => '0000000']);
                    session(['CUECOMPLETO' => '000000000']);
                    session(['idInstitucionExtension' => '00']);
                    session(['Validar' => 'ok']);
                }
                
                $datos=array(
                    'mensajeError'=>"Usuario Correcto",
                    'mensajeNAV'=>'Bandeja Principal'
                    );
                //dd($datos);
                return view('bandeja.index',$datos);
            }
            else{
                $datos=array(
                    'mensajeError'=>"No se encontro el usuario en el Sistema",
                    'mensajeNAV'=>'Bandeja Principal'
                    );
                return view('login.index',$datos);
            }
        }else{
            $datos=array(
                'mensajeError'=>"Los campos estan vacios",
                'mensajeNAV'=>'Bandeja Principal'
                );
            return view('login.index',$datos);
        }
        
    }

    public function pedirUsuario(){
        $infoCue= InstitucionModel::where('CUE',99999999999)
        ->get();
        $datos=array(
            'mensajeError'=>"",
            'mensajeNAV'=>'Bandeja Principal',
            'infoCue'=>$infoCue
            );
        return view('login.solicitarUsuario',$datos);
    }
    public function buscarCUE(Request $request){
        if($request->cue==""){
            $infoCue= InstitucionModel::where('CUE',9999999999)
            ->get();
            //dd($infoCue);
            $datos=array(
                'mensajeError'=>"Debe escribir una CUE validad",
                'mensajeNAV'=>'Bandeja Principal',
                'infoCue'=>$infoCue
                );
            return view('login.solicitarUsuario',$datos);
        }else{
            $infoCue= InstitucionModel::where('CUE',$request->cue)
            ->get();
            //dd($infoCue);
            $datos=array(
                'mensajeError'=>"",
                'mensajeNAV'=>'Bandeja Principal',
                'infoCue'=>$infoCue
                );
            return view('login.solicitarUsuario',$datos);
        }
        
    }

    public function cargarInfoUsuario($CUE){
        $infoInstitucion = InstitucionModel::where('CUE',$CUE)
            ->get();
        $Extensiones = DB::table('tb_extensiones')->get();
        $TurnosUsuario = DB::table('tb_turnos_usuario')->get();
        $infoCUECreadas = UsuarioModel::where('CUE',$CUE)
        ->get();

        //traigo todos los usuarios que tienen cue buscada

           //yodd($infoInstitucion);
            $datos=array(
                'mensajeError'=>"",
                'mensajeNAV'=>'Bandeja Principal',
                'infoInstitucion'=>$infoInstitucion,
                'Extensiones'=>$Extensiones,
                'infoCUECreadas'=>$infoCUECreadas,
                'TurnosUsuario'=>$TurnosUsuario
                );
            return view('login.cargaInfoPedido',$datos);
    }


    // // superior registro
    // public function registro(){
      
    //     return view('login.registro');
    // }
    // public function crearregistro(Request $request) {
    //     // Este bloque de código verifica si el usuario está intentando insertar un nuevo registro
    //     if ($request->isMethod('post')) {
    //         $nuevoUsuario = [
                    
    //             'email' => $request->input('Correo'),  // Asume que el formulario tiene un campo 'email'
    //             'Clave' => bcrypt($request->input('Clave')), // Cifrado de la contraseña
    //             'Modo' => 8, // Puedes cambiar esto según tus necesidades
    //             'created_at' => now(), // Marca la fecha de creación
    //             'updated_at' => now() // Marca la fecha de actualización
    //         ];
    
    //         // Insertar el nuevo usuario en la tabla
    //         DB::table('tb_usuarios')->insert($nuevoUsuario);
    
    //         // Puedes redirigir a alguna página o retornar un mensaje de éxito
    //         return redirect()->back()->with('success', 'Usuario creado con éxito');
    //     }
    
    //     // Este bloque de código obtiene todos los usuarios que no están en modo 8
    //     $Usuario = DB::table('tb_usuarios')
    //         ->where('Modo', '!=', 8)
    //         ->get();
    
    //     $datos = [
    //         'usuario' => $Usuario,
    //     ];
    
    //     // Retornar la vista para crear un nuevo usuario
    //     return view('login.crearregistro', $datos);
    // }
}
