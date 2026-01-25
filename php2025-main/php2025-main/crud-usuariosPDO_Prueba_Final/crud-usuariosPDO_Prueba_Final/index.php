<?php
session_start();

include_once 'app/funciones.php';
include_once 'app/acciones.php';

// Div con contenido
$contenido = "";
$msg= "";

//Si no se ha accedido te pide el pin
//Si es incorrecto te lo vuelve a pedir
if (!isset($_SESSION['accesoconcedido'])) {
    if (!isset($_GET["pin"])) {
        include "app/layout/formulariopin.php";
        exit();
    } else if ($_GET["pin"] != "12345") {
        $msg = "Introduzca un pin correcto.";
        include "app/layout/formulariopin.php";
        exit();
    } else {
        $_SESSION["accesoconcedido"] = "si";
        $_SESSION["timeout"] = time();
        //header("Refresh:0");
    }
}

/* SESSION TIME CONTROL (10 min) 
Antes que nada: si caduca se corta todo
Mira cuánto tiempo ha pasado desde la última acción
Si han pasado 5 minutos: se cierra la sesión y se vuelve a formulariopin
*/
//if (isset($_SESSION['timeout'])) {??
if (time() - $_SESSION['timeout'] > 300) {
        accionTerminar(); //automáticamente cierra sesión
        exit();
    }

//Acciones
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET['orden'])) {
        switch ($_GET['orden']) {
            case "Nuevo":
                accionAlta();
                break;
            case "Borrar":
                accionBorrar($_GET['id']);
                break;
            case "Modificar":
                accionModificar($_GET['id']);
                break;
            case "Detalles":
                accionDetalles($_GET['id']);
                break;
            case "MasSaldo":
                //Si no se marca ningún checkbox no se hace nada
                if(isset($_GET['tuser'])){
                    accionMasSaldo($_GET['tuser']);
                }
                break;
            case "Bloquear":
                //Si los marco pasan a 1
                if(isset($_GET['tuser'])){
                    accionBloquear($_GET['tuser']);
                } else {
                    //No no se marca ninguno, todos quedan desbloqueados (a 0)
                    accionBloquear([]);
                }
                break;
            case "Terminar": //cerrar sesión
                accionTerminar();
                break;
        }
    }
}

// POST Formulario de alta o de modificación
else {
    if (isset($_POST['orden'])) {
        switch ($_POST['orden']) {
            case "Nuevo":
                accionPostAlta();
                break;
            case "Modificar":
                accionPostModificar();
                break;
            case "Detalles":; // No hago nada
        }
    }
}
$contenido .= mostrarDatos();
// Muestro la página principal

include_once "app/layout/principal.php";

