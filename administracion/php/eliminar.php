<?php
session_start();
require_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    $sql_delete = "DELETE FROM productos WHERE id_producto = $id_producto";
     $conexion->query($sql_delete);

    echo "Producto eliminado correctamente";
}else {
    echo 'algo no va';
}
?>
