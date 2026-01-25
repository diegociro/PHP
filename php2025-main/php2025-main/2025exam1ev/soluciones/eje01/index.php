<?php
session_start();
include_once 'funciones.php';

if ( isset($_COOKIE['jugaste'])) {
      include_once 'vistas/bloqueocookie.php';
      exit();
}

if (isset($_SESSION['dni'])) {

    if (isset($_GET['orden'])) {
        if ($_GET['orden'] == 'salir') {
            setcookie('jugaste','si',time()+10*60);
            anotarPuntos($_SESSION['dni'],$_SESSION['puntos']);
            session_destroy();
            // Reload 
            include 'vistas/login.php';
            exit();
        }
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0) {
            $_SESSION['puntos'] += random_int(-50, 50);
            if ($_SESSION['puntos'] <= 0) {
                $_SESSION['puntos'] = 0;
            }
        }
    } 
    include 'vistas/puntos.php';
}




if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION['dni'])) {
        include 'vistas/login.php';
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $dni = $_POST['dni'];
    $clave = $_POST['clave'];
    $puntos = $_POST['puntos'];
    if ( is_numeric($puntos)) {
    if (validarCliente($dni,$clave)){
     $_SESSION['dni'] = $dni;
     $_SESSION['puntos'] = $puntos;
     include 'vistas/puntos.php';
    } else {
        $msg = " Nombre y contraseña incorrectos";
        include "vistas/login.php";
    }
} else {
        $msg = " Los puntos debe ser un valor númerico";
        include "vistas/login.php";
}
    
}



