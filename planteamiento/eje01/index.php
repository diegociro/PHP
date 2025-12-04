<?php
session_start();
include_once 'funciones.php';

if (isset($_SESSION['dni'])) {

    if (isset($_GET['orden'])) {
        if ($_GET['orden'] == 'salir') {
            session_destroy();
            include 'vistas/login.php';
            // ALMACENAR LOS PUNTOS EN FICHERO Y CERRAR LA SESION
            // MOSTRAR VISTA DE INICIAL
            exit();
        }
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0) {
            // CAMBIAR LOS  PUNTOS DE LA SESION CON VALORES ALEATORIA
            $_SESSION['puntos'] += 10;
            if ($_SESSION['puntos'] <= 0) {
                $_SESSION['puntos'] = 0;
            }
        }
    } 
    include 'vistas/puntos.php';
}




if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION['dni'])) {
        include 'vistas/login.php';
}else{

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //include 'vistas/login.php';

    // PROCESAR FORMULARIO LOGIN
    $dni = $_POST['dni'];
    $clave = $_POST['clave'];
    $puntos = $_POST['puntos'];
    // COMPROBAR QUE LOS PUNTOS SON NUMERICOS
    // COMPROBAR QUE DNI Y LA CLAVE SON CORRECTOS
    if (validarCliente($dni, $clave)){
        $_SESSION['dni'] = $dni;
        $_SESSION["clave"] = $clave;

        $msg = "puedes acceder";
        include 'vistas/puntos.php';

    }else{
        $msg = "Nombre y contraseña no son correctos";
        include "vistas/login.php";
        }
    // SI NO ES CORRECTO MOSTRAR EL LOGIN CON UN 
    // MENSAJE DE ACCESO
    // ANOTAR PUNTOS Y DNI EN AL SESSION Y MOSTRAR LA VISTA DE PUNTOS
   
     $_SESSION['dni'] = "000007";
     $_SESSION['puntos'] = 333;
    //include 'vistas/puntos.php';
    
}
}

