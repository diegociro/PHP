<?php
define ('SEMANA', time()+7*24*3600);

$edad="";
//conger el css defaultcss de soluciones 5
if (isset($_POST["edad"])) {
        $edad = $_POST["edad"];
        setcookie("edad",$edad, SEMANA); //Las constantes en PHP van sin $
} else {
        if (isset($_COOKIE["edad"])){
                $edad = $_COOKIE["edad"];
        }
}

?>

<html>
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container" style="width: 380px;">
<div id="header">
     <h1>SUS DATOS ALMACENADOS</h1>
</div>
<div id="content">
<fieldset>
<form method="post">
<label>Edad</label> <input type="number" name="edad" value="<?= $edad ?>" ><br>
Género :<br>
        <label> Mujer </label>
        <input type="radio" name="genero" value="Mujer"   >
        <label> Hombre</label>
        <input type="radio" name="genero" value="Hombre"  >
        <br>
<label>Deportes</label><br>
        <select name="deportes[]" multiple="multiple" size="3">
     <option value="Futbol"      >Futbol</option>
     <option value="Tenis"       >Tenis</option>
     <option value="Ciclismo"    >Ciclismo</option>
     <option value="Otro"        >Otro</option>
    </select>
    <br>
    <button name="orden" value="Confirmar"> Almacenar valores </button>
    <button name="orden" value="Eliminar"> Eliminar valores </button>
</form>
</fieldset>
</div>
</div>
</body>
</html>
