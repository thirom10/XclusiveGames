<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST["id_producto"];
    $cantidad = $_POST["cantidad"];
    $id_usuario = $_SESSION['id_usuario']; 

    require_once("conexion.php");

    $id_usuario = $con->real_escape_string($id_usuario);
    $id_producto = $con->real_escape_string($id_producto);

    $check_query = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
    $check_result = $con->query($check_query);

    if ($check_result->num_rows > 0) {
        $update_query = "UPDATE carrito SET cantidad = cantidad + $cantidad WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
        
        if ($con->query($update_query) === TRUE) {
            header("Location: ../paginas/home.php");
        } else {
            echo "Error al actualizar la cantidad en el carrito: " . $con->error;
        }
    } else {
        // si no existe, lo agrega
        $insert_query = "INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES ('$id_usuario', '$id_producto', $cantidad)";

        if ($con->query($insert_query) === TRUE) {
            header("Location: ../paginas/home.php");
        } else {
            echo "Error al añadir producto al carrito: " . $con->error;
        }
    }

} else {
    echo "Acceso no permitido.";
}
?>
