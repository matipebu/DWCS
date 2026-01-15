<?php
namespace Ejercicios\Actividad3_2\model;
use Ejercicios\Actividad3_2\model\Model;
use PDO;
use Ejercicios\Actividad3_2\model\vo\VO;
use Ejercicios\Actividad3_2\model\vo\ClienteVO;
use PDOException;


class ClienteModel extends Model
{
    public static function listarClientes():array
    {
        $sql = "SELECT cod_cliente,nombre,apellidos,telefono,mail FROM cliente";
        $clientes = [];
        try {
            $db = self::getConnection();
            $stm = $db->query($sql);
            foreach ($stm as $row){
                $clientes[] = self::rowToVO($row);
            }

        } catch (PDOException $th) {
            error_log("Error accediendo a la base de datos. " . $th->getMessage());        
        }finally{
            $db = null;
        }
        return $clientes;
    }   
     public static function addCliente(ClienteVO $cliente): ClienteVO|null
    {
        $sql = "INSERT INTO cliente (nombre,apellidos,telefono,mail) VALUES (:nombre,:apellidos,:telefono,:mail)";
        try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(":nombre", $cliente->getNombre());
            $stm->bindValue(":apellidos",$cliente->getApellidos());
            $stm->bindValue(":telefono", $cliente->getTelefono());
            $stm->bindValue(":mail", $cliente->getMail());
            
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
     public static function getById(int $id): ?ClienteVO
    {
        $sql = "SELECT * FROM cliente WHERE cod_cliente = :id";
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

    private static function rowToVO(array $row):ClienteVO{
        return new ClienteVO(
            (int) $row['cod_cliente'],
            $row['nombre'],
            $row['apellidos'],
            $row['telefono'],
            $row['mail']
        );
    }
}
?>