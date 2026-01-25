<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CRUD DE USUARIOS</title>
<link href="web/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="web/js/funciones.js"></script>
</head>
<body>
<div id="container" >
<div id="header">
<h1>GESTIÓN DE USUARIOS versión 1.1 + BD</h1>
</div>
<div id="content">
<form> <!-- IMPORTANTE: form antes de contenido para que se envíen los checkbox -->  
<?= $contenido ?>
<input type="submit" name="orden" value="Nuevo"> <!--El texto del botón es el value-->
<input type="submit" name="orden" value="Terminar">
<button name="orden" value="MasSaldo"> Incrementar saldo </button>
<button name="orden" value="Bloquear"> Actualizar bloqueos </button>
</form>
</div>
</div>
</body>
