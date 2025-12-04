<?php
include_once 'Bug.php';

/**
 * Carga los errores desde 'bugs.dat' y devuelve un array de objetos Bug.
 * Utiliza el ID del bug como clave asociativa.
 * @return array Una tabla asociativa de objetos Bug.
 */
function cargarBugs():array {
    $file = fopen('bugs.dat', 'r');
    $tablaBugs = [];
    while ($valores = fgetcsv($file)) {
        list ($id, $descripcion, $estado, $asignado_a) = $valores;
        $bug = new Bug($id, $descripcion, $estado, $asignado_a);
        $tablaBugs[$id]= $bug;
    }
    fclose($file);
    return $tablaBugs;
}

/**
 * Reasigna un error a un nuevo desarrollador.
 * @param string $id El ID del error.
 * @param string $nuevo_dev El nombre del nuevo desarrollador asignado.
 * @param string $usuario_accion Nombre del usuario que realiza la acción (ej: $_SESSION['nombre']).
 * @return bool True si la reasignación fue exitosa.
 */
function reasignarBug($id, $nuevo_dev, $usuario_accion): bool
{
    $tablaBugs = cargarBugs();
    
    if (key_exists($id, $tablaBugs)) {
        $bug = $tablaBugs[$id];
        $bug->asignado_a = $nuevo_dev; // Actualiza la propiedad
        volcarBugs($tablaBugs);
        registrarAsignacionLog($id, $nuevo_dev, $usuario_accion); // Registra en bitácora
        return true;
    }
    return false;
}

/**
 * Vuelca el array de objetos Bug en el fichero 'bugs.dat'.
 * @param array $tabla El array asociativo de objetos Bug.
 */
function volcarBugs ($tabla){
   $fich = fopen("bugs.dat","w");
   foreach( $tabla as $bug){
     $valores = [ $bug->id, $bug->descripcion, $bug->estado, $bug->asignado_a ];
     fputcsv($fich,$valores);
   }
   fclose($fich);
}

/**
 * Registra la reasignación en un archivo de bitácora 'asignaciones.log'.
 * @param string $id El ID del error reasignado.
 * @param string $nuevo_dev El nuevo desarrollador.
 * @param string $usuario_accion El usuario que hizo la reasignación.
 */
function registrarAsignacionLog($id, $nuevo_dev, $usuario_accion){
    $tiempo = date("d-m-Y H:i:s");
    $linea = "Bug ID: ".$id.", Asignado a: ".$nuevo_dev.", Por: ".$usuario_accion.", Tiempo: ".$tiempo."\n";
    $resu = @file_put_contents("asignaciones.log",$linea,FILE_APPEND); 
    return $resu;
}
?>