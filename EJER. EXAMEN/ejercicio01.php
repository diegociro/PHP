<?php
session_start();

define('CUENTAFICHERO', 'misaldo.txt');

// NO está definido el token
if (!isset($_SESSION['token'])) {
header('Location: acceso.php?msg=Error+de+acceso 1');
exit();
} 

if ($_SESSION['token'] != $_POST['token']) {

    $msg = "Error de acceso";
    header("Location: acceso.php?msg=".urldecode($msg));
    exit();
}

$saldo = file_get_contents(CUENTAFICHERO);
echo $saldo;

if ($_POST['Orden'] == "Ver saldo"){
    $msg = "Su saldo actual es" .$saldo;
    header("Location: acceso.php?msg=".urldecode($msg));
    exit();

}

if (empty($_POST['importe']) || !is_numeric($_POST['importe']) || $_POST['importe'] <=0 ){
        $msg ="Importe Errónero o importe menor de 0";
        header("Location: acceso.php?msg=".urldecode($msg));
    exit();
}

$importe = $_POST['importe'];
if ($_POST['Orden'] == "Ingreso"){
    $saldo = $saldo + $importe;
    file_put_contents(CUENTAFICHERO, $saldo);
    $msg="Operación realizada";
    header("Location: acceso.php?msg=".urldecode($msg));
    exit();

}

if ($_POST['Orden'] == "Reintegro"){
    if ($importe <= $saldo){
    $saldo = $saldo - $importe;
    file_put_contents(CUENTAFICHERO, $saldo);
    $msg="Operación realizada";
    }else{
        $msg="Importe erróneo o importe superior al saldo";
    }
    header("Location: acceso.php?msg=".urldecode($msg));
    exit();
    }
