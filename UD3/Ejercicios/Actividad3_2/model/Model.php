<?php
namespace Ejercicios\Actividad3_2\model;
use PDO;
define('DSN','mysql:host=mariadb; dbname=tienda');
define('USER','root');
define('PASS','bitnami');


abstract class Model{
    protected static function getConnection(){
        $db = new PDO(DSN,USER,PASS);
        return $db;
    }
}