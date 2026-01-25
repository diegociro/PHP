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

    public function getConexion() {
        return $this->dbh;

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
        $stmt = $this->dbh->prepare("SELECT * FROM material ORDER BY RAND() LIMIT 6");
        
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

public function buscarMaterial($nombre): array {
    $lista = [];
    $stmt = $this->dbh->prepare("SELECT * FROM material WHERE titulo LIKE ?");
    $stmt->execute(["%$nombre%"]); //como arriba, ponemos % para que lo filtre por palabras 
    
    while ($obj = $stmt->fetchObject('Material')) {
        $lista[] = $obj;
    }
    return $lista;
}

public function guardarComentario($id_material, $usuario, $valoracion, $texto) {
    $datos = "INSERT INTO comentarios (id_material, usuario, valoracion, texto) VALUES (?, ?, ?, ?)"; //unicamente los guardamos aquí s
    $consulta = $this->dbh->prepare($datos);
    $consulta->execute([$id_material, $usuario, $valoracion, $texto]);
}

public function obtenerComentarios($id_material) {
    $datos = "SELECT id_material, usuario, valoracion, texto, DATE_FORMAT(fecha, '%d/%m/%Y') AS fechafinal -- damos formato a la fecha 
    FROM comentarios WHERE id_material = ? ORDER BY fecha DESC"; //los mostramos de mas antiguos a más nuevos
    $consulta = $this->dbh->prepare($datos);
    $consulta->execute([$id_material]);
    return $consulta->fetchAll(PDO::FETCH_OBJ); //como solo queremos mostrarlos lo hacemos asi y asi no creamos una clase para los comentarios
    }

    public function guardarFav($usuario, $id_material) {
    $stmt = $this->dbh->prepare("INSERT INTO guardados (usuario, id_material) VALUES (?, ?)");
    //guardamos en la base de datos nuestro usuario y el id del libro-peli que queremos
    $stmt->execute([$usuario, $id_material]);
}

// ahora obtengo los libros-pelis que el usuario ha guardado
public function mostrarFav($usuario): array {
    $lista = [];
    //hacemosla busqueda en material de los ids que guardamos con el usuario y no hacemos joins
    $stmt = $this->dbh->prepare("SELECT * FROM material WHERE id IN (SELECT id_material FROM guardados WHERE usuario = ?)");
    $stmt->execute([$usuario]);
    
    while ($obj = $stmt->fetchObject('Material')) {
        $lista[] = $obj;
    }
    return $lista;
}

}


    