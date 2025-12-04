<!-- Implemente un sistema donde la autenticación exitosa (usando usuarios.dat) 
otorga al administrador la capacidad de modificar el estado de un módulo 
(activado/desactivado) registrado en un archivo secundario (modulos.dat). 
Además, debe registrar el número de veces que el usuario accede al sistema. -->

<?php
class Modulo {
    // Nombre, Estado (1=Activo, 0=Inactivo), Ultimo_Admin_Cambio
    function __construct (private $nombre, private $estado, private $admin_modificador ){
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