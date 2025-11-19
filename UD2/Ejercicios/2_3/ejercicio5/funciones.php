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
function addCarrito(): int
{   
    $sql = "INSERT INTO CARRITO (id_carrito) VALUES (null)";
    $db = conexion_bd();

    try {
        if ($db->exec($sql)) {
            $sql = "SELECT MAX(id_carrito) as id FROM CARRITO";
            $statement = $db->query(query: $sql);
            $row = $statement->fetch();
            $idCarrito = $row['id'];
            $statement->closeCursor();
        }
    } catch (PDOException $ex) {
        error_log($ex->getMessage());

    } finally {
        $statement->closeCursor();
        $db = null;
    }
    return $idCarrito;

}

function addProductoCarrito($idProducto,$idCarrito){
    $sql = "INSERT INTO CARRITO_PRODUCTO(id_carrito,id_producto) VALUES (:idCarrito, :idProducto)";
    $db = conexion_bd();
    try {
        $query = $db->prepare($sql);
        $query->bindValue('idCarrito',$idCarrito,PDO::PARAM_INT);
        $query->bindValue('idProducto',$idProducto,PDO::PARAM_INT);
        $toret = $query->execute();
    } catch (PDOException $th) {
        die($th->getMessage());
    }finally{
        $db = null;
    }
    return $toret;

}

function getProductosCarrito($idCarrito){
    $sql ="SELECT nombre,descripcion,precio 
            FROM productos c
            INNER JOIN CARRITO_PRODUCTO cp ON cp.id_producto =c.id_producto
            WHERE cp.id_carrito = :idCarrito; ";
    $db = conexion_bd();
    $productos=[];

    try {
        $statement = $db->prepare($sql);
        $statement->bindValue('idCarrito',$idCarrito,PDO::PARAM_INT);
        $statement-> execute();
        foreach ($statement as $producto) {
            $p = new Producto();
            $p->nombre = $producto['nombre'];
            $p->descripcion = $producto['descripcion'];
            $p->precio = $producto['precio'];
            $productos[]=$p;
        }
        
        $statement->closeCursor();
        return $productos;

    } catch (PDOException $th) {
        die($th->getMessage());
    }
}
?>