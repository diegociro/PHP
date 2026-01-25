<?php
use App\Http\Controllers\UsuariosController;
?>
@extends('usuarios.principal')

@section('contenido')

<form  action="{{ action([UsuariosController::class,'procesar_formulario']) }} " method="POST">
{{ csrf_field() }}
<table>
 <tr><td>Nombre </td> 
 <td>
 <input type="text" 	name="nombre" 	value="{{ $user->nombre  ?? ''}} "        <?= ($orden == "Detalles")?"readonly":"" ?> size="20" autofocus></td></tr>
 <tr><td>Login   </td> <td>
 <input type="text" 	name="login" 	value="{{ $user->login  ?? ''}}"          <?= ($orden == "Detalles" || $orden == "Modificar")?"readonly":"" ?> size="8"></td></tr>
 <tr><td>Contraseña </td> <td>
 <input type="password" name="clave" 	value="{{ $user->password  ?? ''}}"       <?= ($orden == "Detalles")?"readonly":"" ?> size=10></td></tr>
 <tr><td>Comentario </td><td>
 <input type="text" 	name="comentario" value="{{ $user->comentario  ?? ''}}"   <?= ($orden == "Detalles")?"readonly":"" ?> size=20></td></tr>
 </table>
<input type="submit"	 name="orden" 	value="<?=$orden?>">
 <input type="submit"	 name="orden" 	value="Volver">
</form> 

@endsection

