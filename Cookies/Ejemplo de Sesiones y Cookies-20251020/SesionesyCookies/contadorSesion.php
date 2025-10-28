<?php
  // Contador de visitas (Mientras no cierres en navegador 
  session_start(); // Inicio de sesión
  
  $nvisitas = 0;
  if(isset($_SESSION['visitas'])) {
    $nvisitas = $_SESSION['visitas'];
  }
  $nvisitas++;
  // Cambio el valor en la variable superglobal
  $_SESSION['visitas'] = $nvisitas;
  // Tambien funciona $_SESSION['visitas']++
  //las cookies no se pueden hacer asi, hay que usar el setcookie
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
  Visitas <?= $nvisitas ?>
  </body>
</html>
