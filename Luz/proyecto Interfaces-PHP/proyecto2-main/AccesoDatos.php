<?php

require_once "config.php";
require_once "material.php";

class AccesoDatos {
    private static $modelo = null;
    private $dbh = null;

    public static function getModelo(){
        // Si no existe lo crea el acceso de a la BD
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    private function __construct(){
        
        try {
            $dsn = "mysql:host=".DB_SERVER.";dbname=".DATABASE.";charset=utf8";
            // Creo el objeto PDO estableciendo la conexión a la BD
            $this->dbh = new PDO($dsn,DB_USER, DB_PASSWD);
            // Si falla genera una excepción
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }   
    }

    public function getMaterialesRand(): array {
        $lista = [];
        $stmt = $this->dbh->prepare("SELECT * FROM material ORDER BY RAND() LIMIT 8");
        
            $stmt->execute();
            // Convertimos cada fila automáticamente en un objeto Material
            while ($obj = $stmt->fetchObject('Material')) {
                $lista[] = $obj;    
            }
        
        return $lista;
    }

    public function getImagenPortada($tipo): string {
        $stmt = $this->dbh->prepare("SELECT imagen FROM portadas WHERE tipo = ? LIMIT 1");
        $stmt->execute([$tipo]);
        $resultado = $stmt->fetchColumn(); //con este cojo el valor de la columna 
        return $resultado;
    }

    public function getGeneros($tipoBase): array {
    $lista = [];
    // Buscamos géneros (ej: Romance, Terror) que pertenezcan a Libros
    $stmt = $this->dbh->prepare("SELECT * FROM portadas WHERE tipoBase = ?");
    $stmt->execute([$tipoBase]);

        while ($obj = $stmt->fetchObject()) {
        $lista[] = $obj;
    }
    return $lista;
}

public function getGenerosParejas($nombreGenero): array {
    $lista = [];

    $stmt = $this->dbh->prepare("SELECT * FROM material WHERE imagen LIKE ? ORDER BY id ASC");

    $stmt->execute(["%/$nombreGenero/%"]);//poenmos los % por si hay texto delante o detras
    
    while ($obj = $stmt->fetchObject('Material')) {
        $lista[] = $obj;
    }
    return $lista;
}

public function getParejaPorId($idLibro): array {
    $lista = [];
    $stmt = $this->dbh->prepare("SELECT * FROM material WHERE id = ? OR id = ? ORDER BY id ASC");
    $stmt->execute([$idLibro, $idLibro + 1]); //como la peli siempre va despues del libro nos aseguramos de que esten ordenados
    
    while ($obj = $stmt->fetchObject('Material')) {
        $lista[] = $obj;
    }
    
    return $lista;
}
}


    