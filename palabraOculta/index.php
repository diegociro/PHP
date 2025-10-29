<?php
require_once 'funciones.php';
define("MAXFALLOS", 5);
session_start();
$msg="";

if (! isset($_SESSION['palabrasecreta'])) {
    $_SESSION['palabrasecreta'] = elegirPalabra();
    $_SESSION['letrausuario'] = ""; // Inicialmente no tiene ninguna letra  
    $_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
}
//var_dump($_SESSION);
//exit();

if (isset($_GET["letra"])) {
    $letra = $_GET["letra"];
    if (comprobarLetra($letra,$_SESSION['palabrasecreta'])) {
        $_SESSION['letrausuario'] .= $letra;
    } else {
        $_SESSION['fallos']++;
        if ($_SESSION['fallos'] > MAXFALLOS) {
            $msg = "Superado maximo numero de intentos";
            session_destroy();
        }
    }
}
$palabraoculta = generaPalabraconHuecos($_SESSION["letrausuario"], $_SESSION['palabrasecreta']);

if ($palabraoculta == $_SESSION['palabrasecreta']) {
    // hemos ganado
    $msg = "";
    // Actualizar cookie
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $msg ?>
    PALABRA: <?= $palabraoculta ?> <br>
    has cometido <?= $_SESSION['fallos'] ?> fallos
    <form action="">
        <label for="">Introduzca una letra:
            <input type="text" name="letrausuario" id="" size="1">
        </label>
    </form>
</body>
</html>