<html>
<head>
<title>Procesa una subida de archivos </title>
<meta charset="UTF-8">
</head>
<?php



if (count($_POST) == 0 ){
   $mensaje= "  Error: se supera el tamaño máximo de un petición POST ";
   }
else if ((! isset($_FILES['archivo1']['name']))) {
    $mensaje .= 'ERROR: No se indicó el archivo';
} 
