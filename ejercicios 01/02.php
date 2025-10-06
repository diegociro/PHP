<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>
<body>
    <?php
$n1 = random_int(1,9);
echo "el número es: $n1 <br>";
for ($n2=0; $n2 <=$n1; $n2++) {
    for ($n3=1; $n3 <= $n2; $n3++){
        if($n2%2==0) {
          echo '<span style="color: red;">'. $n2 .'</span>';
        }
        else {
            echo '<span style="color: blue;">'. $n2 .'</span>';
        }
    }
    echo "<br>";
}
    ?>
</body>
</html>