<?php
namespace Ejercicios\Actividad3_2\Model;
use Ejercicios\Actividad3_2\model\Model;
use PDO;
use Ejercicios\Actividad3_2\model\vo\VO;
use Ejercicios\Actividad3_2\model\vo\ProductoVO;
use PDOException;


class ProductoModel extends Model
{
    public static function listarProductos():array
    {
        $sql = "SELECT cod_producto,denominacion,descripcion,precio,cantidad FROM producto";
        $productos = [];
        try {
            $db = self::getConnection();
            $stm = $db->query($sql);
            foreach ($stm as $row){
                $productos[] = self::rowToVO($row);
            }

        } catch (PDOException $th) {
            error_log("Error accediendo a la base de datos. " . $th->getMessage());        
        }finally{
            $db = null;
        }
        return $productos;
    }   
     public static function addProducto(ProductoVO $producto): ProductoVO|null
    {
        $sql = "INSERT INTO producto (denominacion,descripcion,precio,cantidad) VALUES (:denominacion,:descripcion,:precio,:cantidad)";
        $id = false;
        try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(":denominacion", $producto->getDenominacion(),PDO::PARAM_STR);
            $stm->bindValue(":descripcion",$producto->getDescripcion(),PDO::PARAM_STR);
            $stm->bindValue(":precio", $producto->getPrecio(),PDO::PARAM_INT);
            $stm->bindValue(":cantidad", $producto->getCantidad(),PDO::PARAM_INT);
            
            if($stm->execute()&& $stm->rowCount() == 1){
                $id = (int) $db->lastInsertId();
            }

        } catch (PDOException $th) {
            error_log("Error accediendo a la base de datos. " . $th->getMessage());        
        }finally{
            $db = null;
        }
        return $id == false ? false : self::getById($id);
    }
     public static function getById(int $id): ?ProductoVO
    {
        $sql = "SELECT * FROM producto WHERE cod_producto = :id";
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            error_log("Error obteniendo escuela por ID: " . $th->getMessage());
        } finally {
            $db = null;
        }

        return isset($row) && $row ? self::rowToVO($row) : null;
    }   

    private static function rowToVO(array $row):ProductoVO{
        return new ProductoVO(
            (int) $row['cod_producto'],
            $row['denominacion'],
            $row['descripcion'],
            $row['precio'],
            $row['cantidad']
        );
    }
}
?>
