<?php
namespace modelo;

use modelo\vo\CocheVO;
use PDO;
use PDOException;

class CocheModel extends Model{
    public static function listarCoches(?array $data=null):array {
        $sql = "SELECT * FROM coche WHERE 1=1";
        $resultados = [];
        try {
            $db = self::getConection();
            
            //Si hay filtro de color
            if(isset($data['color'])){
                $sql .= " AND color LIKE :color";
            }

            $stm = $db->prepare($sql);

            //Bindeamos el parametro del color si hay filtro
            if(isset($data['color'])){
                $stm->bindValue(':color',"%".$data['color']."%",PDO::PARAM_STR);
            }

            $stm->execute();
            foreach ($stm as $row) {
                $resultados[]=self::rowToVO($row);
            }


        } catch (PDOException $th) {
            error_log("Error accediendo a Coches:".$th->getMessage());
        }finally{
            $db=null;
        }

        return $resultados;
    }

      public static function rowToVO(array $row):CocheVO
    {
        return new CocheVO(
            isset($row['matricula'])?$row['matricula']:null,
            isset($row['marca'])?$row['marca']:null,
            isset($row['modelo'])?$row['modelo']:null,
            isset($row['color'])?$row['color']:null
        );
    }
}

?>