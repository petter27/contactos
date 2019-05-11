<?php
    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }

try{
    require_once("funciones/bd_conexion.php");
    $sql="SELECT * FROM contactos where id=$id";
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
            <h2>Editar contacto</h2>
            <?php while($registro=$resultado->fetch_assoc()){?>
            <form action="actualizar.php" method="GET">
                <div class="campo">
                    <label for="nombre">Nombre
                        <input type="text" name="nombre" id="nombre" value="<?php echo $registro["nombre"]; ?>"  placeholder="nombre">
                    </label>
                </div>
                <div class="campo">
                    <label for="numero">Numero
                        <input type="text" name="numero" id="numero" value="<?php echo $registro["telefono"]; ?>"  placeholder="numero">
                    </label>
                </div>
                <input type="hidden" name="id" value="<?php echo $registro["id"]; ?>">
                <input type="submit" value="Actualizar">
            <?php } ?>
            </form>
        </div>
      

    </div>

    <?php
    $conn->close();
    ?>
</body>
</html>