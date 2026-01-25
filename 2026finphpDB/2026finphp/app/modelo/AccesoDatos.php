<?php
require_once "Hotel.php";
/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;
    
    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=HotelesDB;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        // Construyo la consulta        
    }

    public function getCiudad ():array {
        $tciu = [];

        $stmt  = $this->dbh->prepare("select ciudad from hoteles");
        if ( $stmt == false) die (__FILE__.':'.__LINE__.$this->dbh->error);
        $stmt->execute();

        $result = $stmt->get_result();

        if ( $result ){

        while ( $ciu = $result->fetch_object('Hotel')){
               $tciu[]= $ciu;
            }
        }
        return $tciu;
    }

    public function GetHoteles ():array {
        $thoteles= [];

        $stmt = $this->dbh->prepare("SELECT nombre from hoteles where habitaciones_disponibles > 0 ORDER BY precio_noche ASC " );
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Hotel');
        if ( $stmt->execute() ){
            $thoteles = $stmt->fetchAll();
        }
        return $thoteles;
    }





     // Evito que se pueda clonar el objeto.
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}