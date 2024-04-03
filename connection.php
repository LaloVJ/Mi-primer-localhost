<?php
function executeQuery($sql)
{
    // Establecer las credenciales de la base de datos
    // $user    = "pma"; // Usuario de la base de datos (cambia si es diferente)
    // $pass    = "123456"; // Contraseña de la base de datos (cambia si es diferente)
    // $dbname  = "milocalhostoscar"; // Nombre de la base de datos que creaste en phpMyAdmin

    $user    = "root"; // Usuario de la base de datos (cambia si es diferente)
    $pass    = ""; // Contraseña de la base de datos (cambia si es diferente)
    $dbname  = "first_project"; // Nombre de la base de datos que creaste en phpMyAdmin

    // Conexión a la base de datos
    $connect = mysqli_connect("localhost", $user, $pass, $dbname);

    // Verificar la conexión
    if (!$connect) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }
    
    // Ejecutar la consulta y devolver el resultado
    return mysqli_query($connect, $sql);
}
?>