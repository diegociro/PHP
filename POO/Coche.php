<?php

class Coche {
    private $matricula;
    protected $precio;
    public  $estado;

    function _construct(string $matricula){
        $this -> matricula = $matricula; 
        $this -> precio = 0;
        $this -> estado = false;
    }

    function _toString(){
        return "INFO: ".$this->matriculo.": ".$this->precio;
    }

    function fijaprecio (int $precionuevo) {
        $this -> precio = $precionuevo;
    }

    function mostrarinfo():string{
        return $this -> matricula.". ".$this-> precio; 
    }
}

$c1 = new Coche("34932XRS");
$c1 -> estado = false;
$c1 -> fijaprecio(4000);
echo  "\n" .$c1 ->mostrarinfo();
unset($c1);
echo  "\n fin de programa";


echo $c1;


?>