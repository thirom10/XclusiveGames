<?php
require_once("conexion.php");

$productoId = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['editarDetalles'])) {
        // Obtener los nuevos valores del formulario
        //$nuevoNombre = $_POST['nuevoNombre'];
        $nuevoPrecio = $_POST['nuevoPrecio'];
        $nuevoResumen = $_POST['nuevoResumen'];
        $nuevoPeso = $_POST['nuevoPeso'];
        //$nuevaDesarrolladora = $_POST['nuevaDesarrolladora'];
        //$nuevoGenero = $_POST['nuevoGenero'];
        //$nuevaFechaLanzamiento = $_POST['nuevaFechaLanzamiento'];
        //$nuevaConsola = $_POST['nuevaConsola'];
        //$nuevosPuntos = $_POST['nuevosPuntos'];

        // Actualizar los detalles del producto en la base de datos
        $actualizarDetallesQuery = "UPDATE productos SET 
      
            precio = '$nuevoPrecio',
            resumen = '$nuevoResumen',
            peso = '$nuevoPeso',
   
            WHERE id_producto = $productoId";

        $conexion->query($actualizarDetallesQuery);

        // Recargar la página para ver los cambios
        header("Location: ../detalles.php?id=$productoId");
        exit();
    }
}
?>