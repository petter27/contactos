<?php

try{
    require_once("funciones/bd_conexion.php");
    $sql="SELECT * FROM contactos;";
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
        <div id="crear_contacto" class="crear">
            <h2>Nuevo contactos</h2>
            <form action="crear.php" method="POST" id="formulario_crear_usuario">
                <div class="campo">
                    <label for="nombre">Nombre
                        <input type="text" name="nombre" id="nombre" placeholder="nombre">
                    </label>
                </div>
                <div class="campo">
                    <label for="numero">Numero
                        <input type="text" name="numero" id="numero" placeholder="numero">
                    </label>
                </div>
                <input type="submit" value="Agregar" id="agregar" class="boton">
            </form>
        </div>
        </div>
        <div class="contenido existentes">
            <h2>Contactos existentes</h2>
            <p>Numero de contactos: <?php echo $resultado->num_rows; ?></p>

            <table id="registrados">
                <thead>
                    <tr>    
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Editar</th>
                        <th><button type="button" name="Borrar" id="btn_borrar" class="borrar">Borrar</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($registros=$resultado->fetch_assoc()){ ?>

                        <tr>
                        <td><?php echo $registros['nombre']; ?></td>
                        <td><?php echo $registros['telefono']; ?></td>
                        <td><a href="editar.php?id=<?php echo $registros['id']; ?>">Editar</a></td>
                        <td class="borrar">
                            <input type="checkbox" class="borrar_contacto" name="<?php echo $registros['id']; ?>">
                        </td>
                        </tr>
                 <?php   } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    $conn->close();
    ?>

<script src="js/app.js"></script>

</body>
</html>