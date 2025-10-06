<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ03</title>
</head>
<body>
    <?php
$numero = random_int(1,9);
   $contEspacios = $numero -1;
   $contAsteriscos = 1;

   
   for($i = 1; $i <=$numero;$i++){
       for($j = 1; $j<=$contEspacios; $j++){
           echo "&nbsp"; // Caracter espacio en HTML
       }
       for($k = 1; $k<=$contAsteriscos;$k++){
           echo "*";
       }
       $contAsteriscos +=2;
       $contEspacios--;
       echo "<br/>";
       
   }
    ?>
</body>
</html>