<?php
session_start();

if (isset($_POST['confirmarCompra'])) {
    $idUsuario = $_POST['id_usuario'];
    $formaPago = $_POST['formaPago'];
    $totalCompra = $_POST['totalCompra'];

    require_once("conexion.php");

    $sql = "INSERT INTO transacciones (id_usuario, pago, total_compra, id_producto, cantidad, total, coins_g) VALUES ";
    
    $query = "SELECT productos.*, carrito.cantidad
              FROM productos
              INNER JOIN carrito ON productos.id_producto = carrito.id_producto
              WHERE carrito.id_usuario = '$idUsuario'";

    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $values = array();
        while ($fila = $result->fetch_assoc()) {
            $idProducto = $fila['id_producto'];
            $cantidadProducto = $fila['cantidad'];
            $totalProducto = $fila['precio'] * $cantidadProducto;
            $coinsProducto = $fila['coins'];

            $values[] = "('$idUsuario', '$formaPago', '$totalCompra', '$idProducto', '$cantidadProducto', '$totalProducto', '$coinsProducto')";
            $totalCoins += $coinsProducto;
        }

        $sql .= implode(", ", $values);

        $con->query($sql);

        $coins = "UPDATE usuarios SET coins = coins + $totalCoins WHERE id_usuario = '$idUsuario'";
        $con->query($coins);
    }

    $borra = "DELETE FROM carrito WHERE id_usuario = '$idUsuario'";
    $con->query($borra);

    header("Location: confirmacion.php");
    exit();
}
?>

