<?php 
define ('FILEUSER','dat/usuarios.txt');
/**
 * 
 * Compruba que la usuario y la contraseña son correctos consultando
 * el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool
 */
function userOk ( $login, $passwd):bool {
if (!is_readable(FICH_DATOS)) {
    // El directorio donde se crea tiene que tener permisos adecuados
    die("Error al crear el fichero.");
}
    $filearray = file(FICH_DATOS);
    foreach ($filearray as $linea) {
        $partes = explode('|', $linea);
        if ($partes[0] == $login && password_verify($passwd,$partes[1])) {
            
        }
            return true;
        }
    }
    return false;


/**
 *  Actualiza la password de un usuario en el archivo de datos
 * @param mixed $login
 * @param mixed $passwd
 * @return bool true si el usuarios existe en el fichero
 */
function updatePasswd ($login, $passwd):bool {
    return true;
}


