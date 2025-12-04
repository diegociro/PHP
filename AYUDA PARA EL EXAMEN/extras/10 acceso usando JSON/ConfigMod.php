<!-- Este ejercicio utiliza el formato JSON para la persistencia de datos de autenticación, 
lo que requiere usar json_decode y json_encode en lugar de fgetcsv y fputcsv.

Enunciado
Implemente un sistema de autenticación leyendo los usuarios y contraseñas de un archivo config.json. 
El acceso exitoso debe registrar el nombre de usuario y la fecha en que se modificó por última vez la 
configuración en un archivo modificaciones.json separado. Se mantiene el control de la sesión con caducidad. -->

<?php
// Clase para el registro de modificaciones
class ConfigMod {
    function __construct (private $usuario, private $fecha, private $accion ){
    }
    function __get($nombre){ return $this->$nombre; }
    function __set($name, $value){ $this->$name = $value; }
}
?>