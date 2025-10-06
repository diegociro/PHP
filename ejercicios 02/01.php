<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>
    <?php

function elMayor(int $a, int $b, int &$c) {//el &se pone por que este valor se va a modificar, 
                                           // si no se copia el valor en vez de modificarlo.  
    if ($a > $b) {
        $c = $a;
    } else if ($b > $a) {
        $c = $b;
    } else {
        $c = 0;
    }
}


?>
</body>
</html>