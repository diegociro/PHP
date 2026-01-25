<?php 

class Hotel {
   private $cod_hotel;
   private $ciudad;
   private $nombre;
   private $categoria;
   private $precio_noche;
   private $habitaciones_disponibles;

    
    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    // Setter con método mágico
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }

}