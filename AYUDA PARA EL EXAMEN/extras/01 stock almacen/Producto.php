<!-- Desarrolla una aplicación para gestionar el inventario de un almacén. 
Los datos de los productos deben persistir en un archivo CSV. 
La aplicación debe permitir cargar los productos, actualizar el stock (entrada/salida), 
y registrar la fecha/hora de la última modificación en el archivo de datos. -->


<?php
class Producto {
    // Código, Nombre, Stock actual, Timestamp de última modificación
    function __construct (private $codigo, private $nombre, private $stock, private $ult_modificacion ){
    }

    // Método mágico para leer propiedades privadas
    function __get($nombre){
        if (property_exists($this, $nombre)){
            return $this -> $nombre;
        }
    }

    // Método mágico para escribir en propiedades privadas
    function __set($name, $value){
        if (property_exists($this, $name)){
            $this -> $name = $value; 
        }
    }
}
?>