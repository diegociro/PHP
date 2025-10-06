<!-- 
 Definir dos variables asignándoles un valor entero 
 aleatorio entre 1 y 10  y mostrar su suma, su resta,
  su división, su multiplicación, módulo y potencia
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>
 <?php
 $n1 = random_int(1,10);
 $n2 = random_int(1,10);

 echo "1º número : <b>$n1</b><br>";
 echo "2º número : <b>$n2</b><br><hr>";


 echo "$n1+$n2 = ".($n1+$n2)."</br>";
 echo "$n1-$n2 = ".($n1-$n2)."</br>";
 echo "$n1*$n2 = ".($n1*$n2)."</br>";
 echo "$n1/$n2 = ".($n1/$n2)."</br>";
 echo "$n1%$n2 = ".($n1%$n2)."</br>";


 $resu = 1;
 for ( $i=1; $i <=$n2; $i++){
    $resu = $resu * $n1;
 }

 echo "$n1**$n2 = ".$resu."</br>"

 

 ?>   
</body>
</html>