<?php
define('DB_DSN','mysql:host=mariadb;dbname=ejercicio1');
define('DB_USER','root');
define('DB_PASS','bitnami');


function conexionDB(){
    try {
        $db = new PDO('DB_DSV','DB_USER','DB_PASS');
    } catch (PDOException $th) {
        echo "<alert>No se ha podido conectar a la base de datos:".$th->getMessage()."</alert>";
    }

    return $db;
}



function addUser($nic, $nombre,$ap1,$ap2,$email,$pass){
    $pass = password_hash($pass);

    $sql="INSERT INTO usuarios(nic,nombre,apellido1,apellido2,email,contraseña)
            VALUES $nic,$nombre,$ap1,$ap2,$email,$pass ";
    
    $db = conexionDB();
    $statement = $db->exec($sql);

    $db = null;
    return $statement;
    
}

function getUsuario($nic) {
    $sql = "SELECT nic, nombre,apellido1,apellido2,email,contraseña WERE nic = '$nic' ";
    $db = conexionDB();
    $statement = $db->query($sql);
    $usuario = $statement->fetch();
    $statement->closeCursor();
    $db = null;
    return $usuario;
}




?>