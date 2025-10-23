<?php
include_once "equipo.php";
define('DB_DSN','mysql:host=mariadb;dbname=examen1_db');
define('DB_USER','usuarioBD');
define('DB_PASS','abc123');

function getConexion(){
    try {
        $db = new PDO(DB_DSN,DB_USER,DB_PASS);
    } catch (PDOException $th) {
        echo "No se ha podido conectar a la base de datos".$th->getMessage();
    }
return $db;

}

function getEquipos($filtro = null, $order = null){
    $sql = 'SELECT id_equipo,nombre,email,num_integrantes,puntuacion FROM equipos ';
    
    if(isset($filtro)){
        $sql .= "WHERE nombre LIKE '%$filtro%'";
        
        
    }
      if (isset($order)) {
        $sql .= " ORDER BY $order ASC";
    }
    
    $db = getConexion();
    $statement = $db->query($sql);
    $equipos=[];
    foreach ($statement as $equipo) {
        $eq = new Equipo();
        $eq->id_equipo = $equipo['id_equipo'];
        $eq->nombre = $equipo['nombre'];
        $eq->email = $equipo['email'];
        $eq->num_integrantes = $equipo['num_integrantes'];
        $eq->puntuacion = $equipo['puntuacion'];
        $equipos[]= $eq;
        
    }   
    $db = null;
    $statement->closeCursor();
    return $equipos;

}

function getEquipo(int $id) {
    $sql = "SELECT id_equipo, nombre, email, num_integrantes, puntuacion FROM equipos WHERE id_equipo = $id";
    $db = getConexion();
    $equipo = null;

    try {
        $statement = $db->query($sql);
        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $equipo = new Equipo();
            $equipo->id_equipo = $row['id_equipo'];
            $equipo->nombre = $row['nombre'];
            $equipo->email = $row['email'];
            $equipo->num_integrantes = $row['num_integrantes'];
            $equipo->puntuacion = $row['puntuacion'];
        }
    } catch (PDOException $th) {
        error_log($th->getMessage());
    } finally {
        $statement?->closeCursor();
        $db = null;
    }

    return $equipo;
}

function updateEquipo(Equipo $e ){
    $id = $e->id_equipo;
    $email = $e->email;
    $integrantes = $e->num_integrantes;
    $puntuacion = $e->puntuacion;

    $sql = "UPDATE equipos 
            SET  email = '$email',
                 num_integrantes = '$integrantes',
                 puntuacion='$puntuacion'
            WHERE id_equipo='$id' ";
    $db = getConexion();
    $toret = false;
    try {
        $toret = $db->exec($sql);
    } catch (PDOException $th) {
        error_log($th->getMessage());
    }finally{
        $db=null;
    }


    return $toret;

}


?>