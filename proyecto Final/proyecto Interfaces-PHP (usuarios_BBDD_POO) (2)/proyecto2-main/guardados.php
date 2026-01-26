<?php
require_once 'config.php';
require_once 'iniciar_sesion/Auth.php';
require_once 'AccesoDatos.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start(); //la sesion tiene que arrancarse antes de nada
}
Auth::inactividad();

$db = AccesoDatos::getModelo();
$misFavoritos = $db->mostrarFav($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_guardados.css">
    <title>Guardados</title>
</head>
<body>
     <!-- menu despleglable -->
    <button class="hamburguesa" id="hamburguesa">
      ☰
    </button>
    <nav class="menu" id="menu">
     
      <a href="index.php">Menú principal</a>
      <a href="sinopsis.php">Buscar</a>
      <a href="index.php#mejor_valorados">Mejor valorados</a>
    </nav>

    <section>
        <h1>Los favoritos de <?php echo htmlspecialchars($_SESSION['usuario']) ?></h1>
    </section>

    <section>
        <div class="mejorvalorados2">
     <?php if (count($misFavoritos) > 0): ?> <!-- Comprobamos que haya al menos uno  -->
         <?php foreach ($misFavoritos as $favi): ?>
        <div class="fotosvalorados">
      <a href="romancepareja.php?id=<?= $favi->id ?>"> <!-- así la imagen mandará a la pagina de la relacion -->
      <img src="<?= $favi->imagen ?>" alt="<?= $favi->titulo ?>">
     </a>
<div class="descvalorados">
    <p><?= $favi->tipo . " - " . $favi->anio; ?></p>
    <p><strong><?= $favi->titulo; ?></strong></p>
    <p><?= $favi->autor; ?></p>
</div>
     </div>
   <?php endforeach; ?>
            <?php else: ?>
                <p style="padding: 20px;">Aún no has guardado nada.</p>
            <?php endif; ?>
        </div>
    </section>
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