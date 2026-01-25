<?php
require_once "AccesoDatos.php";

$db = AccesoDatos::getModelo();
$materiales = $db->getMaterialesRand();

session_start();


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film to Read</title>
  <link rel="stylesheet" href="estilos_principal.css">
  <link rel="icon" href="imagenes/logo.png">
</head>
<body>
  <!-- cabecera -->
  <header class="header">
    <div class="capa_gris">
      <div class="header_texto">
        <h1>Film to Read</h1>
        <p>by Luz Bietti & Diego Ciro</p>
      </div>
    </div>
    <!-- menu despleglable -->
    <button class="hamburguesa" id="hamburguesa">
      ☰
    </button>
    <nav class="menu" id="menu">
      <?php if (!isset($_SESSION['usuario'])): ?>
      <a href="iniciar_sesion/login.php">Iniciar Sesión</a>
      <?php else: ?>
        <a href="guardados.html">Mis favoritos</a>
        <a href="iniciar_sesion/logout.php">Cerrar sesión</a>
      <?php endif; ?>
      <a href="sinopsis.php">Buscar</a>
      <a href="#recomendaciones">Recomendaciones</a>
    </nav>
  </header>

  <!-- introduccion -->
  <section class="intro">
  <!-- Si el usuario ingresa aparece mensaje -->
  <!-- hacer el if para el inicio de sesion. si la
   sesion exite, aparece mensaje --> 

    <?php if (isset($_SESSION['usuario'])): ?>
        <h2>Bienvenido <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
    <?php endif; ?>



    <h2>Redescubre...</h2>
    <p>
      Film to Read es una plataforma que facilita la búsqueda de libros y películas,
      sugiriendo títulos relacionados con el material que tú proporciones.
      Te ofreceremos los títulos más destacados con lo que más deseas ver o leer y conocerás mas artistas y autores.
    </p>
  </section>

   <div class="h3">
      <h3>¿Qué es lo que deseas encontrar?</h3>
    </div>
  <!-- opciones -->
<section class="opciones">
   <div><img src="imagenes/ornamento.png" alt=""  class="ornamentos"></div>
    <div class="banners">
      <div class="banner">
        <div class="contenedor_imagen">
          <a href="generos_libros.php"><img src="<?= $db->getImagenPortada('PrincipalN'); ?>" alt="Libros"></a>        
        </div>
        <div class="imagen_texto">
          <a>Quiero leer un libro</a>
        </div>
      </div>

      <div class="banner">
        <div class="contenedor_imagen">
          <a href="generos_peliculas.php"><img src="<?= $db->getImagenPortada('PrincipalP'); ?>" alt="Películas"></a>        
        </div>
        <div class="imagen_texto">
        <a>Quiero ver una película</a>
        </div>
      </div>
    </div>
     <div><img src="imagenes/ornamento2.png" alt="" class="ornamentos"></div>
  </section>
    <div class="h3">
        <h3>Recomendaciones</h3>
      </div>
 <section>
  <div class="usuarios"><p>Los libros y peliculas mejor 
    valorados del año según los usuarios...</p></div>

<div id="recomendaciones" class="mejorvalorados2">
        <?php foreach ($materiales as $mat): ?>
          <?php 

          //ahora segun el ID mostramos si es pelicula y ID-1 para que salda su libro
            $idEnlace = ($mat->id % 2 == 0) ? ($mat->id - 1) : $mat->id; ?>
            <div class="fotosvalorados">
            <a href="romancepareja.php?id=<?= $idEnlace; ?>">
                <img src="<?= $mat->imagen; ?>" alt="<?= $mat->titulo; ?>" style="cursor: pointer;">
        </a>
                <div class="descvalorados">
                    <p><?= $mat->tipo . " - " . $mat->anio; ?></p>
                    <p><strong><?= $mat->titulo; ?></strong></p>
                    <p><?= $mat->autor; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
   <section class="final"> 
      <img src="imagenes/ornamento3.png" alt="">
   </section>

   
<!-- pie de pagina-->

  <footer class="footer">
  <div class="footercontenedor">
    <div class="footerlogo">
      <img src="imagenes/diseno-de-logo.png" alt="Logo by Diego Ciro & Luz Bietti" class="logo" />
      <p class="nosotros">BY DIEGO<br>CIRO &<br>LUZ BIETTI</p>
    </div>

    <div class="footerseccion">
      <h3></h3>
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
  </script>
</body>
</html>
