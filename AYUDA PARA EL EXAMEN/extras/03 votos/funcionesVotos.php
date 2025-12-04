<?php
include_once 'Candidato.php';

/**
 * Carga los candidatos desde 'candidatos.dat' y devuelve un array de objetos Candidato.
 * Utiliza el ID del candidato como clave asociativa.
 * @return array Una tabla asociativa de objetos Candidato.
 */
function cargarCandidatos():array {
    $file = fopen('candidatos.dat', 'r');
    $tablaCandidatos = [];
    while ($valores = fgetcsv($file)) {
        list ($id, $nombre, $votos) = $valores;
        $candidato = new Candidato($id, $nombre, $votos);
        $tablaCandidatos[$id]= $candidato;
    }
    fclose($file);
    return $tablaCandidatos;
}

/**
 * Incrementa el contador de votos para un candidato específico.
 * @param string $id El ID del candidato.
 * @return bool True si el candidato existe y el voto fue registrado.
 */
function anotarVoto($id):bool{
    $tablaCandidatos = cargarCandidatos();
    if ( key_exists($id,$tablaCandidatos) ){
        $tablaCandidatos[$id]->votos ++;
        volcarCandidatos($tablaCandidatos);     
        registrarVotoLog($id, time()); // Llama a la función de registro
        return true;
    }
    return false;
}

/**
 * Vuelca el array de objetos Candidato en el fichero 'candidatos.dat'.
 * @param array $tabla El array asociativo de objetos Candidato.
 */
function volcarCandidatos ($tabla){
   $fich = fopen("candidatos.dat","w");
   foreach( $tabla as $cand){
     $valores = [ $cand->id, $cand->nombre, $cand->votos ];
     fputcsv($fich,$valores);
   }
   fclose($fich);
}

/**
 * Registra el voto en un archivo de bitácora 'votos.log'.
 * @param string $id El ID del candidato votado.
 * @param int $time El timestamp del voto.
 */
function registrarVotoLog($id, $time){
    $ip = $_SERVER["REMOTE_ADDR"];
    $tiempo = date("d-m-Y h:i",$time);
    $linea = $ip.", CANDIDATO: ".$id.",".$tiempo."\n";
    // FILE_APPEND para añadir al final del archivo sin sobreescribir
    $resu = @file_put_contents("votos.log",$linea,FILE_APPEND); 
    return $resu;
}
?>