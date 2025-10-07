<? php
//recordemos que tenemos que usar o POST o GET, pero si usamos
//REQUEST nos valida ambas formas. 
$tususuarios =[
'pepe' => '1234',
"luis" => "siul",
"Diego" => "coco"
];

if (empty($_REQUEST['Nombre']) || (empty($_REQUEST['clave']))) {
    echo "Faltan parametros "
}

$usuario = $_REQUEST["Nombre"];
$Clave = $_REQUEST["Clave"];

if(key_exists($usuario,$tususuarios) && $tususuarios[$usuario] == $Clave){
    echo "Bienvenido".$usuario;
}else{
    echo "Usuario y contraseña no validos";
}