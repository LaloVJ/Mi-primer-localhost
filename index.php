<?php
require('connection.php');

$sql = "SELECT id, nom, ape FROM talumno ORDER BY id DESC";
$rta = executeQuery($sql);			
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <div>
        <form action="buscar.php" method="post">
            <input type="text" name="buscar" id="">
            <input type="submit" value="Buscar">
            <a href="nuevo.php">Nuevo</a>
        </form>    
    </div>

    <div>
        <a href="dynamic/index.php">Go to Dynamic version</a>
        <table>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Apellidos</td>
            </tr>
            <?php
                while ($mostrar = mysqli_fetch_assoc($rta)) {
                ?>
                
                <tr>
                    <td><?php echo $mostrar['id']; ?></td>
                    <td><?php echo $mostrar['nom']; ?></td>
                    <td><?php echo $mostrar['ape']; ?></td>

                    <td>
                        <a href="editar.php?id=<?= $mostrar['id'] ?>">
                            Editar
                        </a>
                        
                        <a href="eliminar.php?id=<?= $mostrar['id'] ?>">
                            Eliminar
                        </a>
                    </td>
                </tr>
                
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
