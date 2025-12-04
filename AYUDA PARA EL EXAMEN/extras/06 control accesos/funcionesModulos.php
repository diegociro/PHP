<?php
include_once 'Usuario.php';
include_once 'Modulo.php';

// Suponemos que cargarTabla() y volcarUsuarios() están definidos aquí o incluidos.

/**
 * Carga los módulos desde 'modulos.dat' y devuelve un array de objetos Modulo.
 * @return array Una tabla asociativa de objetos Modulo.
 */
function cargarModulos():array {
    $file = fopen('modulos.dat', 'r');
    $tablaModulos = [];
    while ($valores = fgetcsv($file)) {
        list ($nombre, $estado, $admin_modificador) = $valores;
        $modulo = new Modulo($nombre, $estado, $admin_modificador);
        $tablaModulos[$nombre]= $modulo;
    }
    fclose($file);
    return $tablaModulos;
}

/**
 * Cambia el estado de un módulo específico y registra el administrador.
 * @param string $nombre_modulo El nombre del módulo a cambiar.
 * @param int $nuevo_estado El nuevo estado (1 o 0).
 * @param string $admin_que_modifica El nombre del usuario autenticado que realiza el cambio.
 * @return bool True si la operación fue exitosa.
 */
function modificarEstadoModulo($nombre_modulo, $nuevo_estado, $admin_que_modifica): bool
{
    $tablaModulos = cargarModulos();
    
    if (key_exists($nombre_modulo, $tablaModulos)) {
        $modulo = $tablaModulos[$nombre_modulo];
        $modulo->estado = $nuevo_estado;
        $modulo->admin_modificador = $admin_que_modifica; // Registra quién hizo el cambio
        volcarModulos($tablaModulos);
        return true;
    }
    return false;
}

/**
 * Vuelca el array de objetos Modulo en el fichero 'modulos.dat'.
 * @param array $tabla El array asociativo de objetos Modulo.
 */
function volcarModulos ($tabla){
   $fich = fopen("modulos.dat","w");
   foreach( $tabla as $mod){
     // Prepara el array para fputcsv
     $valores = [ $mod->nombre, $mod->estado, $mod->admin_modificador ];
     fputcsv($fich,$valores);
   }
   fclose($fich);
}

// **Función clave en el controlador (`index.php`) tras acceso válido:**
// anotarNuevoAcceso($nombre); // Mantiene el conteo de accesos de Usuario
// // Lógica de la vista para llamar a: modificarEstadoModulo("NOTICIAS", 0, $nombre);
?>