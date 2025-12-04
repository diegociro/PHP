<?php

include "dat/Cliente.php";

/**
 *  Lee el fichero de clientes y lo carga en un Array de objetos clientes
 *  @return array - tabla asociativa con clave dni.
 */

function cargarTablaClientes (): array {
    $file = fopen ('dat/clientes.csv', 'r');
    $tclientes = [];
    while ($valores = fgetcsv($file)){
        $user = new Cliente($valores[0], $valores[1], $valores[2], $valores[3],);
        $tclientes[$valores[0]]= $user;
    }
    fclose($file);
    return $tclientes;

}

/**
 * Escribe la tabla de objectos clientes en el fichero csv
 * @param  $tabla - array de objectos
 */

function salvarTablaClientes(array $tabla){

    $fich = fopen('dat/clientes.csv','w');
    foreach($tabla as $user){
        $valores =[$user->dni, $user->nombre, $user->clave,$user->puntos];//aqui la clave era $user->clasehash, ya que está encriptada
        fputcsv($fich,$valores);
    }
    fclose($fich);
}


/**
 * Valida usuario y contraseña contra clientes.csv
 * @param string $dni DNI del cliente
 * @param string $clave Contraseña en texto plano
 * @return true Si el usuario y la contraseña son correctas
 */
function validarCliente($dni, $clave) :bool{
    
    $tablacli = cargarTablaClientes();
    
    if (key_exists($dni,$tablacli) &&
    password_verify($clave, $tablacli[$dni]->clave)){
        return true;
    }

    return false;
}

/**
 * Anota los puntos logrados en la última partida 
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
 * @return true si han anotado los datos
*/
function anotarPuntos($dni,$puntos): bool {
    $tablaCli = cargarTablaClientes();
    if (key_exists($dni,$tablaCli)){
        $tablaCli[$dni]->$puntos ++;
        salvarTablaClientes($tablaCli);
        return true;
    }
    

    return false;
}


