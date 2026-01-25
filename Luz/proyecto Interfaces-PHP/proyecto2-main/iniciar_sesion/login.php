<?php
session_start();
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
    <a id="volvermenu" href="../index.php"><img src="../imagenes/flecha-izquierda.png" alt=""></a>
    <div class="grid">
        <div class="fondo_verde">
            <h1>Inicie sesión en su cuenta</h1>

            <?php
            // si el usuario no es válido salta mensaje de error
            if (isset($_GET['error'])) {
             echo "<p style='color:red'>Usuario o contraseña incorrectos</p>";
            }
            ?>

            <form action="procesar_login.php" method="post">
            <div class="inputs">
                <div>
                   <input name="usuario" type="text" placeholder="Usuario">
                </div>
                <div>
                    <input name="password" type="password" placeholder="Contraseña" name="" id="">
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
                    <p> O inicie sesión con </p> 
               </div>
               <div>
                    <hr>
               </div>
            </div>
            <div class="imagenes">
                <div>
                    <a href="https://www.facebook.com/?locale=es_ES"><img src="../imagenes/facenook.webp" alt=""></a>
                </div>
                <div>
                    <a href="https://mail.google.com/mail/u/0/?pli=1#inbox"><img src="../imagenes/email.png" alt=""></a>
                </div>
                <div>
                <img src="../imagenes/manzana.png" alt="">
                </div>
            </div>
            <div class="no"><a href="">No tengo cuenta</a></div>
    </div>
    </div>
</body>
</html>