<!-- Cree un sistema de acceso a un portal de descargas. Se requiere autenticación con usuarios.dat. 
El sistema debe actualizar el contador de descargas exitosas (similar al contador de accesos) 
si el login es correcto. Si el login es incorrecto, debe registrar en un archivo fallos.log 
la IP, el usuario que intentó acceder y la hora del fallo.

Clase de Datos Principal (Reutilizada):
Usuario.php (Se mantiene igual, la propiedad $accesos cuenta las descargas). -->


<?php
include_once 'Usuario.php';

// Suponemos que cargarTabla() y volcarUsuarios() están definidos aquí o incluidos.

/**
 * Registra un intento de login fallido en un archivo de bitácora dedicado 'fallos.log'.
 * Esta función se llama si accesoValido() devuelve false.
 * @param string $username El login que se intentó usar.
 * @param int $time El timestamp del fallo.
 */
function registrarFalloLogin($username, $time){
    $ip = $_SERVER["REMOTE_ADDR"];
    $tiempo = date("d-m-Y H:i:s",$time);
    $linea = "FALLO | IP: ".$ip." | USUARIO: ".$username." | HORA: ".$tiempo."\n";
    $resu = @file_put_contents("fallos.log",$linea,FILE_APPEND);
    return $resu;
}

/**
 * Incrementa el número de descargas exitosas realizadas por el usuario en 'usuarios.dat'.
 * Es idéntica a anotarNuevoAcceso(), pero con un nombre que refleja el nuevo propósito.
 * @param string $username El username para el cual registrar la descarga.
 * @return int El resultado de la operación.
 */
function registrarDescargaExitosa($username):int{
    $tablaUser = cargarTabla();
    if ( key_exists($username,$tablaUser) ){
        $tablaUser[$username]->accesos ++;
        volcarUsuarios($tablaUser);     
        return true;
    }
    return false;
}

// **Modificación clave en el controlador (`index.php`) para el POST:**
/*
    if (accesoValido($nombre,$clave)){
        // LÓGICA DE ÉXITO:
        // ... setea session ...
        registrarDescargaExitosa($nombre); // Actualiza contador
        registra($nombre, time()); // Registra desconexión (o descarga)
        include "bienvenido.php";
    } else {
        // LÓGICA DE FALLO:
        registrarFalloLogin($nombre, time()); // ¡NUEVA FUNCIÓN AQUÍ!
        $msg = "Nombre y contraseña incorrectos";
        include "acceso.php";
    }
*/
?>