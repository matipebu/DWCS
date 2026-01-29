<?php
namespace Ejercicios\Musica\Model;

use Ejercicios\musica\model\vo\DiscoVo;
use PDO;
use PDOException;

class DiscoModel extends Model
{
    public static function getDiscosByBanda(int $idBanda){
        $sql = "SELECT * FROM disco WHERE id_banda = :id";
        $resultados =[];
          try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$idBanda,PDO::PARAM_INT);
            $stm->execute();
            foreach($stm as $row){
              $resultados[]=self::rowToVo($row);
            }
            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al obtener discos'.$th->getMessage());
        }finally{
            $db = null;
        }
        return $resultados;
    }
    
    public static function getDiscos(){
        $sql = "SELECT * FROM disco";
        $resultados = [];
        try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            foreach ($stm as $row) {
                $resultados[] = self::rowToVo($row);
            }

        } catch (PDOException $th) {
            error_log('Ha ocurido un error al obtener discos'.$th->getMessage());
        }finally{
            $db = null;
        }
        return $resultados;
    
    }
    public static function getDiscoById(int $idDisco): DiscoVo{
       $sql = "SELECT * FROM disco WHERE id = :id";
           try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$idDisco,PDO::PARAM_INT);
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al obtener disco'.$th->getMessage());
        }finally{
            $db = null;
        }
        return self::rowToVo($row);

    }

    public static function addDiscoBanda(DiscoVo $d){
      $sql = "INSERT INTO disco (titulo,anho,id_banda)
                VALUES (:titulo,:anho,:id_banda)";
        try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':titulo',$d->getTitulo());
            $stm->bindValue(':anho',$d->getAnho());
            $stm->bindValue(':id_banda',$d->getId_banda(),PDO::PARAM_INT);
            if($stm->execute()){
                $id = $db->lastInsertId();
            }

            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al añadir un disco'.$th->getMessage());
        }finally{
            $db = null;
        }
        return self::getDiscoById($id);
    }

    public static function modDiscoById(DiscoVo $d){
       if ($d->getId() === null)
            return false;


        $sql = "UPDATE disco SET
                    titulo = :titulo,
                    anho = :anho,
                    id_banda = :id_banda,
                WHERE id = :id";
        $result = false;
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(":titulo", $d->getTitulo());
            $stmt->bindValue(":anho", $d->getAnho());
            $stmt->bindValue(":id_banda", $d->getId_banda());
            $stmt->bindValue(":id", $d->getId());

            $result = $stmt->execute();
        } catch (PDOException $th) {
            error_log("Error actualizando un disco en la BD. " . $th->getMessage());
        } finally {
            $db = null;
        }

        return $result ? self::getDiscoById($d->getId()):false;

        
    }
    public static function delDiscoById(int $id){
      $sql = "DELETE FROM banda WHERE id = :id";
           try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_INT);
            $result = $stm->execute();
            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al eliminar disco'.$th->getMessage());
        }finally{
            $db = null;
        }
        return $result;
        
    }

    public  static function rowToVo(array $row){
        return new DiscoVo($row['id'],$row['titulo'],
                            $row['anho'],
                            $row['id_banda']);

    }

}