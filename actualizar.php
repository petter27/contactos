<?php

if(isset($_GET["nombre"])){
    $nombre=$_GET["nombre"];
}

if(isset($_GET["numero"])){
    $numero=$_GET["numero"];
}

if(isset($_GET["id"])){
    $id=$_GET["id"];
}


try{
    require_once("funciones/bd_conexion.php");
$sql="UPDATE contactos SET nombre='{$nombre}', telefono='{$numero}' WHERE id ={$id}";
    $resultado=$conn->query($sql);
}catch (Exception $e){
    $error=$e.getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda PHP</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor">
        <h1>Agenda de contactos</h1>

        <div class="contenido">
            <?php 
            if($resultado){
                echo "Contacto actualizado exitosamente";
            }else{
                echo "Error ". $conn->error;
            }
            ?>
            <br>
            <a href="index.php" class="volver">Volver a inicio</a>
        </div>
    </div>

    <?php 
   $conn->close();
    ?>
</body>
</html>