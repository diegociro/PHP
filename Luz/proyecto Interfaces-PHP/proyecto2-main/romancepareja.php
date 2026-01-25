<?php
require_once "AccesoDatos.php";
$db = AccesoDatos::getModelo();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;; //capturamos el ID del libro que es el que tomamos de referencia

$pareja = $db->getParejaPorId($id);

$libro = $pareja[0]; //auque su posición es 0 el libro siempre será inpar
$peli  = $pareja[1];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $libro->titulo; ?> - Recomendación</title>  
<link rel="stylesheet" href="estilos_vermas.css">
</head>
<body>
  <div class="principal">
     <button class="hamburguesa" id="hamburguesa">
      ☰
    </button>
    <nav class="menu" id="menu">
      <a href="iniciar.html">Iniciar Sesión</a>
      <a href="guardados.html">Mis favoritos</a>
      <a href="sinopsis.html">Buscar</a>
      <a href="#">Mejor valorados</a>
       <a href="index.php">Menú principal</a>
    </nav>
  </header>
  <div class="flor1">
    <img src="imagenes/flor1.png" alt="">
  </div>
  <section class="recomendaciones">

    <!-- Tarjeta 1 -->

       <div class="banner">
            <img src="<?= $libro->imagen; ?>" class="bannerimg" alt="<?= $libro->titulo; ?>">
            <div class="sinopsis">
                <h3><?= $libro->titulo; ?> (<?= $libro->anio; ?>)</h3>
                <p><?= $libro->sinopsis; ?></p>
        <div class="iconos">
          <img src="imagenes/guardar-instagram.png">
          <img src="imagenes/corazon.png">
        </div>

        <p class="comtext">¿Dónde conseguirlo?</p>
        <div class="logos">
          <img src="imagenes/Amazon-logo2.png">
          <img src="imagenes/unnamed.png" >
        </div>
      </div>
    </div>
    
    <!-- Tarjeta 2 -->
<div class="banner">
  <img src="<?= $peli->imagen; ?>" class="bannerimg" alt="<?= $peli->titulo; ?>">
      <div class="sinopsis">
       <h3><?= $peli->titulo; ?> (<?= $peli->anio; ?>)</h3>
          <p><?= $peli->sinopsis; ?></p>

                <div class="iconos">
          <img src="imagenes/guardar-instagram.png">
          <img src="imagenes/corazon.png">
        </div>

        <p class="comtext">¿Dónde verla?</p>
        <div class="logos">
          <img src="imagenes/prime.png">
          <img src="imagenes/netflix.png" >
        </div>
      </div>
    </div>

  </section>
  <div class="flor2">
    <img src="imagenes/flor1.png" alt="">
  </div>
    <div class="flor3">
    <img src="imagenes/flor1.png" alt="">
  </div>
<!-- comprobar div-->
  </div>

    <div class="flor1">
    <img src="imagenes/flor1.png" alt="">
  </div>

<section class="comentarios">
  <section class="seccionreseñas">
    <div class="header_reseñas">
      <div class="estrellas1">
        ⭐⭐⭐⭐⭐ <span>(27) comentarios</span>
      </div>
      <div class="rating">
        <h1>5<span>/5</span></h1>
        <button class="opinion">DEJAR MI OPINIÓN</button>
      </div>

      <div class="rating_estrellas">
        <p>⭐⭐⭐⭐⭐ <span>(24)</span></p>
        <p>⭐⭐⭐⭐ <span>(1)</span></p>
        <p>⭐⭐⭐ <span>(2)</span></p>
        <p>⭐⭐ <span>(0)</span></p>
        <p>⭐ <span>(0)</span></p>
      </div>
    </div>

    <hr>

    <div class="filtro">
      <p>Ordenar por:</p>
      <div class="filtrobotones">
        <button>Más recientes</button>
        <button>Más valoradas</button>
      </div>
      <p class="total">27 opiniones de usuarios</p>
    </div>

    <div class="reviewusuario">
      <div class="reviewusuario2">
        <h4>Ana Perez</h4>
        <p class="fecha">12/10/2025</p>
      </div>
      <p class="estrellas3">⭐⭐⭐⭐⭐</p>
    </div>

    <div class="reviewusuario">
      <div class="reviewusuario2">
        <h4>Carlos</h4>
        <p class="fecha">12/10/2025</p>
      </div>
      <p class="estrellas3">⭐⭐⭐⭐⭐</p>

    </div>
  </section>
</section>
<!--
<section> 
  <div class="usuarios"><p>Más titulos similares...</p></div>
          <div class="mejorvalorados2">
              <div class="fotosvalorados"><img src="imagenes/estrellas.png" alt="">
                <div class="descvalorados">
                </div>
              </div>
              <div class="fotosvalorados"><img src="imagenes/finmundo.jpg" alt="">
                <div class="descvalorados">
                   <p>Canto yo y la montaña</p>
                  <p>Genero: Novela polifónica</p>
                   
                </div>
              </div> 
              <div class="fotosvalorados"><img src="imagenes/nuestrolugar.jpg" alt="">
              <div class="descvalorados">
                   <p>Expiación, deseo y pecado</p>
                  <p>Genero: Romance/Bélico</p>
                  
                </div>
              </div>
              <div class="fotosvalorados"><img src="imagenes/artenosotros.jpg" alt="">
              <div class="descvalorados">
                  <p>El Buen Nombre</p>
                  <p>Genero: Novela</p>
              
                </div>
              </div>
          </div>   
</section> 
 -->
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
