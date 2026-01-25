<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
    <link rel="stylesheet" href="estilos_sinopsis.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Goudy+Bookletter+1911&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
   <header>
        <div>
            <p class="intro">Busque la pelicula o libro el cual desea buscar una obra que se asemeje y le econtraremos uno
            cuya trama sea similar...</p>
        </div>
        <div id="buscar">
            <div id="buscarinput"><input type="text" placeholder="Introducir obra">
            </div>
             <div id="boton"><button> Buscar </button></div> 
            <div class="imagen"><video autoplay muted loop src="imagenes/video.mp4" alt=""></div>
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
          <a href="index.php">Menú principal</a>
          <a href="#mejor_valorados">Recomendaciones</a>
        <!-- </nav>
        <a href="iniciar.html">Iniciar Sesión</a>
        <a href="guardados.html">Mis favoritos</a>
        <a href="index.php">Menú principal</a>
        <a href="index.php#recomendaciones">Recomendaciones</a>
        </nav> -->
    </header>
    
    <div><p id="resultados">Descubre libros y peliculas...</p></div>
    <section class="fondobanners">
        <div class="fondo">
            <div class="banners"><img src="imagenes/angel.jpg" alt=""></div>
            <div class="banners"><img src="imagenes/asistenta.jpg" alt=""></div>
            <div class="banners"><img src="imagenes/corazonvivo.jpg" alt=""></div>
            <div class="banners"><img src="imagenes/cronica.jpg" alt=""></div>
        </div>

    <!--
    </section>
 <div><p id="resultados">Peliculas recomendadas...</p></div>
    <section class="fondobanners">
        <div class="fondo">
            <div class="banners"><img src="imagenes/El_efecto_mariposa-524611973-mmed.jpg" alt=""></div>
            <div class="banners"><img src="imagenes/little_women.jpg" alt=""></div>
            <div class="banners"><img src="imagenes/peliculas-romanticas-uestion-de-tiempo.jpg" alt=""></div>
            <div class="banners"><img src="imagenes/nacido.jpg" alt=""></div>
        </div>
    </section> -->




<section class="final"> 
      <img src="imagenes/ornamento3.png" alt="">
   </section>
   

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