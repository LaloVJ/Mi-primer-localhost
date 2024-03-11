<?php
$cnx = mysqli_connect("localhost", "pma", "123456", "milocalhostoscar");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $buscarNombre = isset($_POST['buscar']) ? $_POST['buscar'] : '';

    if (!empty($buscarNombre)) {
        $sqlNombre = "SELECT id, nom, ape FROM talumno WHERE nom LIKE '%$buscarNombre%'";
        $sqlApellido = "SELECT id, nom, ape FROM talumno WHERE ape LIKE '%$buscarNombre%'";

        $rtaNombre = mysqli_query($cnx, $sqlNombre);
        $rtaApellido = mysqli_query($cnx, $sqlApellido);

        // Inicializar un array para almacenar los resultados combinados
        $resultados = [];

        // Agregar los resultados de la búsqueda por nombre al array
        while ($row = mysqli_fetch_assoc($rtaNombre)) {
            $resultados[] = $row;
        }

        // Agregar los resultados de la búsqueda por apellido al array
        while ($row = mysqli_fetch_assoc($rtaApellido)) {
            $resultados[] = $row;
        }

        if (!empty($resultados)) {
            // Mostrar resultados
            echo "<h2>Resultados de la búsqueda:</h2>";
            echo "<ul>";
            foreach ($resultados as $mostrar) {
                echo "<li>{$mostrar['nom']} {$mostrar['ape']}</li>";
            }
            echo "</ul>";
            echo '<br>';
            echo '<a href="index.php">Volver a la página principal</a>';
        } else {
            // Mostrar mensaje si no se encontraron resultados
            echo "Lo siento, no se encontraron alumnos con el nombre o apellido proporcionado.";
            echo '<br>';
            echo '<a href="index.php">Volver a la página principal</a>';
            echo '<br>';
            echo '<a href="javascript:history.go(-1)">Intentar nuevamente</a>';
        }
    } else {
        // Mostrar mensaje si no se ha proporcionado ningún valor de búsqueda
        echo "Por favor, ingrese un nombre o apellido para buscar.";
        echo '<br>';
        echo '<a href="javascript:history.go(-1)">Volver</a>';
    }
} else {
    // Mostrar mensaje si se intenta acceder directamente a este archivo sin enviar datos de búsqueda
    echo "Acceso no autorizado.";
    echo '<br>';
    echo '<a href="javascript:history.go(-1)">Volver</a>';
}
?>
