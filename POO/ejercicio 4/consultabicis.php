<?php

define ('FICHERO_BICIS', 'Bicis.csv');
require_once "BiciElectrica.php";

// cargarbicis – Carga la tabla de bicis disponibles

function cargarbicis (): array {

    $fich = @fopen(FICHERO_BICIS, 'r');
    if ($fich == false) {
        die("Error al abrir el fichero");
    }

    $tabla = [];

    while ($datosbici = fgetcsv($fich)){
        $bici = new BiciElectrica($datosbici[0], $datosbici[1], $datosbici[2], $datosbici[3], $datosbici[4]);

        $tabla[] = $bici;
    }


    return $tabla;
}

// mostrartablabicis – devuelve una cadena con la tabla html de bicis operativas

function mostrarTablaBicis ($tabla): string {
    $cadena = "<table><tr><th>Id</th><th>Coord X</th><th>Cood Y</th><th>Bateria</th></tr>";
    foreach ($tabla as $bici) {
        if ($bici->operativa == 1) {
            $cadena .= "<tr>";
            $cadena .= "<td>" . $bici->id . "</td>";
            $cadena .= "<td>" . $bici->coordx . "</td>";
            $cadena .= "<td>" . $bici->coordy . "</td>";
            $cadena .= "<td>" . $bici->bateria . "%</td>";
            $cadena .= "</tr>";
        }
    }
    $cadena .="</table>";

    return $cadena;
}


// bicimascercana – Devuelve la bici con menor distancia a las coordenadas de usuario.

function biciMasCercana ($x,$y,$tabla):mixed {

    $bicimin = null;
    $distanciamin = PHP_INT_MAX;

    foreach ($tabla as $bici){
        if ($bici ->operativa == 1){
        $distancia = $bici->distancia($x,$y);
        if ($distancia < $distanciamin) {
            $bicimin = $bici;
            $distanciamin = $distancia;
        }
    }
    }

    return $bicimin;
}


$tabla = cargarbicis();


// Programa principal
if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
$biciRecomendada = bicimascercana($_GET['coordx'], $_GET['coordy'], $tabla);
}

?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>MOSTRAR BICIS OPERATIVAS</title>
<style>
table, th, td {
border: 1px solid black;
}
</style>

</head>

<body>
<h1> Listado de bicicletas operativas </h1>
<?= mostrartablabicis($tabla); ?>
<?php if (isset($biciRecomendada)) : ?>
<h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
<button onclick="history.back()"> Volver </button>
<?php else : ?>
<h2> Indicar su ubicación: <h2>
<form>
Coordenada X: <input type="number" name="coordx"><br>
Coordenada Y: <input type="number" name="coordy"><br>
<input type="submit" value=" Consultar ">
</form>
<?php endif ?>
</body>

</html>


