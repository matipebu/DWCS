<?php
namespace modelo;

use modelo\vo\ConductorVO;
use PDO;
use PDOException;

class ConductorModel extends Model{
    public static function altaConductor(ConductorVO $vo):ConductorVO|false {
        $sql = "INSERT INTO conductor (nombre,apellido1,apellido2,licencia) 
                VALUES (:nombre,:apellido1,:apellido2,:licencia)";
        try 
        {
            $db = self::getConection();
            $stm = $db->prepare($sql);
            
            $stm->bindValue(':nombre',$vo->getNombre(),PDO::PARAM_STR);
            $stm->bindValue(':apellido1',$vo->getApellido1(),PDO::PARAM_STR);
            $stm->bindValue(':apellido2',$vo->getApellido2(),PDO::PARAM_STR);
            $stm->bindValue(':licencia',$vo->getLicencia(),PDO::PARAM_STR);
            
            if ($stm->execute()){
                $id = $vo->getId();
            }

        } catch (PDOException $th) {
            error_log("Error accediendo a Coches:".$th->getMessage());
        }finally{
            $db=null;
        }
        return $id ? self::getById($id) :false;
    }
    
    public static function getById($id):?ConductorVO{
        $sql = "SELECT * FROM conductor WHERE id = :id";
        try {
            $db = self::getConection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_STR);
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
         } catch (PDOException $th) {
            error_log("Error accediendo a Coches:".$th->getMessage());
        }finally{
            $db=null;
        }
        return isset($row) ? self::rowToVo($row) : null;
    }   
    public static function rowToVO(array $row):ConductorVO
    {
        return new ConductorVO(
            isset($row['id'])?$row['id']:null,
            isset($row['nombre'])?$row['nombre']:null,
            isset($row['apellido1'])?$row['apellido1']:null,
            isset($row['apellido2'])?$row['apellido2']:null,
            isset($row['licencia'])?$row['licencia']:null
        );
    }

}

?>