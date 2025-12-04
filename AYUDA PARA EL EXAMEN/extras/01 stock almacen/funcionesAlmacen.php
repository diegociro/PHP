<?php
include_once 'Producto.php';

/**
 * Carga los productos desde 'inventario.dat' y devuelve un array de objetos Producto.
 * Utiliza el código del producto como clave asociativa.
 * @return array Una tabla asociativa de objetos Producto.
 */
function cargarInventario():array {
    $file = fopen('inventario.dat', 'r');
    $tablaProductos = [];
    while ($valores = fgetcsv($file)) {
        list ($codigo, $nombre, $stock, $ult_modificacion) = $valores;
        $producto = new Producto($codigo, $nombre, $stock, $ult_modificacion);
        $tablaProductos[$codigo]= $producto;
    }
    fclose($file);
    return $tablaProductos;
}

/**
 * Registra una entrada o salida de stock para un producto.
 * @param string $codigo El código del producto a modificar.
 * @param int $cantidad La cantidad a añadir (positivo) o restar (negativo).
 * @return bool True si la operación fue exitosa, false si el producto no existe o el stock es insuficiente.
 */
function modificarStock($codigo, $cantidad): bool
{
    $tablaProductos = cargarInventario();
    
    if (key_exists($codigo, $tablaProductos)) {
        $producto = $tablaProductos[$codigo];
        
        // Verifica si la operación es una salida y hay stock suficiente
        if (($producto->stock + $cantidad) >= 0) {
            $producto->stock += $cantidad;
            $producto->ult_modificacion = time(); // Actualiza el timestamp de modificación
            volcarInventario($tablaProductos);
            return true;
        }
    }
    return false;
}

/**
 * Vuelca el array de objetos Producto en el fichero 'inventario.dat'.
 * @param array $tabla El array asociativo de objetos Producto.
 */
function volcarInventario ($tabla){
   $fich = fopen("inventario.dat","w");
   foreach( $tabla as $prod){
     // Prepara el array para fputcsv, accediendo a las propiedades con __get
     $valores = [ $prod->codigo, $prod->nombre, $prod->stock, $prod->ult_modificacion ];
     fputcsv($fich,$valores);
   }
   fclose($fich);
}
?>