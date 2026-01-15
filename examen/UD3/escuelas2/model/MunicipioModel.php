<?php
namespace model;

use model\vo\EscuelaVO;
use PDOException;
use PDO;

class MunicipioModel extends Model
{
    public static function getFilter(?array $data = null): array
    {
        $sql = "SELECT * from escuela WHERE 1 = 1";
        $resultados=[];
        try {
            //Base de datos
            $db = self::getConnection();

            //Manejo de Filtros
            if (isset($data['nombre'])) {
                $sql .= " AND nombre LIKE :nombre";
            }
            if (isset($data['cod_municipio'])) {
                $sql .= " AND cod_municipio = :cod_municipio";
            }
            if (isset($data['comedor'])) {
                $sql .= " AND comedor = :comedor";
            }

            //Preparamos consulta
            $stm = $db->prepare($sql);

            if (isset($data['nombre'])) {
                $stm->bindValue(':nombre', $data['nombre'],PDO::PARAM_STR);
            }
            if (isset($data['cod_municipio'])) {
                $stm->bindValue(':cod_municipio', $data['cod_municipio'],PDO::PARAM_INT);
            }
            if (isset($data['comedor'])) {
                $stm->bindValue( ':comedor', $data['comedor'],PDO::PARAM_STR);
            }
            
            $stm->execute();

            foreach ($stm as $row) {
                $resultados[]=self::rowToVO($row);
            }

        } catch (PDOException $th) {
            error_log("Error accediendo a la base de datos. " . $th->getMessage());        
        }finally{
            $stm->closeCursor();
            $db = null;
        }
        return $resultados;
    }
    



    public static function rowToVo ($row):EscuelaVO
    {
        return new EscuelaVO(
            (int) $row['cod_escuela'],
            $row['nombre'],
            $row['direccion'],
            (int) $row['cod_municipio'],
            $row['hora_apertura'],
            $row['hora_cierre'],
            $row['comedor'] == 'S' ? true : false 
        );
    }
}

?>