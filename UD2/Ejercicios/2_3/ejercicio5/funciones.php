<?php

define('DB_DSN', 'mysql:host=mariadb;dbname=carrito');
define('DB_USER', 'root');
define('DB_PASS', 'bitnami');

class Producto
{
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;

    public function __construct(int $id, string $nombre, string $descripcion, int $precio)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }
}

function conexion_bd()
{
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        die('Fallo en la conexión de con la BD. ' . $e->getMessage());
    }
    return $db;
}

function getProductos()
{
    $productos = [];
    $sql = "SELECT id_producto,nombre,descripcion,precio FROM productos";
    try {
        $db = conexion_bd();
        $statement = $db->query($sql);
        foreach ($statement as $producto) {
            $prod = new Producto();
            $prod->nombre = $producto['nombre'];
            $prod->descripcion = $producto['descripcion'];
            $prod->precio = $producto['precio'];
            $productos[] = $prod;
        }
    } catch (PDOException $ex) {
        error_log($ex->getMessage());

    } finally {
        $statement->closeCursor();
        $db = null;
    }
    return $productos;

}





?>