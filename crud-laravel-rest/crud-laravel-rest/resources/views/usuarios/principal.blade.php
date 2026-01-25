<!-- Plantilla principal -->
<?php
use App\Http\Controllers\UsuariosController;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CRUD DE USUARIOS</title>
<link href="{{ URL::asset('css/default.css') }}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{ URL::asset('js/funciones.js') }}"></script>
</head>
<body>
<div id="container" >
<div id="header">
<h1>GESTIÓN DE USUARIOS con Laravel + BD</h1>
</div>
<div id="content">
    @yield('contenido')

</div>
</div>
</body>
