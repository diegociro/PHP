<!-- Desarrolle un sistema para un consultorio que requiere que los usuarios se autentiquen 
(usando usuarios.dat y Usuario.php). Tras el acceso exitoso, 
la aplicación debe permitir al usuario simular la reserva de una cita y 
registrar esta acción en una bitácora detallada. -->

<?php
include_once 'Usuario.php'; // Incluye la clase Usuario y funciones como cargarTabla()

// Suponemos que cargarTabla() y volcarUsuarios() están definidos aquí o incluidos.

/**
 * Registra una acción específica (simulación de reserva) en un archivo de bitácora 'acciones.log'.
 * Esta función reemplaza a registra() del enunciado original, siendo más específica.
 * @param string $username El login del usuario que realiza la acción.
 * @param string $accion La descripción de la acción realizada (e.g., "RESERVA DE CITA").
 * @param int $time El timestamp de la acción.
 */
function registrarAccion($username, $accion, $time){
    $ip = $_SERVER["REMOTE_ADDR"];
    $tiempo_formato = date("d-m-Y H:i:s",$time);
    // Nuevo formato de log más informativo
    $linea = $tiempo_formato." | IP: ".$ip." | USUARIO: ".$username." | ACCION: ".$accion."\n"; 
    $resu = @file_put_contents("acciones.log",$linea,FILE_APPEND);
    return $resu;
}

/**
 * Incrementa el número de reservas realizadas por el usuario en 'usuarios.dat'.
 * Nota: Es idéntica a anotarNuevoAcceso() en funcionalidad, pero semánticamente distinta.
 * @param string $username El username para el cual registrar la reserva.
 * @return int El resultado de la operación (similar a true/false).
 */
function registrarReserva($username):int{
    $tablaUser = cargarTabla();
    if ( key_exists($username,$tablaUser) ){
        // Usamos la propiedad 'accesos' para contar las reservas
        $tablaUser[$username]->accesos ++; 
        volcarUsuarios($tablaUser);     
        return true;
    }
    return false;
}

// **Función clave en el controlador (`index.php`) tras acceso válido:**
// registrarReserva($nombre);
// registrarAccion($nombre, "RESERVA DE CITA", time());
?>