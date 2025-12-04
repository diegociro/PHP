<?php
include_once 'Usuario.php';

// La función cargarTabla() ahora debe esperar 4 campos de 'usuarios.dat':
// list ($login, $password,$accesos, $ultima_ip ) = $valores;
// $user = new Usuario($login,$password,$accesos, $ultima_ip);

/**
 * Registra un nuevo acceso, incrementa el contador Y actualiza la última IP de conexión.
 * Esta función reemplaza a anotarNuevoAcceso() del enunciado original.
 * @param string $username El username para el cual registrar el acceso.
 * @return int El resultado de la operación.
 */
function registrarAccesoIP($username):int{
    $tablaUser = cargarTabla();
    $ip_actual = $_SERVER["REMOTE_ADDR"];
    
    if ( key_exists($username,$tablaUser) ){
        $tablaUser[$username]->accesos ++;
        $tablaUser[$username]->ultima_ip = $ip_actual; // ¡Nuevo campo actualizado!
        volcarUsuarios($tablaUser);     
        return true;
    }
    return false;
}

/**
 * Vuelca los datos el array de objetos de usuarios en el fichero, incluyendo la IP.
 * Debe ser modificada para volcar 4 campos en lugar de 3.
 * @param array $tabla El array asociativo de objetos Usuario.
 */
function volcarUsuarios ($tabla){
   $fich = fopen("usuarios.dat","w");
   foreach( $tabla as $usr){
     // Vuelca 4 campos: nombre, clave, accesos, ultima_ip
     $valores = [ $usr->nombre,$usr->clave,$usr->accesos, $usr->ultima_ip ]; 
     fputcsv($fich,$valores);
   }
   fclose($fich);
}


// **Función clave en el controlador (`index.php`) tras acceso válido:**
// registrarAccesoIP($nombre); // Usa la nueva función con IP
// registra($nombre, time()); // Mantiene el registro de desconexión en registro.log
?>