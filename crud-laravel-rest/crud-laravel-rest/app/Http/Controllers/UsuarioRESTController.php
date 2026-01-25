<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioRESTController extends Controller
{
    public function listar()
    {
        $tresultados = DB::table('Usuarios')->get();
        return response()->json([
            'status' => true,
            'posts' => $tresultados
        ]);
    }

    public function detalles($id)
    {
        $resultado = DB::table('Usuarios')->where('login', '=', $id)->first();

        if ($resultado) {
            return response()->json(['status' => true, 'posts' => $resultado]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No existe el usuario'
            ], 404);
        }
    }



    
    public function modificar($login, Request $request)
    {
        $nuevo = json_decode($request->getContent());
        $nombre     = $nuevo->nombre;
        $password     = $nuevo->password;
        $comentario = $nuevo->comentario;


        DB::table('Usuarios')->where('login', '=', $login)
            ->update([
                'nombre' => $nombre,
                'password'  => $password,
                'comentario' => $comentario
            ]);

        return response()->json([
            'status' => true,
            'message' => "Usuario modificado",
            ], 200);
        
        
        

    }

    public function nuevo(Request $request)
    {

        $nuevo = json_decode($request->getContent());
        $login      = $nuevo->login;
        $nombre     = $nuevo->nombre;
        $password     = $nuevo->password;
        $comentario = $nuevo->comentario;

        $resultado = DB::table('Usuarios')->where('login', '=', $nuevo->login)->first();

        if (!$resultado) {

            DB::table('Usuarios')->insert([
                'login'  => $login,
                'nombre' => $nombre,
                'password'  => $password,
                'comentario' => $comentario
            ]);

            return response()->json([
                'status' => true,
                'message' => "Usuario añadido",
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Ya existe un usuario con el mismo login",
            ], 409);
        }
    }

    public function borrar($id)
    {
        DB::table('Usuarios')->where('login', '=', $id)->delete();

        return response()->json([
            'status' => true,
            'message' => "Usuario eliminado",
        ], 200);
    }
}
