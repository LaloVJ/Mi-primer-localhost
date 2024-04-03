<?php
require('../connection.php');
echo "proces file!!<br><pre>";

print_r($_SERVER);
print_r($_POST);
print_r($_REQUEST);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    print_r($_POST);
    executeQuery("INSERT INTO talumno (nom, ape) 
        VALUES ('" . 
        $_POST['nuevoNombre'] . "', '" . $_POST['nuevoApellido'] . 
        "')");

    die(json_encode(['saved' => true]));
}

//if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
  if($_POST[0]['name'] == 'id') {


    print_r($_PUT);
    $id = $_PUT[0]['value'];
    $nuevoNombre = $_PUT[1]['value']; // ['nuevoNombre'];
    $nuevoApellido = $_PUT[2]['value']; //['nuevoApellido'];

    $sql = "UPDATE talumno SET nom='$nuevoNombre', ape='$nuevoApellido' WHERE id=$id";
    //mysqli_query($cnx, $sql);
    executeQuery($sql);
    // header("Location: index.php");
    // exit();
    die(json_encode(['edited' => true]));
}