<?php
require('../connection.php');

// $sql = "SELECT id, nom, ape FROM talumno ORDER BY id DESC";
// $rta = executeQuery($sql);		

// $cnx = mysqli_connect("localhost", "pma", "123456", "milocalhostoscar");

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $id = $_POST['id'];
//     $nuevoNombre = $_POST['nuevoNombre'];
//     $nuevoApellido = $_POST['nuevoApellido'];

//     $sql = "UPDATE talumno SET nom='$nuevoNombre', ape='$nuevoApellido' WHERE id=$id";
//     //mysqli_query($cnx, $sql);
//     executeQuery($sql);
//     header("Location: index.php");
//     exit();
// }

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, nom, ape FROM talumno WHERE id = $id";
    //$rta = mysqli_query($cnx, $sql);
    $rta = executeQuery($sql);
    $alumno = mysqli_fetch_assoc($rta);
} else {
    header("Location: index.php");
    exit();
}
?>
<h2>Editar Alumno</h2>
<form action="process.php" method="PUT" class="edit-form">
    <!-- Añadir campos ocultos para enviar el ID -->
    <input type="hidden" name="id" value="<?php echo $alumno['id']; ?>">

    <label for="nuevoNombre">Nombre:</label>
    <input type="text" name="nuevoNombre" value="<?php echo $alumno['nom']; ?>" required>

    <label for="nuevoApellido">Apellidos:</label>
    <input type="text" name="nuevoApellido" value="<?php echo $alumno['ape']; ?>" required>

    <input type="submit" value="Guardar Cambios">
</form>
<a class="jq-link" href="list.php">Volver a la lista</a>
<script>
    $('.edit-form').submit(function(e){
        e.preventDefault();
        var dataForm = $(this).serializeArray();

        console.log(dataForm);

        console.log('editing');

        $.ajax({
            url: 'process.php',
            data: JSON.stringify(dataForm),
            method: 'POST',
            
            success: function(jsonResp){
                //console.log(jsonResp);
                setTimeout(function(){
                    $('.jq-link').click();
                },1500);                
            },
            dataType: 'json'
        });
    });
</script>