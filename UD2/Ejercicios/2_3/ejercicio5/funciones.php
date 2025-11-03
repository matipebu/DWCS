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
            $prod->id = $producto['id_producto'];
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

function getProductoById($id){
    $sql = "SELECT nombre,descripcion,precio FROM productos WHERE id_producto == $id";
    $db = conexion_bd();
    try {
        $statement=$db->query($sql);
        $statement->fetch();       
        } catch (PDOException $th) {
            error_log($th->getMessage());
        }
    return $statement;

}
function addProductoId(Producto $producto)
{  
    $id_producto = $producto->id;
    $addProductos = [];
    $sql = "SELECT id_producto,nombre,descripcion,precio FROM productos WHERE id_producto == $id_producto";
    try {
        $db = conexion_bd();
        $statement = $db->query($sql);
        foreach ($statement as $producto) {
            $prod = new Producto();
            $prod->id=$producto['id_producto'];
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
    return $addProductos;

}
?>