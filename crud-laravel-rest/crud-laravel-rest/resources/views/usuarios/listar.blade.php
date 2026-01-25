<?php
use App\Http\Controllers\UsuariosController;
?>
@extends('usuarios.principal')

@section('contenido')

<?php
$titulos = [ "Nombre","login","Password","Comentario"];
?>
<table>
<tr>
@for ($j=0; $j < count($titulos); $j++)
  <th>{{ $titulos[$j] }}</th>
@endfor
</tr>
@foreach ($tuser as $user) 
  <tr>
  <td>{{$user->nombre}}</td>
  <td>{{$user->login}}</td>
  <td>{{$user->password}}</td>
  <td>{{$user->comentario}}</td>
  <td><a href="{{ action([UsuariosController::class,'borrar'],['id' => $user->login]) }}" 
    onclick=" return confirm('¿Quieres eliminar el usuario:  {{ $user->login }}')">Borrar</a></td>
  <td><a href="{{ action([UsuariosController::class,'modificar_formulario'],['id' => $user->login]) }}">Modificar</a></td>
  <td><a href="{{ action([UsuariosController::class,'detalles'],['id' => $user->login]) }}" >Detalles</a></td>
  </tr>
@endforeach
</table>
<form  action = "{{ action([UsuariosController::class,'nuevo_formulario']) }} ">
<input type="submit" name="orden" value="Nuevo">
</form>
@endsection