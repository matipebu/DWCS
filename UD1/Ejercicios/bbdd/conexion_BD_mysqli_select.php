<?php
function getClients(){
    //1.Establecer conexion



    
$db = new mysqli("mariadb","usuarioBD","abc123","mi_base_de_datos");
if($db->connect_error){
    echo "Se ha producido un error";
    die();

}


//2.Realizar operaciones
$sql="SELECT id_cliente,nombre,telefono FROM clientes";
$resultado=$db->query($sql);
var_dump($resultado);


//3.Cerrar conexion.
$db->close();
return $resultado;
}
$cursor = getClients();
while($fila = $cursor->fetch_array()){
    echo"<li>", $fila("nombre"),"(",$fila["telefono"],")";
}
echo "</ul>";
?>