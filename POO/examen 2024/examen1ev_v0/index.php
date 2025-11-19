<?php
include_once 'funciones.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include "acceso.php";
}else{
    //aqui procesamos el formulario, tengamos en cuenta que el id no funciona en PHP solo es para JavaScript o CSS
    $nombre = $_POST["username"];
    $clave = $_POST["password"];
    $tiempo = $_POST["time"];
    if (accesoValido($nombre,$clave)){
        $_SESSION["nombre"] = $nombre;
        $_SESSION["tiempo"] = $tiempo;
        anotarNuevoAcceso($nombre);

        include "bienvenido.php";
    } else {
    $msg = "Nombre y contraseña incorrectos";
    include "bienvenido.php";
}
}


