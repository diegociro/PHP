<?php
define('PI', 3.14);
$num=12;

function incrementa (int & valor) {
    //& se utiliza para que modifique el array, ya que si no lo pones unicamente pasa una copia
    $valor++;
}
function incrementa2 (int & valor) {
    $valor++;
}
incrementa ($num);
echo "1º Prueba ".$num;
incrementa2 ($num);
echo "2º Prueba ".$num;