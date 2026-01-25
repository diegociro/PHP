<?php
require_once "AccesoDatos.php";
require_once 'iniciar_sesion/Auth.php';

$db = AccesoDatos::getModelo();

session_start();
Auth::inactividad();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos_peliculas.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Goudy+Bookletter+1911&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
    <div id="titulo">
        <p>Descubre por géneros...</p>
    </div>
     <!-- menu despleglable -->
    <button class="hamburguesa" id="hamburguesa">
      ☰
    </button>
    <nav class="menu" id="menu">
      <?php if (!isset($_SESSION['usuario'])): ?>
      <a href="iniciar_sesion/login/login.php">Iniciar Sesión</a>
      <?php else: ?>
        <a href="guardados.php">Mis favoritos</a>
    <a href="iniciar_sesion/login/login.php?logout=1">Cerrar Sesión</a><!--metemos un 1 por poner algo para que acceda--> 
      <?php endif; ?>
      <a href="sinopsis.html">Buscar</a>
      <a href="#mejor_valorados">Recomendaciones</a>
    </nav>
    </nav>

    <section>
    <div class="generos">
        <?php foreach ($db->getGeneros('Peli') as $genero): ?>
            <a class="enlaces" href="<?= $genero->tipo; ?>.php">
                <div class="cuadrado">
                    <img src="<?= $genero->imagen; ?>" alt="<?= $genero->tipo; ?>">
                    <p><?= $genero->tipo; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>
      
 <footer class="footer">
  <div class="footercontenedor">
    <div class="footerlogo">
      <img src="imagenes/diseno-de-logo.png" alt="Logo by Diego Ciro & Luz Bietti" class="logo" />
      <p class="nosotros">BY DIEGO<br>CIRO &<br>LUZ BIETTI</p>
    </div>

    <div class="footerseccion">
      <p>IES Tetuán de las victorias<br>
        Tel 999 999 999<br>
        <a>email@gmail.com</a>
      </p>
    </div>
  </div>

  <div class="footerbottom">
    <div class="social">
      <p>Redes Sociales</p>
      <div class="iconos">
        <a href="#"><img src="imagenes/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="imagenes/instagram.png" alt="Instagram"></a>
          <a href="#"><img src="imagenes/linkedin.png" alt="Instagram"></a>
      </div>
    </div>
  </div>
</footer>

  <script>
    // interaccion del menu hamburguesa
    const hamburger = document.getElementById('hamburguesa');
    const menu = document.getElementById('menu');

    hamburger.addEventListener('click', () => {
      menu.classList.toggle('menu-active');
    });

    // Detecta cuando el ratón sale del área del menú
menu.addEventListener('mouseleave', () => {
    menu.classList.remove('menu-active');
});
  </script>

</body>
</html>