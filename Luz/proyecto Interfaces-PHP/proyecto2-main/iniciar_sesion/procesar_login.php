<?php
session_start();

// se toman los valores del formulario
/* se asegura que si no se envio nada la variable quede vacia en lugar de dar error
es como preguntar si existe (ISSET)*/

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// se guarda el fichero de usuarios
$archivoUsuarios = "usuarios.dat";
$loginCorrecto = false;

$lineas = file($archivoUsuarios, FILE_IGNORE_NEW_LINES);

foreach ($lineas as $linea) {
    list($user, $pass) = explode(":", $linea);

    if ($usuario === $user && $password === $pass) {
        $loginCorrecto = true;
        break;
    }
}

if ($loginCorrecto) {
    // Guardar sesión
    $_SESSION['usuario'] = $usuario;

    // Registrar en el log
    $fecha = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];
    file_put_contents(
        "accesos.log",
        "$fecha - Usuario: $usuario - IP: $ip\n",
        FILE_APPEND
    );

    header("Location: ../index.php");
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}
