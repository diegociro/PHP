<?php
include_once 'ConfigMod.php';

// El archivo config.json contiene un array asociativo: {"usuario": "clave_cifrada", ...}

/**
 * Lee los datos de autenticación desde el archivo JSON.
 * Reemplaza cargarTabla(). No devuelve objetos, sino un array asociativo.
 * @return array Array asociativo [usuario => clave_cifrada].
 */
function cargarCredenciales():array {
    if (!file_exists('config.json')) return [];
    $json_data = file_get_contents('config.json');
    return json_decode($json_data, true) ?? []; // Decodifica como array asociativo
}

/**
 * Verifica si el usuario existe y si la contraseña es válida.
 * Asume que las claves en config.json están cifradas con password_hash().
 * @param string $username El username a validar.
 * @param string $password La contraseña en texto plano.
 * @return bool True si las credenciales son válidas.
 */
function accesoValido($username, $password): bool
{
    $credenciales = cargarCredenciales();
    
    if ( key_exists($username, $credenciales) && 
         password_verify($password, $credenciales[$username]) ) {
        return true;
    }
    return false;
}

/**
 * Registra una nueva modificación de configuración en el archivo JSON de registro.
 * Esta acción se realiza tras un acceso válido.
 * @param string $username El usuario que accedió.
 */
function registrarModificacion($username): void
{
    $log_path = 'modificaciones.json';
    $log = file_exists($log_path) ? json_decode(file_get_contents($log_path), true) : [];
    
    // Crea el objeto de registro de modificación
    $mod = new ConfigMod($username, date("Y-m-d H:i:s"), "ACCESO EXITOSO");
    
    // Convierte el objeto a un array asociativo para el JSON
    $log_entry = [
        'usuario' => $mod->usuario,
        'fecha' => $mod->fecha,
        'accion' => $mod->accion
    ];
    
    $log[] = $log_entry; // Añade la nueva entrada al array
    
    // Vuelca el array completo de nuevo al archivo JSON
    file_put_contents($log_path, json_encode($log, JSON_PRETTY_PRINT));
}

// **Función clave en el controlador (`index.php`) tras acceso válido:**
// registrarModificacion($nombre);
// // El controlador debe gestionar la sesión y el flujo normal.
?>