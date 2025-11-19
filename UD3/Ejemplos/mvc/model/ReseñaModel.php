<?php
class ReseñaModel{
     private static function getConnection()
    {
        $db = new PDO('mysql:host=mariadb; dbname=articulos', 'root', 'bitnami');
        return $db;
    }


    private static function getReseñas(){
        try {
            $db = self::getConnection();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}



?>