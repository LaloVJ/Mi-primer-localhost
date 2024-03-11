<?php
require('connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    executeQuery("INSERT INTO talumno (nom, ape) 
        VALUES ('" . 
        $_POST['nuevoNombre'] . "', '" . $_POST['nuevoApellido'] . 
        "')");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Alumno</title>
</head>
<body>
    <h2>Nuevo Alumno</h2>
    <form action="" method="post">
        <label for="nuevoNombre">Nombre:</label>
        <input type="text" name="nuevoNombre" required>

        <label for="nuevoApellido">Apellidos:</label>
        <input type="text" name="nuevoApellido" required>

        <input type="submit" value="Agregar">
    </form>
</body>
</html>
