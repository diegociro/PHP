<?php
header('Content-Type: application/json');
$conexion = new mysqli("localhost", "root", "", "biblioteca");

$query = "SELECT * FROM socios";
$resultado = $conexion->query($query);

$socios = [];
while ($fila = $resultado->fetch_assoc()) {
    $socios[] = $fila;
}

echo json_encode($socios);
?>