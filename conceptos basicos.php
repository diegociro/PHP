<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //variables
    $edad = 30;
    $estatura = 1.68;
    $nombre = "Diego";
    $frase = "Diego tiene $edad años";
    $frase2 = 'Diego tiene $edad años'; //con comilla simple no leeria las variables
    $profesor = true;

    echo $edad;
    echo "<br>";
    echo $estatura;
    echo "<br>";
    echo "Tu nombre es ". $nombre. "<br>";
    echo json_encode($profesor);
    echo "<br>";
    echo "<br>";



    //Arrays
    $dias = array("lunes","martes","miercoles","jueves");
    $numeros = array(10,20,30,40);
    $nombres = array(10);
    $datos = array();
    $valores = [10,20,30,40]; //esta es la sintaxis corta
    
    echo $dias[3];
    echo "<br>";
    var_dump($dias); //asi nos salen todos los datos del Array
    echo "<br>";
    var_dump($numeros);
    echo "<br>";


    //Arrays asociativos

    $navegadores = array("navegador1" => "Chrome", "navegador2" => "Firefox", "navegador3" => "Safari");
    echo "<br>"; 
    $datos = array("nombre" => "Diego", "edad" => 30, "alumno" => true, 3 => 100 );
    
    echo "Navegador 3:". $navegadores["navegador3"];
    echo "<br>"; 
    echo "Nombre: ".$datos["nombre"];
    var_dump($navegadores);
    echo "<br>";
    ?>
</body>
</html>