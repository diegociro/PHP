<!-- Crea una aplicación para gestionar tareas. 
Cada tarea tiene un ID, una descripción, un estado (P pendiente o C completado)
 y la fecha de su última modificación de estado. 
 El usuario enviará un formulario para marcar una tarea como completada. -->

<?php
class Tarea {
    // Id, Descripcion, Estado (P/C), Fecha de cambio de estado
    function __construct (private $id, private $descripcion, private $estado, private $fecha_estado_cambio ){
    }

    function __get($nombre){
        if (property_exists($this, $nombre)){
            return $this -> $nombre;
        }
    }

    function __set($name, $value){
        if (property_exists($this, $name)){
            $this -> $name = $value; 
        }
    }
}
?>