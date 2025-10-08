<?php
include_once "videojuego.php";

define("DB_DSN","mysql:host=mariadb;dbname=videoteca");
define("DB_USER","root");
define("DB_PASS","bitnami");
function getConnection(){
try {
    $db = new PDO(DB_DSN,DB_USER,DB_PASS);
} catch (PDOException $ex) {
    die("Error en la conexion".$ex->getMessage());
}
return $db;
}

function getVideojuego(int $id):Videojuego{
    $sql = "SELECT id, anio_lanzamiento, genero,nombre,plataforma FROM videojuegos WHERE id= $id";
    $db = getConnection();
    $statement=$db->query($sql);
    $resultado=$statement->fetch();
    $videojuego = new Videojuego();
    $videojuego->setId($resultado["id"])
                ->setLanzamiento($resultado["anio_lanzamiento"])
                ->setNombre($resultado["nombre"])
                ->setGenero($resultado["genero"])
                ->setPlataforma($resultado["plataforma"]);

    return $videojuego;

}
function getVideojuegos():array{

      $sql = "SELECT id, anio_lanzamiento, genero, nombre, plataforma FROM videojuegos";
    
      $db = getConnection();
    $statement=$db->query($sql);
    $videojuegos =[];
    
    foreach($statement as $resultado){
        $videojuego = new Videojuego();
        $videojuego->setId($resultado["id"])
                ->setLanzamiento($resultado["anio_lanzamiento"])
                ->setNombre($resultado["nombre"])
                ->setGenero($resultado["genero"])
                ->setPlataforma($resultado["plataforma"]);
    
                $videojuegos[]=$videojuego;


    }
    $statement->closeCursor();
    $db = null;
    return $videojuegos;
}
function updateVideojuego(Videojuego $v):bool{
 if($v->getGenero() != null){
   $sql = "UPDATE videojuegos 
        SET nombre = '".$v->getNombre()."', 
            plataforma = '".$v->getPlataforma()."', 
            genero = '".$v->getGenero()."', 
            anio_lanzamiento = '".$v->getLanzamiento()."' 
        WHERE id = ".$v->getId();

  }else{
      $sql = "UPDATE videojuegos 
        SET nombre = '".$v->getNombre()."', 
            plataforma = '".$v->getPlataforma()."', 
            lanzamiento = '".$v->getLanzamiento()."' 
        WHERE id = ".$v->getId();

    
  }

  
    $db = getConnection();
    $resultado = $db->exec($sql);
    $db = null;

    return $resultado !=false;
}
function deleteVideojuego(int $id):bool{
  
    $sql = "DELETE FROM videojuegos WHERE id=$id";
    $db = getConnection();
    $resultado = $db->exec($sql);
    $db = null;

    return $resultado !=false;

}
function addVideojuego(Videojuego $v):bool{
  if($v->getGenero() != null){
    $sql = "INSERT INTO videojuegos(nombre,plataforma,anio_lanzamiento,genero)
    VALUES('".$v->getNombre()."','".$v->getPlataforma()."','".$v->getLanzamiento()."','".$v->getGenero()."')";
  }else{
    $sql = "INSERT INTO videojuegos(nombre,plataforma,anio_lanzamiento,genero)
    VALUES('".$v->getNombre()."','".$v->getPlataforma()."','".$v->getLanzamiento()."')";
  }

  
    $db = getConnection();
    $resultado = $db->exec($sql);
    $db = null;

    return $resultado !=false;



}


?>