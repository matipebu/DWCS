
<?php
function addClient($nombre, $telefono){
   //1.Establecer conexion
        $dsn="mysql:host=mariadb;dbname=mi_base_de_datos";
    try{
        $db = new PDO($dsn,"usuarioBD","abc123");
    }catch(PDOException $ex){
        echo "Se ha producido un error";
        die();
    }



//2.Realizar operaciones
$sql="INSERT INTO clientes(nombre, telefono) VALUES ('$nombre','$telefono')";
$resultado=$db->query($sql);
var_dump($resultado);


//3.Cerrar conexion.
$db->close();


}


//Logica para cuando recibo peticiones de datos 
$nombre = $_POST['nombre']??null;
$telefono = $_POST['tel']??null;
$resultado=false;
if(isset($nombre)&&isset($telefono)){
    $resultado = addClient($nombre, $telefono);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($resultado): ?>
     <h1>Cliente Agregado<h1>
    <a href="">agregar nuevo cliente</a>
    <?php else:?>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required><br>
        <label for="tel">TElefono</label>
        <input type="tel" name="tel" required><br>
        <button type="submit">Agregar</button>
    </form>
    <?php endif;?>
</body>
</html>