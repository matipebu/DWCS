<?php
include_once "usuario.php";
// Definicion de constantes de la BD
define('DB_DSN', 'mysql:host=mariadb;dbname=empresa');
define('DB_USER', 'root');
define('DB_PASS', 'bitnami');

function conexionDb()
{
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $th) {
        die('Fallo en la conexion con la db' . $th->getMessage());
    }
    return $db;
}

function altaUsuario(Usuario $usuario)
{
    $nombre = $usuario->getNombre();
    $correo = $usuario->getCorreo();
    $rol_id = $usuario->getRolId(); 
    $contrasena = sha1($usuario->getContrasena());

    $conexion = conexionDb();
    $resultado = false;

    // Comprobar si ya existe el usuario
    $sql = 'SELECT COUNT(*) AS num_usr FROM usuarios WHERE nombre=? OR correo=?';
    try {
        $query = $conexion->prepare($sql);
        $query->bindValue(1, $nombre, PDO::PARAM_STR);
        $query->bindValue(2, $correo, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();

        if (isset($result['num_usr']) && $result['num_usr'] > 0) {
            return false; 
        }

    // Insertar usuario
    $sqlInsert = 'INSERT INTO usuarios (nombre, correo, contrasena) VALUES (:nombre, :correo, :contrasena)';
    $statement = $conexion->prepare($sqlInsert);
    $statement->bindValue(':nombre', $nombre, PDO::PARAM_STR);
    $statement->bindValue(':correo', $correo, PDO::PARAM_STR);
    $statement->bindValue(':contrasena', $contrasena, PDO::PARAM_STR);

    if ($statement->execute()) {
        $sql = "SELECT MAX(id) AS id FROM usuarios";
        $stm = $conexion->query($sql);
        $row = $stm->fetch();
        $idUsuario = $row['id'];
        $stm->closeCursor();

        $sqlRol = "INSERT INTO usuario_rol (usuario_id, rol_id) VALUES (:usuario_id, :rol_id)";
        $st2 = $conexion->prepare($sqlRol);
        $st2->bindValue(':usuario_id', $idUsuario, PDO::PARAM_INT);
        $st2->bindValue(':rol_id', $rol_id, PDO::PARAM_INT);
        $resultado = $st2->execute();
        $st2->closeCursor();
    }

    $statement->closeCursor();
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        $resultado = false;
    } finally {
        $conexion = null;
    }

    return $resultado;
}


function comprobar_usuario($correo, $contrasena)
{
    $sql = "SELECT id,nombre,correo,contrasena FROM usuarios WHERE correo = :correo AND contrasena = :contrasena";
    
    $conexion = conexionDb();
    
    $query = $conexion->prepare($sql);
    $query->bindValue(':correo', $correo);
    $query->bindValue(':contrasena',  sha1( $contrasena));
    
    $query->execute();
    $result = $query->fetch();

    $query = null;
    $conexion = null;
    return $result;
}

function getRolById(int $id){
    $sql ='SELECT r.nombre AS rol FROM usuario_rol ur JOIN roles r ON ur.rol_id = r.id WHERE ur.usuario_id = :id';
    $conexion = conexionDb();
    $query = $conexion->prepare($sql);
    $query->bindValue(':id',$id);
    $rol = $query->execute();

    $rol = $query->fetch();
    return $rol['rol'];
}

function obtenerRoles(){
    $sql = "SELECT id,nombre FROM roles";
    $bd = conexionDb();
    $stm = $bd->query($sql);
    $roles = [];
    foreach ($stm as $row) {
        $roles[]=[
            'id' => $row['id'],
            'nombre' => $row['nombre']
        ];
    }
    return $roles;
}

function getProyectosByRol(Usuario $usuario,string $rol){
    $db = conexionDb();
    $proyectos = [];


    if ($rol === 'jefe'){
        $sql = " ";
        $stm = $db->query($sql);
        
        foreach ($stm as $pro) {
            $p = new Proyecto($pro['nombre'],$pro['descripcion'],$pro['id_responsable']);
            $p->setId($pro['id']);
            $proyectos[] = $p;
            
        }
        
    }
      if ($rol === 'responsable'){
        $sql = "";
        $stm = $db->query($sql);

        foreach ($stm as $pro) {
            $p = new Proyecto();
            $p->setId($pro['id']);
            $p->setNombre($pro['nombre']);
            $p->setDescripcion($pro['descripcion']);
            $p->setIdResponsable($pro['id_responsable']);
            $proyectos[] = $p;
            
        }
        
    }
      if ($rol === 'programador'){
        $sql = "";
        $stm = $db->query($sql);
        
        foreach ($stm as $pro) {
            $p = new Proyecto();
            $p->setId($pro['id']);
            $p->setNombre($pro['nombre']);
            $p->setDescripcion($pro['descripcion']);
            $p->setIdResponsable($pro['id_responsable']);
            $proyectos[] = $p;
            
        }
        
    }
    return $proyectos;


}

