<?php

class Usuario {
    function __construct (private $nombre, private $clave, private $accesos ){

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