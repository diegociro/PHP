<?php 
/**
 *  Genera una cadena con tantos asteriscos como indique el parámetro
 * @param int $num
 * @return string
 */
function verEstrellas( int $num):string {
     foreach ($categoria as $c):

    for ($i = 0; $i < $c ; $i++) {
        echo "⭐";
    }
}
/**
 *  Muestra un mensaje según el valor de plazas, si es menor de 5  devuelve 
 *  la cadena 'Ultimas plazas' y es caso contrario 'Disponibles'
 * @param int $plazas
 * @return string
 */
function verEstado ( int $plazas):string {

if ($plazas > 5){
}
    return $msg;
}

