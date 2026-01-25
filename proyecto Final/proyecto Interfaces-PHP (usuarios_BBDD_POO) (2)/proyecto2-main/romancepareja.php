<?php
require_once "AccesoDatos.php";
require_once 'iniciar_sesion/Auth.php';

$db = AccesoDatos::getModelo();
session_start();
Auth::inactividad();


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; //capturamos el ID del libro que es el que tomamos de referencia

$pareja = $db->getParejaPorId($id);

$libro = $pareja[0]; //auque su posición es 0 el libro siempre será inpar
$peli  = $pareja[1];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['corazon'])) {
    if (!isset($_SESSION['usuario'])) {
    // Si no esta registrado, lo mandamos al login y que vuelva
     $_SESSION['retorno'] = "romancepareja.php?id=" . $id;
        header("Location: iniciar_sesion/login/login.php");
        exit;
    }

    $idfav = (int)$_POST['idfavo']; //aqui sabemos si guardamos la peli o el libro

    $db->guardarFav($_SESSION['usuario'], $idfav);
    header("Location: romancepareja.php?id=" . $id);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_comentario'])) {
    if (!isset($_SESSION['usuario'])) {
        // Si no esta registrado, igual que arriba, lo mandamos al login  que regrese misma pagina. 
        $_SESSION['retorno'] = "romancepareja.php?id=" . $id;
        header("Location: iniciar_sesion/login/login.php");
        exit;
    }

    $user = $_SESSION['usuario']; //sabemos quien pone el comentario
    $valor = (int)$_POST['valoracion']; //con el int forzamos a que sea un número en este caso 1-5
    $coment = htmlspecialchars($_POST['comentario']);
    
    $db->guardarComentario($id, $user, $valor, $coment);
    // Recargamos para limpiar por que si no se nos duplica el comentario
    header("Location: romancepareja.php?id=" . $id);
    exit;
}


$comentExistentes = $db->obtenerComentarios($id); //esto es lo que carga los comentarios en cada pagina
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
      <?php if (!isset($_SESSION['usuario'])): ?>
<a href="iniciar_sesion/login/login.php?redirigir=romancepareja.php?id=<?= $id ?>">Iniciar Sesión</a> 
<!-- de esta manera, inicio sesión pero no me manda al principio del todo si no que me mantiene en la pagina -->     
<?php else: ?>
        <a href="guardados.php">Mis favoritos</a>
    <a href="iniciar_sesion/login/login.php?logout=1">Cerrar Sesión</a><!--metemos un 1 por poner algo para que acceda--> 
      <?php endif; ?>
      <a href="sinopsis.php">Buscar</a>
      <a href="#">Mejor valorados</a>
       <a href="index.php">Menú principal</a>
    </nav>
  </header>
  <div class="flor1">
    <img src="imagenes/ornamento_hojas.png" alt="">
  </div>
  <section class="recomendaciones">

    <!-- Tarjeta 1 -->

       <div class="banner">
            <img src="<?= $libro->imagen; ?>" class="bannerimg" alt="<?= $libro->titulo; ?>">
            <div class="sinopsis">
                <h3><?= $libro->titulo; ?> (<?= $libro->anio; ?>)</h3>
                <p><?= $libro->sinopsis; ?></p>
<div class="contenedor-favorito">
  <form action="" method="POST">
    <input type="hidden" name="idfavo" value="<?= $libro->id; ?>"> 
    <!-- guardamos el id del libro pero sin que lo vea el usuario-->
      <button type="submit" name="corazon" class="favorito">
          <img src="imagenes/corazon.png" alt="Guardar en favoritos">
      </button>
  </form>
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

<div class="contenedor-favorito">
  <form action="" method="POST">
    <input type="hidden" name="idfavo" value="<?= $peli->id; ?>">
        <!-- aqui guardamos el id de la peli igual, oculto al usuario -->
      <button type="submit" name="corazon" class="favorito">
          <img src="imagenes/corazon.png" alt="Guardar en favoritos">
      </button>
  </form>
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
    <img src="imagenes/pelicula.png" alt="">
  </div>
    <div class="flor3">
    <img src="imagenes/ornamento_hojas.png" alt="">
  </div>
<!-- comprobar div-->
  </div>

    <div class="flor1">
    <img src="imagenes/pelicula.png" alt="">
  </div>

<section class="comentarios">
  <section class="seccionreseñas">
    <h2>Opiniones de la comunidad</h2>
    
    <div class="header_reseñas">
        <h3>Deja tu valoración</h3>
        <form action="" method="POST">
            <label>Puntuación:</label>
            <select name="valoracion" required>
                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                <option value="4">⭐⭐⭐⭐ (4)</option>
                <option value="3">⭐⭐⭐ (3)</option>
                <option value="2">⭐⭐ (2)</option>
                <option value="1">⭐ (1)</option>
            </select>
            <br><br>
            <textarea class="areaAcomentar" name="comentario" placeholder="Escribe aquí tu opinión..." required></textarea>
            <br>
            <button type="submit" name="enviar_comentario" class="opinion">PUBLICAR COMENTARIO</button>
        </form>
    </div>

    <hr>

    <div class="lista_comentarios">
        <?php if (count($comentExistentes) > 0): ?> <!-- que haya almenos un comentario-->
     <?php foreach ($comentExistentes as $c): ?>
    <div class="reviewusuario">
     <div class="reviewusuario2">
     <h4><?php echo htmlspecialchars($c->usuario); ?></h4> 
     
<p class="fecha"><?= $c->fechafinal ?></p>                    
</div>
<p class="estrellas3">
    <?php 
    for ($i = 0; $i < $c->valoracion; $i++) {
        echo "⭐";
    }
    ?>
</p>  

          <p class="comentarioUsuario"><?php echo htmlspecialchars($c->texto); ?></p> 
       </div>
      <?php endforeach; ?>
        <?php else: ?>
            <p style="padding: 20px;">Se el primero en dar tu opinión</p>
        <?php endif; ?>
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

      menu.addEventListener('mouseleave', () => {
    menu.classList.remove('menu-active');
  });
  </script>
</body>
</html>
