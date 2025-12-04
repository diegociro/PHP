<!-- Desarrolla un sistema simple para gestionar el seguimiento de errores (bugs). 
Cada error tiene un ID, una descripción, un estado, y el nombre del desarrollador al que está asignado. 
Se utiliza un archivo de datos (bugs.dat). 
La aplicación debe permitir reasignar un error a un nuevo desarrollador y llevar un registro 
(asignaciones.log) de quién realizó la reasignación. Se asume que el usuario está autenticado (similar a index.php). -->

<?php
class Bug {
    // Id, Descripcion, Estado (Abierto/Cerrado), Desarrollador asignado
    function __construct (private $id, private $descripcion, private $estado, private $asignado_a ){
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