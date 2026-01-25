
<?php

// DATOS DE PRUEBA
$precios = [250, 10, 50, 100, 50, 25, 5, 200, 10, 300, 50];
// Definimos rangos: 'Barato' hasta 20 inclusive, 'Medio' hasta 100, 'Caro' más de 100
$categorias = ['Barato','Medio','Caro'];


$res1 = agruparPorCategoria($precios, $categorias);
$msg1 = print_r($res1,true);

$preciosRandom = generarDatos(1,200,20);
$res2 = agruparPorCategoria($preciosRandom, $categorias);
$msg2 = print_r($res2,true);



/**
 * Agrupa los precios según si son menores o iguales al valor de la categoría
 * En array tiene que estar los datos ORDENADOS de mas baratos a más caros
 * @param array $precios Lista numérica
 * @param array $categorias Array asociativo con los nombre de las categorias
 * @return array Array multidimensional
 */
function agruparPorCategoria($precios, $categorias): array {
    $resultado = [];
    sort($precios);
    foreach($precios as $valor){
        if ( $valor <= 20){
            $resultado[$categorias[0]][] = $valor;
        } else if ( $valor <= 100){
            $resultado[$categorias[1]][] = $valor;
        } else {
            $resultado[$categorias[2]][] = $valor;
        }
        
    }
    return $resultado;
}

function generarDatos($min,$max, $nunelementos): array {
    $resultado = [];
    for ( $i=1; $i < $nunelementos; $i++){
        $resultado[] = random_int($min,$max);

    }
    return $resultado;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de Array</title>
</head>
<body>
    <pre>
     <?= $msg1 ?>
    </pre><br>
    <pre>
     <?= $msg2 ?>
    </pre><br>
</body>
</html>