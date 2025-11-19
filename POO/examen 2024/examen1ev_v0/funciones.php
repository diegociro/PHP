<?php

/**
 * Checks if the provided username and password are valid.
 *
 * @param string $username The username to validate.
 * @param string $password The password to validate.
 * @return bool Returns true if the username and password are valid, false otherwise.
 */
function accesoValido($username, $password): bool
{
    // COMPLETAR  +++++++++++++++++++++++++++++++
    $fich = fopen("usuarios.dat", "r");
    $resu = false;
    while($valores = fgetcsv($fich)){
        if ($valores[0] == $username && 
        password_verify($password,$valores[1])){
            $resu = true;
            break;
        }
    }
    fclose($fich);
    return true;
}

/**
 * Records a new access for the given username.
 *
 * @param string $username The username for which to record the access.
 * @return int The result of the access recording operation.
 */
function anotarNuevoAcceso($username):int{

     // COMPLETAR  +++++++++++++++++++++++++++++++
     $ip = $_SERVER["REMOTE_ADDR"]; //Esto es por que voy a tomar la IP remota, de quien se conecte
     $nombre = $username;
     $tiempo = date("d-m-Y h:i");
     $linea = $ip.",".$nombre.",".$tiempo."\n";
     file_put_contents("registro.log",$linea, FILE_APPEND); //Este ultimo es para que no machaque los datos si no que los acumule
    return 0;
}

/**
 * Registers a user with a given username and time.
 *
 * @param string $username The username of the user to register.
 * @param int $time The time associated with the registration.
 */
function registra($username,$time){
     // COMPLETAR  +++++++++++++++++++++++++++++++
    return;
}
