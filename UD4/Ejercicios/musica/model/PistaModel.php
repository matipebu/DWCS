<?php
namespace Ejercicios\Musica\Model;

use Ejercicios\musica\model\vo\PistaVo;
use PDO;
use PDOException;

class PistaModel extends Model
{
    public static function getPistasByDisco(int $idDisco){
        $sql = "SELECT * FROM disco WHERE id_disco = :id";
        $resultados =[];
          try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$idDisco,PDO::PARAM_INT);
            $stm->execute();
            foreach($stm as $row){
              $resultados[]=self::rowToVo($row);
            }
            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al obtener pistas en ese disco'.$th->getMessage());
        }finally{
            $db = null;
        }
        return $resultados;

    }
    public static function getPistaById(int $idDisco,int $numPista){
         $sql = "SELECT * FROM pista WHERE id = :id AND numero = :numero";
           try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$idDisco,PDO::PARAM_INT);
            $stm->bindValue(':numero',$numPista,PDO::PARAM_INT);

            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al obtener la pista'.$th->getMessage());
        }finally{
            $db = null;
        }
        return self::rowToVo($row);
        
    }

    public static function addPistaDisco(PistaVo $p){
        $sql = "INSERT INTO disco (numero,titulo,duracion)
                VALUES (:numero,:titulo,:duracion) WHERE id_disco : id";
        try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':numero',$p->getNumero());
            $stm->bindValue(':titulo',$p->getTitulo());
            $stm->bindValue(':duracion',$p->getDuracion());
            $stm->bindValue(':id',$p->getId_disco());

            if($stm->execute()){
                $id = $db->lastInsertId();
            }

            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al añadir una pista'.$th->getMessage());
        }finally{
            $db = null;
        }
        return self::getPistaById($id,$p->getId_disco());

        
    }
    public static function modPistaDisco(PistaVo $p){
          if ($p->getId_disco() === null || $p->getNumero() )
            return false;


        $sql = "UPDATE pista SET
                    numero = :numero,
                    titulo = :titulo,
                    duracion = :duracion,
                WHERE id_disco = :id";
        $result = false;
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(":numero", $p->getTitulo());
            $stmt->bindValue(":titulo", $p->getTitulo());
            $stmt->bindValue(":duracion", $p->getDuracion());
            $stmt->bindValue(":id", $p->getId_disco());

            $result = $stmt->execute();
        } catch (PDOException $th) {
            error_log("Error actualizando una pista en la BD. " . $th->getMessage());
        } finally {
            $db = null;
        }

        return $result ? self::getPistaById($p->getId_disco(),$p->getNumero()):false;
        
    }
    
    public static function delPistaById(int $id,int $numPista){
         $sql = "DELETE FROM pista WHERE id_disco = :id AND numero = :numero";
           try {
            $db = self::getConnection();
            $stm = $db->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_INT);
            $stm->bindValue(':numero',$numPista,PDO::PARAM_INT);
            $result = $stm->execute();
            
        } catch (PDOException $th) {
            error_log('Ha ocurido un error al eliminar pista'.$th->getMessage());
        }finally{
            $db = null;
        }
        return $result;
        
        
    }
     public static function rowToVo(array $row){
        return new PistaVo($row['id_disco'],$row['numero'],
                            $row['titulo'],
                            $row['duracion']);

    }

}