<?php
require('../connection.php');

$sql = "SELECT id, nom, ape FROM talumno ORDER BY id DESC";
$rta = executeQuery($sql);			
?>
<h2>Alumnos List</h2>
<a class="jq-link" href="add.php">Nuevo</a>
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
                <a class="jq-link" href="edit.php?id=<?= $mostrar['id'] ?>">
                    Editar
                </a>
                
                <a  class="jq-link" href="delete.php?id=<?= $mostrar['id'] ?>">
                    Eliminar
                </a>
            </td>
        </tr>
        
        <?php
    }
    ?>
</table>