<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Indico la ruta a los controladores
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\UsuarioRESTController;

Route::get('/', function () {
    //return view('welcome');
	return redirect()->action([UsuariosController::class,'listar']);
});


// Rutas de usuario

Route::group(['prefix'=>'usuarios'], function(){
	Route::get ('/', [UsuariosController::class,'listar']);
	Route::get ('listar'        , [UsuariosController::class,'listar']);
	Route::get ('detalles/{id}' , [UsuariosController::class,'detalles']);
	Route::get ('nuevo'         , [UsuariosController::class,'nuevo_formulario']);
	Route::post('nuevo'         , [UsuariosController::class,'procesar_formulario']);
	Route::get ('borrar/{id}'   , [UsuariosController::class,'borrar']);
	Route::get ('modificar/{id}', [UsuariosController::class,'modificar_formulario']);
	Route::post('modificar'     , [UsuariosController::class,'procesar_formulario']);
});


