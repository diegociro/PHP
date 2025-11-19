<?php

class Persona2 {
    private $nombre; 
    private $edad;
    private $nota;

    function __construct(string $nombre, int $edad){
        $this -> nombre = $nombre;
        $this -> edad = $edad;
        $this -> nota = 7;



    }

  
    //con el metodo get podemos acceder a los atributos privados como en este caso "nota"
    function __get ($name) {
        if (property_exists($this, $name)) //si existe lo muestras
        $this->$name = $name;
        }

    }


    function __set($name, $value) //si existe lo modificas 
    {
            if (property_exists($this, $name)) //si existe lo muestras
        $this->$name = $value;
        }

//     function __set($name, $value) //si existe lo modificas 
//     {
//         if (property_exists($this, $name)){
//             return $this->$name;
//         if ($name == 'nota'){
//             if($value <= 10){
//                 $this->nota=$value;
//                 $this->$name = $value; ambas formas serian validas
//             } else {
//                 $this->$name = $value;
//             }
//         } else {
//             echo "El atributo ".$name." no está definido";
//         }
//     }
// }

$p = new Persona2("Pepe", 45);

echo $p -> nombre. "\n";
echo $p -> nota. "\n";
$p->nombre= "Pepe Perez";
$p->nota= 10;
$p->nota= 11;

?>