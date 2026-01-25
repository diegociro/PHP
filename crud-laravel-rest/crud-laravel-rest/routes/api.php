<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioRESTController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get ('/'         , [UsuarioRESTController::class,'listar']);
Route::get ('/{id}'     , [UsuarioRESTController::class,'detalles']);
Route::post('/'         , [UsuarioRESTController::class,'nuevo']);
Route::delete ('/{id}'  , [UsuarioRESTController::class,'borrar']);
Route::put('/{id}'      , [UsuarioRESTController::class,'modificar']);
