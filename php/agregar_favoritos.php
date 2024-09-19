<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $id_producto = $_POST['id_producto'];

    require_once("conexion.php");

    

    // verificar si ya existe la entrada en la tabla favoritos
    $verificarFavoritoQuery = "SELECT * FROM favoritos WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
    $verificarFavoritoResult = $con->query($verificarFavoritoQuery);

    
    if ($verificarFavoritoResult->num_rows == 0) {
        // si no existe, añadir a favoritos
        $agregarFavoritoQuery = "INSERT INTO favoritos (id_usuario, id_producto) VALUES ('$id_usuario', '$id_producto')";
        $con->query($agregarFavoritoQuery);

        $_SESSION['ultima_pagina'] = $_SERVER['HTTP_REFERER'];
        header("Location: " . $_SESSION['ultima_pagina']);
    } else {
        // si ya existe, eliminar de favoritos
        $eliminarFavoritoQuery = "DELETE FROM favoritos WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
        $con->query($eliminarFavoritoQuery);

        $_SESSION['ultima_pagina'] = $_SERVER['HTTP_REFERER'];
    header("Location: " . $_SESSION['ultima_pagina']);
    }


}
?>
