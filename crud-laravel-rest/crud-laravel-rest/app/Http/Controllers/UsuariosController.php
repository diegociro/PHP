<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class UsuariosController extends Controller
{

    public function listar (){
       $tresultados = DB::table('Usuarios')->get();
       return view ('usuarios.listar',['tuser' => $tresultados]);
    }

    public function detalles ($id){
        $resultado = DB::table('Usuarios')->where('login', '=', $id)->first();
       
		return view('usuarios.formulario',[
			'user'  => $resultado,
            'orden' => "Detalles"
		]);
    }

    public function nuevo_formulario (){
        return view('usuarios.formulario',[
            'orden' => "Nuevo" 
		]);
    }


    public function modificar_formulario($id){
        $resultado = DB::table('Usuarios')->where('login', '=', $id)->first();
       
		
		return view('usuarios.formulario',[
			'user'  => $resultado,
            'orden' => "Modificar"
		]);
    }

    public function procesar_formulario(Request $request) {
        $orden = $request->input('orden');
        switch ($orden){
            case "Modificar":$this->modificar($request); break;
            case "Nuevo"    :$this->crear($request); break;
            case "Volver"   : break;
        }
        return redirect()->action([UsuariosController::class,'listar']);
    }

    private function modificar (Request $request){
        $login      = $request->input('login');
        $nombre     = $request->input('nombre');
        $clave      = $request->input('clave');
        $comentario = $request->input('comentario');
         DB::table('Usuarios')->where('login','=',$login)
                             ->update([
                                 'nombre' => $nombre,
                                 'password'  => $clave,
                                 'comentario' => $comentario
                                 ]);
    }

    private function crear (Request $request){
        $login      = $request->input('login');
        $nombre     = $request->input('nombre');
        $clave      = $request->input('clave');
        $comentario = $request->input('comentario');
        DB::table('Usuarios')->insert([
            'login'  => $login,
            'nombre' => $nombre,
            'password'  => $clave,
            'comentario' => $comentario
        ]);

    }

    public function borrar ($id){
        DB::table('Usuarios')->where('login', '=', $id)->delete();
        return redirect()->action([UsuariosController::class,'listar']);
    }
    
}



