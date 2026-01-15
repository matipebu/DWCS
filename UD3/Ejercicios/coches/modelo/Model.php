<?php
namespace modelo;

use PDO;

abstract class Model{
    protected static function getConection(){
        $db = new PDO('mysql:host=mariadb; dbname=trafico','root','bitnami');
        return $db;
    }

}
?>