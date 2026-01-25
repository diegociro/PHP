<?php
session_start();

require_once 'modelo/Hotel.php';
require_once 'modelo/AccesoDatos.php';
require_once 'tools.php';

$ciudad = $_GET['ciudad'];

$bd = AccesoDatos::initModelo();

if (isset($_GET['ciudad']) && !empty(trim($_GET['ciudad']))) {
$nuevabusqueda = $_GET['ciudad'];

$ciudad = $bd->getCiudad($nuevabusqueda);
}
include_once('listado.php');


//if ( $ciudad == "Madrid") {
       // include 'vistas/listado.php';
   // } else {
    //    include 'vistas/error.php';
   // }

   function Hoteles(){
    $hotel = new Hotel();
    $hotel->nombre  = "";
    $hotel->ciudad   = "";
    $hotel->categoria   = "";
    $hotel->precio_noche = "";
    include_once "listado.php";
}


