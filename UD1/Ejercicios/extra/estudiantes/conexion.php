<?php
include_once "Estudiante.php";

define('DB_DSN','mysql:host==mariadb;dbname=gestion_estudiantes');
define('DB_USER','root');
define('DB_PASS','bitnami');

function getConexion(){
    try {
        $db = new PDO(DB_DSN,DB_USER,DB_PASS);
    } catch (PDOException $th) {
        echo "Se ha producido un error al hacer la conexion".$th->getMessage();
    }
    return $db;
}

function registroEstudiante(Estudiante $e){
       $hashPass = password_hash($e->getContraseña(), PASSWORD_DEFAULT);
    
      $sql = "INSERT INTO estudiantes(nombre, apellido1, apellido2, edad, correo, calificaciones, contraseña)
            VALUES('" . $e->getNombre() . "','" . $e->getApellido1() . "','" . $e->getApellido2() . "','" .
            $e->getEdad() . "','" . $e->getCorreo() . "','" . $e->getMedia() . "','" .$hashPass. "')";
    
    $db = getConnection();

    $resultado = $db->exec($sql);
    $db = null;
    return $resultado;
}

function mostrarEstudianteByNombre(Estudiante $e){
    $nombre = $e->getNombre();
    $sql = "SELECT * FROM estudiantes WHERE nombre = $nombre";
    $db=getConnection();
    $statement = $db->query($sql);
    $resultado = $statement->fetch();
    if ($resultado) {
        $e->setNombre($resultado["nombre"])
          ->setApellido1($resultado["apellido1"])
          ->setApellido2($resultado["apellido2"])
          ->setEdad($resultado["edad"])
          ->setCorreo($resultado["correo"]);
    }

    $statement->closeCursor();
    $db = null;
}

function mostrarEstudiantes(Estudiante $e){
    $sql = "SELECT * FROM estudiantes";
    $db = getConnection();
    $statement=$db->query($sql);


    foreach ($statement as $resultado) {
        $e->setNombre($resultado["nombre"])
          ->setApellido1($resultado["apellido1"])
          ->setApellido2($resultado["apellido2"])
          ->setEdad($resultado["edad"])
          ->setCorreo($resultado["correo"]);
        
    }


    $statement->closeCursor();
    $db = null;
}




?>