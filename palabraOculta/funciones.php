<?php 
// array_rand
function elegirPalabra(): string {
    static $tpalabras = ["Madrid","Sevilla","Murcia","Málaga","Mallorca","Menorca"];
    $pos = array_rand($tpalabras);
   // COMPLETAR
   return $tpalabras[$pos];// Devuelve una palabra al azar    
}
// strpos
function comprobarLetra($letra,$cadena): bool {
   // for ($i=0; $i < strlen($cadena); $i++){
     //   if ($letra == $cadena[$i]){
       //     return true;
       // }
   // }
    return (strpos($cadena, $letra) !== false);
        
    //return false; // Devuelve true o false si la letra esta en la cadena  
}


/*
 * Devuelve una cadena donde aparecen las letras de la cadenapalabra en su posición    si cada letra se encuentra en la cadenaletras
 * 
 * Ej  generaPalabraconHuecos("aeiou"     ,"hola pepe") -->"-o-a--e-e"
 *     generaPalabraconHuecos("abcdefghi ","hola pepe") -->"h--a -e-e"
 * 
 */

function generaPalabraconHuecos ( $cadenaletras, $cadenapalabra) {
    
    // Genero una cadena resultado inicialmente con todas las posiciones con -
    $resu = $cadenapalabra;
    for ($i = 0; $i<strlen($resu); $i++){
        $resu[$i] = '-';
    }
    // COMPLETAR rellenado la cadena resu
    
    
    return $resu;
}
?>