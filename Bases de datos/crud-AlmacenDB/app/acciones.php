<?php
include_once "Producto.php";

function accionBorrar ($id){    
    $db = AccesoDatos::getModelo();
    $tprod = $db->borrarProducto($id);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function accionAlta(){
    $produ = new Producto();
    $produ->nombre  = "";
    $produ->id   = "";
    $produ->precio   = "";
    $produ->stock = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($id){
    $db = AccesoDatos::getModelo();
    $produ = $db->getUsuario($id);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($id){
    $db = AccesoDatos::getModelo();
    $produ = $db->getUsuario($id);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $produ = new Producto();
    $produ->nombre  = $_POST['nombre'];
    $produ->id   = $_POST['id'];
    $produ->precio   = $_POST['precio'];
    $produ->stock = $_POST['stock'];
    $db = AccesoDatos::getModelo();
    $db->addProducto($produ);
    
}

function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $produ = new Usuario();
    $produ->nombre  = $_POST['nombre'];
    $produ->id   = $_POST['id'];
    $produ->precio  = $_POST['precio'];
    $produ->stock = $_POST['stock'];
    $db = AccesoDatos::getModelo();
    $db->modUsuario($produ);
    
}

