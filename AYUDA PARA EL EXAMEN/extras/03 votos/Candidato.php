<!-- Implementa un sistema de votación para tres candidatos. 
Cada candidato tiene un ID, nombre y un contador de votos. 
Una vez que un usuario vota (a través del formulario),
no puede volver a votar durante la misma sesión de navegador (similar al control de caducidad). 
Los resultados de los votos se almacenan en un archivo y se registra cada voto emitido en un archivo de bitácora (votos.log). -->


<?php
class Candidato {
    // Id, Nombre, Contador de votos
    function __construct (private $id, private $nombre, private $votos ){
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