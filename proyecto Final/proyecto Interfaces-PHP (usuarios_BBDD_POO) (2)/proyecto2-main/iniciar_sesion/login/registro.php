
<?php
require_once '../../config.php';
require_once '../Usuario.php';
require_once '../../AccesoDatos.php';
require_once '../Auth.php';

if ($_POST) {
    $usuario = new Usuario();
    $usuario->registrar($_POST['usuario'], $_POST['email'], $_POST['password']);
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="estilos_iniciar.css">
</head>
<body>
    <a id="volvermenu" href="login.php"><img src="../../imagenes/flecha-izquierda.png" alt=""></a>
    <div class="grid">
        <div class="fondo_verde">
            <h1>Crear cuenta</h1>
            <form action="" method="post">
            <div class="inputs">
                <div>
                   <input name="usuario" type="text" placeholder="Usuario" required>
                </div>
                <div>
                    <input name="email" type="text" placeholder="email" name="" id="" required>
                </div>
                <div>
                    <input name="password" type="password" placeholder="Contraseña" name="" id="" required>
                </div>
                 <div class="botonregistro">
                     <button id="botonregistro" type="submit">Registrarse</button>
                 </div>
            </div>
</div>
                
            </form>
    </div>
    </div>
</body>
</html>