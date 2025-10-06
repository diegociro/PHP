<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej05</title>
</head>
<body>
    <?php
function generarHTMLTable($filas, $columnas, $borde, $contenido) {
    $html = '<table border="' . generar2($borde) . '">';

    for ($i = 0; $i < $filas; $i++) {
        $html .= '<tr>';

        for ($j = 0; $j < $columnas; $j++) {
            $html .= '<td>' . generar2($contenido) . '</td>';
        }

        $html .= '</tr>'; 
    }

    $html .= '</table>';

    return $html;
}
?>
<?php

$Tabla = generarHTMLTable(5, 4, 2, 'Diego');

echo $Tabla;
?>
</body>
</html>