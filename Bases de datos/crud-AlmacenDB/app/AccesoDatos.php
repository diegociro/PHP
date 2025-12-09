<?php
include_once "Producto.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería mysqli
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton
   
    private function __construct(){
        
         $this->dbh = new mysqli(DB_SERVER,DB_USER,DB_PASSWD,DATABASE);
         
      if ( $this->dbh->connect_error){
         die(" Error en la conexión ".$this->dbh->connect_errno);
        } 

    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            // Cierro la base de datos
            $obj->dbh->close();
            self::$modelo = null; // Borro el objeto.
        }
    }


    // SELECT Devuelvo la lista de Usuarios
    public function getProductos ():array {
        $tprod = [];
        // Crea la sentencia preparada
        $stmt_productos  = $this->dbh->prepare("select * from Productos");
        // Si falla termian el programa
        if ( $stmt_productos == false) die (__FILE__.':'.__LINE__.$this->dbh->error);
        // Ejecuto la sentencia
        $stmt_productos->execute();
        // Obtengo los resultados
        $result = $stmt_productos->get_result();
        // Si hay resultado correctos
        if ( $result ){
            // Obtengo cada fila de la respuesta como un objeto de tipo Usuario
            while ( $produ = $result->fetch_object('Producto')){
               $tprod[]= $produ;
            }
        }
        // Devuelvo el array de objetos
        return $tprod;
    }
    
    // SELECT Devuelvo un usuario o false
    public function getProducto (String $id) {
        $produ = false;
        
        $stmt_producto   = $this->dbh->prepare("select * from Productos where id =?");
        if ( $stmt_producto == false) die ($this->dbh->error);

        // Enlazo $login con el primer ? 
        $stmt_producto->bind_param("s",$id);
        $stmt_producto->execute();
        $result = $stmt_producto->get_result();
        if ( $result ){
            $produ = $result->fetch_object('Producto');
            }
        
        return $produ;
    }
    
    // UPDATE
    public function modProducto($produ):bool{
      
        $stmt_modprodu   = $this->dbh->prepare("update Productos set nombre=?, precio=?, stock=? where id=?");
        if ( $stmt_modprodu == false) die ($this->dbh->error."En la línea:".__LINE__);

        $stmt_modprodu->bind_param("ssss",$produ->nombre,$produ->precio, $produ->stock, $produ->id);
        $stmt_modprodu->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }

    //INSERT
    public function addProducto($produ):bool{
       
        $stmt_creaprodu  = $this->dbh->prepare("insert into Productos (id,nombre,precio,stock) Values(?,?,?,?)");
        if ( $stmt_creaprodu == false) die ($this->dbh->error);

        $stmt_creaprodu->bind_param("ssss",$produ->id, $produ->nombre, $produ->precio, $produ->stock);
        $stmt_creaprodu->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }

    //DELETE
    public function borrarProducto(String $id):bool {
        $stmt_borrprodu   = $this->dbh->prepare("delete from Productos where id =?");
        if ( $stmt_borrprodu == false) die ($this->dbh->error);
       
        $stmt_borrprodu->bind_param("s", $id);
        $stmt_borrprodu->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }   
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

