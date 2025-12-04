<?php
include_once 'Tarea.php';

/**
 * Carga las tareas desde 'tareas.dat' y devuelve un array de objetos Tarea.
 * Utiliza el ID de la tarea como clave asociativa.
 * @return array Una tabla asociativa de objetos Tarea.
 */
function cargarTareas():array {
    $file = fopen('tareas.dat', 'r');
    $tablaTareas = [];
    while ($valores = fgetcsv($file)) {
        list ($id, $descripcion, $estado, $fecha_estado_cambio) = $valores;
        $tarea = new Tarea($id, $descripcion, $estado, $fecha_estado_cambio);
        $tablaTareas[$id]= $tarea;
    }
    fclose($file);
    return $tablaTareas;
}

/**
 * Marca una tarea como completada (estado 'C') si actualmente está Pendiente ('P').
 * @param string $id El ID de la tarea a modificar.
 * @return bool True si el estado fue cambiado, false si no existe o ya está completada.
 */
function marcarComoCompletada($id): bool
{
    $tablaTareas = cargarTareas();
    
    if (key_exists($id, $tablaTareas)) {
        $tarea = $tablaTareas[$id];
        
        if ($tarea->estado === 'P') {
            $tarea->estado = 'C';
            $tarea->fecha_estado_cambio = date("d-m-Y H:i:s"); // Nuevo formato de fecha
            volcarTareas($tablaTareas);
            return true;
        }
    }
    return false;
}

/**
 * Vuelca el array de objetos Tarea en el fichero 'tareas.dat'.
 * @param array $tabla El array asociativo de objetos Tarea.
 */
function volcarTareas ($tabla){
   $fich = fopen("tareas.dat","w");
   foreach( $tabla as $tar){
     // Prepara el array para fputcsv
     $valores = [ $tar->id, $tar->descripcion, $tar->estado, $tar->fecha_estado_cambio ];
     fputcsv($fich,$valores);
   }
   fclose($fich);
}
?>