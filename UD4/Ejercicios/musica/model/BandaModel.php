<?php
namespace Ejercicios\musica\model;

use Ejercicios\musica\model\vo\BandaVo;
use PDOException;
use PDO;

class BandaModel extends Model
{
    public static function getBandas(): array
    {
        $sql = "SELECT * FROM bandas";
        $resultados = [];
        try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            foreach ($stm as $row) {
                $resultados[] = self::rowToVo($row);
            }

        } catch (PDOException $th) {
            error_log('Ha ocurido un error al obtener bantas'.$th->getMessage());
        }finally{
            $db = null;
        }
        return $resultados;

    }
    public static function getBandaById(int $id){
        $sql = "SELECT * FROM bandas WHERE id = :id";
           try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_INT);
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al obtener bantas'.$th->getMessage());
        }finally{
            $db = null;
        }
        return self::rowToVo($row);

    }
        
    public static function addBanda(BandaVo $banda){
        $sql = "INSERT INTO banda (nombre,num_integrantes,genero,nacionalidad)
                VALUES (:nombre,:num_integrantes,:genero,:nacionalidad)";
        try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':nombre',$banda->getNombre(),PDO::PARAM_INT);
            $stm->bindValue(':num_integrantes',$banda->getNum_integrantes(),PDO::PARAM_INT);
            $stm->bindValue(':genero',$banda->getGenero(),PDO::PARAM_INT);
            $stm->bindValue(':nacionalidad',$banda->getNacionalidad(),PDO::PARAM_INT);
            if($stm->execute()){
                $id = $db->lastInsertId();
            }

            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al obtener bantas'.$th->getMessage());
        }finally{
            $db = null;
        }
        return self::getBandaById($id);
    }

    public static function modBandaById(BandaVo $banda){
        if ($banda->getId() === null)
            return false;


        $sql = "UPDATE banda SET
                    nombre = :nombre,
                    num_integrantes = :num_integrantes,
                    genero = :genero,
                    nacionalidad = :nacionalidad
                WHERE id = :id";
        $result = false;
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(":nombre", $banda->getNombre());
            $stmt->bindValue(":num_integrantes", $banda->getNum_integrantes());
            $stmt->bindValue(":genero", $banda->getGenero());
            $stmt->bindValue(":nacionalidad", $banda->getNacionalidad());
            $stmt->bindValue(":id", $banda->getId());

            $result = $stmt->execute();
        } catch (PDOException $th) {
            error_log("Error actualizando una banda en la BD. " . $th->getMessage());
        } finally {
            $db = null;
        }

        return $result ? self::getBandaById($banda->getId()):false;

        
    }
    public static function delBandaById(int $id){
        $sql = "DELETE FROM banda WHERE id = :id";
           try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_INT);
            $result = $stm->execute();
            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al eliminar bandas'.$th->getMessage());
        }finally{
            $db = null;
        }
        return $result;
        
    }


    public static function rowToVo(array $row){
        return new BandaVo($row['id'],$row['nombre'],
                            $row['num_integrantes'],
                            $row['genero'],$row['nacionalidad']);

    }

}