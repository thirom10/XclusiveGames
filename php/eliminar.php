<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    require_once("conexion.php");

    $id_usuario = $con->real_escape_string($id_usuario);
    $id_producto = $con->real_escape_string($id_producto);
    $cantidad = $con->real_escape_string($cantidad);

    // verificar si ya existe un registro para el usuario y producto
    $check_query = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
    $check_result = $con->query($check_query);

    if ($check_result->num_rows > 0) {
        // si ya existe, realiza la actualización o eliminación segun el boton presionado
        if (isset($_POST['eliminar_cantidad'])) {
            $nueva_cantidad = $check_result->fetch_assoc()['cantidad'] - $cantidad;

            // si la cantidad es menor o igual a 0, elimina el producto del carrito
            if ($nueva_cantidad <= 0) {
                $delete_query = "DELETE FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
                
                if ($con->query($delete_query) === TRUE) {
                    $_SESSION['ultima_pagina'] = $_SERVER['HTTP_REFERER'];
                    header("Location: " . $_SESSION['ultima_pagina']);  
                } else {
                    echo "Error al eliminar el producto del carrito: " . $con->error;
                }
            } else {
                $update_query = "UPDATE carrito SET cantidad = $nueva_cantidad WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
                
                if ($con->query($update_query) === TRUE) {
                    $_SESSION['ultima_pagina'] = $_SERVER['HTTP_REFERER'];
                header("Location: " . $_SESSION['ultima_pagina']);
                } else {
                    echo "Error al actualizar la cantidad en el carrito: " . $con->error;
                }
            }
        } elseif (isset($_POST['eliminar_producto'])) {
            $delete_query = "DELETE FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
            
            if ($con->query($delete_query) === TRUE) {
                $_SESSION['ultima_pagina'] = $_SERVER['HTTP_REFERER'];
                header("Location: " . $_SESSION['ultima_pagina']);
            } else {
                echo "Error al eliminar el producto del carrito: " . $con->error;
            }
        }
    } else {
        echo "El producto no está en el carrito.";
    }

}
?>