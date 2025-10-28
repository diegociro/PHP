<?php
session_start();

if(!isset ($_SESSION["cosa"])){
    $_SESSION["cosa"] = 1;

}
echo "Valor: ". $_SESSION["cosa"];
$_SESSION["cosa"]++;
if ($_SESSION["cosa"] == 10){
    session_destroy();
}

//$_SESSION["nombre"] = "Pepito Conejo";
//$_SESSION["contador"] = 1;
//print "<p>Sesion 01 -- El nombre es $_SESSION[nombre]</p>";

