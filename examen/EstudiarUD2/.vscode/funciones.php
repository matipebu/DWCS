<?php
define('DB_DSN', 'mysql:host=mariadb;dbname=biblioteca');
define('DB_USER', 'root');
define('DB_PASS', 'bitnami');
class Usuario
{
    public $id;
    public $nombre;
    public $correo;
    public $contrasena;
    public $rol_id;
}

function getConnection(){
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $th) {
        die('Fallo en la conexion con la db' . $th->getMessage());
    }
    return $db;
}
function loguearUsuario($email,$contrasena){
    $contrasena = sha1($contrasena);
    $sql = "SELECT * FROM usuarios WHERE correo = :email AND password = :contrasena";
    $db = getConnection();
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':email',$email,PDO::PARAM_STR);
        $statement->bindValue(':contrasena',$contrasena,PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
    } catch (PDOException $th) {
        die($th->getMessage());
    }finally{
        $db = null;
    }
    return $result;

}
function getLibros(){
    $db = getConnection();
    $sql = "SELECT * FROM libros";
    $stm = $db->query($sql);
    $libros = $stm->fetchAll(PDO::FETCH_ASSOC);
    $stm->closeCursor();
    $db = null;
    return $libros;
}
?>