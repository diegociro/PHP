<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>
<body>
    <?php
function Suma($valor1, $valor2) {
    return $valor1 + $valor2;
}

function Resta($valor1, $valor2) {
    return $valor1 - $valor2;
}

function Multiplicacion($valor1, $valor2) {
    return $valor1 * $valor2;
}

function Division($valor1, $valor2) {
    if ($valor2 == 0) {
        return "Error: División por cero";
    }
    return $valor1 / $valor2;
}

function Modulo($valor1, $valor2) {
    if ($valor2 == 0) {
        return "Error: Módulo por cero";
    }
    return $valor1 % $valor2;
}

function Potencia($base, $exponente) {
    if ($exponente < 0) {
        return "Error: El exponente debe ser un número no negativo.";
    }
    
    $resultado = 1;
    for ($i = 0; $i < $exponente; $i++) {
        $resultado *= $base;
    }
    return $resultado;
}
?>
</body>
</html>