<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej04</title>
</head>
<body>
    <?php

define("valores", 50);
define("maximo", 100);
$numeros = [];
for ($i = 0; $i < valores; $i++) {
    $numeros[] = random_int (1, maximo);
}
$Max = max($numeros);
$Min = min($numeros);
$media = (array_sum($numeros) / valores, 2);
?>

<table>
    <caption>Generación de 50 valores aleatorios</caption>
    <thead>
        <tr>
            <th>Estadística</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Mínimo</td>
            <td><?php echo $valorMinimo; ?></td>
        </tr>
        <tr>
            <td>Máximo</td>
            <td><?php echo $valorMaximo; ?></td>
        </tr>
        <tr>
            <td>Media</td>
            <td><?php echo $media; ?></td>
        </tr>
    </tbody>
</table>


</body>
</html>