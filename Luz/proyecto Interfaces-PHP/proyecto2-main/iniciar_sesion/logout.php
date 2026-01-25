<?php
session_start();
// cierra la sesión
session_destroy();
// vuelve a la pagina principal si la inicion sesiada
header("Location: ../index.php");
exit;
