<!-- Desarrolle una aplicación para acceder a un panel de control. 
La validación de credenciales simula una llamada a un servicio remoto (verificarCredencialesAPI),
 donde solo los usuarios admin (clave 123456) y editor (clave password) son válidos. Si el acceso es exitoso, 
 se registra el evento en un archivo de bitácora (accesos.log) y se mantiene el control de la sesión con caducidad.

Clase de Datos Principal:
Usuario.php (Se mantiene igual, solo se usa para el registro en el log si fuera necesario,
 o se elimina si solo se necesita el log). Usaremos una clase más simple para este caso. -->


 <?php
// Clase simple para representar una entrada en el log
class LogEntry {
    function __construct (private $username, private $status, private $timestamp, private $ip ){
    }
    // Incluir __get y __set si se necesita modificar o acceder fácilmente
    function __get($nombre){ return $this->$nombre; }
}
?>