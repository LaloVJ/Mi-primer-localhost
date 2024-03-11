<?php
require('connection.php');
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    executeQuery("DELETE FROM talumno WHERE id = " . $_GET['id']);
}

header("Location: index.php");
exit();
?>
