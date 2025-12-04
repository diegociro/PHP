<?php
include_once 'LogEntry.php';

// Definición simulada de usuarios válidos
const USUARIOS_VALIDOS = [
    'admin' => '123456',
    'editor' => 'password'
];

/**
 * Simula la verificación de credenciales contra una API externa.
 * Esto reemplaza la lectura de usuarios.dat y password_verify().
 * @param string $username El username a validar.
 * @param string $password La contraseña a validar.
 * @return bool Devuelve true si las credenciales coinciden con el diccionario local simulado.
 */
function accesoValido($username, $password): bool
{
    // Verifica si el usuario existe y si la contraseña coincide.
    if ( array_key_exists($username, USUARIOS_VALIDOS) && 
         USUARIOS_VALIDOS[$username] === $password ) {
        return true;
    }
    
    // Registra el fallo inmediatamente
    registrarEventoLog($username, "FALLO_API", time());
    return false;
}

/**
 * Registra un evento de acceso (éxito o fallo) en el archivo 'accesos.log'.
 * @param string $username El usuario que intentó el acceso.
 * @param string $status El estado del acceso ("EXITO" o "FALLO_API").
 * @param int $time El timestamp del evento.
 */
function registrarEventoLog($username, $status, $time){
    $ip = $_SERVER["REMOTE_ADDR"];
    $logEntry = new LogEntry($username, $status, $time, $ip);
    
    $fich = fopen("accesos.log","a"); // Abre en modo append
    // Uso directo de propiedades del objeto LogEntry para escribir la línea
    $linea = date("Y-m-d H:i:s", $logEntry->timestamp) . 
             " | STATUS: {$logEntry->status} | USER: {$logEntry->username} | IP: {$logEntry->ip}\n";
             
    fputs($fich, $linea);
    fclose($fich);
}

// **Función clave en el controlador (`index.php`) tras acceso válido:**
// registrarEventoLog($nombre, "EXITO", time());
// // El controlador debe gestionar la sesión y el flujo normal.
?>