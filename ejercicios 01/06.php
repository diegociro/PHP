<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej06</title>
    <div style="background-color: blue;">
        <h1 style="color: white;">TABLA DE MULTIPLICAR</h1>

    </div>
</head>
<body>
    <?php
$n1 = random_int(1,9);

echo "<table border=''><tr><td colspan=2> Tabla del ".$n1;

for ($i=1; $i<=10; $i++) {
echo "<tr><td>".$n1." x ".$i." = ";  
echo "<td>".$n1*$i;
}
    ?>
</body>
</html>



