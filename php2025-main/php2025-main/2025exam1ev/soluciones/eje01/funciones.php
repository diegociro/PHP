<?php

include "dat/Cliente.php";

/**
 *  Lee el fichero de clientes y lo carga en un Array de objetos clientes
 *  @return array - tabla asociativa con clave dni.
 */

function cargarTablaClientes (): array {

    $tclientes = [];
    $fich = fopen ('dat/clientes.csv','r');

    while ( $datoscli = fgetcsv($fich)){
        list ($dni,$nombre,$clavehash,$puntos) = $datoscli;
        $cli = new Cliente($dni,$nombre,$clavehash,$puntos);
        $tclientes[$dni] = $cli;
    }
    return $tclientes;

}

/**
 * Escribe una tabla de objectos clientes en el fichero csv
 *   
 */

function salvarTablaClientes(array $tabla){

    $fich = fopen('dat/clientes.csv','w');
    foreach ($tabla as $cli){
        $valores = [ $cli->dni, $cli->nombre, $cli->clavehash,$cli->puntos];
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
    
    if ( array_key_exists($dni,$tablacli) && 
        password_verify($clave, $tablacli[$dni]->clavehash)) {
            return true;
        }

    return false;
}

/**
 * Anota los puntos logrados en la última partida 
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
*/
function anotarPuntos($dni,$puntos): bool {
    $tablaCli = cargarTablaClientes();
    if ( key_exists($dni,$tablaCli) ){
        $tablaCli[$dni]->puntos = $puntos;
        salvarTablaClientes($tablaCli);    
        return true;
    }
    return false;
}




