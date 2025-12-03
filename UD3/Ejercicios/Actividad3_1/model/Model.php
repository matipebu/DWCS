<?php
namespace Ejercicios\Actividad3_1\model;
use PDO;
define('DSN','mysql:host=mariadb; dbname=articulos');
define('USER','root');
define('PASS','bitnami');


class Model{
    protected static function getConnection(){
        $db = new PDO(DSN,USER,PASS);
    }
}