<?php

class BiciElectrica {

// private $id; // Identificador de la bicicleta (entero) para comentar todo es seleccionar todo, CTRL+K+C
// private $coordx; // Coordenada X (entero)
// private $coordy; // Coordenada Y (entero)
// private $bateria; // Carga de la batería en tanto por ciento (entero)
// private $operativa; // Estado de la bicleta ( true operativa- false no disponible)

//crea el constructor

function __construct(private $id, private $coordx, private $coordy, private $bateria, private $operativa ) { //si los ponemos así no hace falta tenerlos como arriba
}


// setter y guetter mediante métodos magicos

function __get($name){
    if (property_exists($this,$name)){
        return $this->$name; //si no ponemos el $ con name buscaria el atributo name, pero nosotros queremos el contenido de name.
    }
}

function __set($name, $value){
    if (property_exists($this,$name)){
         $this->$name = $value;
    }
}


//ahora hacemos el metodo ToString 

function __toString() {
    return $this-> id." :". $this -> bateria;
}

/**
 * Devuelve la distancia entre la bicicleta y las coordenadas x e y 
 */

function distancia($x, $y): int {
    $disx = $x - $this ->coordx;
    $disy = $y - $this ->coordy;
    return intval ((sqrt ($disx*$disx)+($disy*$disy)));

}
}



?>