<!-- Desarrolle una aplicación para que los estudiantes consulten sus calificaciones. 
Tras autenticarse exitosamente (usando usuarios.dat), 
el sistema debe actualizar el archivo de datos del usuario con su última dirección IP de conexión. 
Además, se mantiene el contador de accesos y se registra la desconexión. -->

<?php
class Usuario {
    // login, password cifrada, accesos, ULTIMA IP DE CONEXION
    function __construct (private $nombre, private $clave, private $accesos, private $ultima_ip = 'N/A' ){
        // Nota: El constructor ahora espera 4 argumentos.
    }
    // __get y __set se mantienen igual para acceder a las 4 propiedades.
    // ...
}
?>