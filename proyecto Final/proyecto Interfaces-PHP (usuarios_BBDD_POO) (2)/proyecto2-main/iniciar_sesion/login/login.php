<?php
session_start();

require_once '../../config.php';
require_once '../Usuario.php';
require_once '../Auth.php';
require_once '../../AccesoDatos.php';

if (isset($_GET['logout'])) {
    Auth::logout();
}

if (isset($_GET['redirigir'])) {
    $_SESSION['retorno'] = $_GET['redirigir'];
}

$error = "";

if ($_POST) {
    $usuario = new Usuario();
    $user = $usuario->login($_POST['usuario'], $_POST['password']);

    if ($user) {
        Auth::iniciarSesion($user); 

       if (isset($_SESSION['retorno'])) {
            $destino = $_SESSION['retorno']; //donde vamos a regresar
            unset($_SESSION['retorno']); // Limpiamos para que no ocurra siempre

            header("Location: ../../" . $destino);
            exit;
        } else {

            header('Location: ../../index.php'); //por defecto nos manda al index
        }
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
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
    <a id="volvermenu" href="../../index.php"><img src="../../imagenes/flecha-izquierda.png" alt=""></a>
    <div class="grid">
        <div class="fondo_verde">
            <h1>Inicie sesión en su cuenta</h1>

            <?php
            // si el usuario no es válido salta mensaje de error
            if ($error) {
              echo "<p style='color:red'>$error</p>";
            }
            ?>

            <form action="" method="post">
            <div class="inputs">
                <div>
                   <input name="usuario" type="text" placeholder="Usuario" required>
                </div>
                <div>
                    <input name="password" type="password" placeholder="Contraseña" name="" id="" required>
                </div>
            </div>
            <div class="checkbox">
                <div>
                    <input type="checkbox"><label for=""> Recordarme</label>
                </div>
                <div>
                    <a id="enlace" href="">¿Olvidó su contraseña?</a>
                </div>
            </div>
            <div class="boton">
                <button id="boton" type="submit">Entrar</button>
            </div>
            </form>
            <div class="iniciecon">  
               <div>
                    <hr>
               </div>   
               <div>
                    <p> ¿Aún no tienes cuenta? </p> 
               </div>
               <div>
                    <hr>
               </div>
            </div>

            <div class="no"><a href="registro.php">No tengo cuenta</a></div>
    </div>
    </div>
</body>
</html>