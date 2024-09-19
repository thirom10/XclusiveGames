<?php
require_once('conexion.php');
$busqueda = $_POST["busqueda"];

$busqueda = $_POST["busqueda"];

$query = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%' ORDER BY nombre LIMIT 4";
$result = $con->query($query);

if ($result->num_rows > 0) {
    while ($fila = $result->fetch_assoc()) {
        echo '<div class="card-bus">';
            echo '<a href="detalles.php?id=' .$fila['id_producto']. '"><img class="card-img-bus" src="../administracion/php/'. $fila['imagen1'] .'"> </a>';
            echo '<h3 class="nombre"><a href="detalles.php?id=' . $fila['id_producto'] . '">' . $fila['nombre'] . '</a></h3>';

        echo '</div>';
    }
} else {
    echo "No se encontraron resultados de $busqueda.";
}
?>