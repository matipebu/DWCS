<?php
function getClients(){
   //1.Establecer conexion
        $dsn="mysql:host=mariadb;dbname=mi_base_de_datos";
    try{
        $db = new PDO($dsn,"usuarioBD","abc123");
    }catch(PDOException $ex){
        echo "Se ha producido un error";
        die();
    }



//2.Realizar operaciones
$sql="SELECT id_cliente nombre, telefono FROM clientes ORDER BY asc ";
//PDOSTATEMENT
$resultado=$db->query($sql);
$datos = $resultado->fetchAll();
var_dump($resultado);

//3.Cerrar conexion.
$resultado->closeCursor();
$db=null;
return $datos;
}


$cursor = getClients();
while($fila = $cursor->fetch_array()){
    echo"<li>", $fila("nombre"),"(",$fila["telefono"],")";
}
echo "</ul>";
?>