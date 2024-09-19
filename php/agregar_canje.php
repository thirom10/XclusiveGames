<?php
session_start();

if (isset($_POST['canjear'])) {
    $idUsuario = $_POST['id_usuario'];
    $idAccesorio = $_POST['id_accesorio'];

    require_once("conexion.php");

    $sql = "SELECT * FROM accesorios WHERE id_accesorio = $idAccesorio";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();
        $puntosRequeridos = $fila['puntos_requeridos'];

        // Verificar si el usuario tiene suficientes puntos para canjear
        $idUsuario = $con->real_escape_string($_POST['id_usuario']);
$sqlPuntos = "SELECT coins FROM usuarios WHERE id_usuario = '$idUsuario'";

        $resultPuntos = $con->query($sqlPuntos);

        if ($resultPuntos->num_rows > 0) {
            $filaPuntos = $resultPuntos->fetch_assoc();
            $coinsUsuario = $filaPuntos['coins'];

            if ($coinsUsuario >= $puntosRequeridos) {
                // Realizar el canje y registrar en la tabla "canjes"
                $sqlCanje = "INSERT INTO canjes (id_usuario, id_accesorio, total) VALUES ('$idUsuario', '$idAccesorio', '$puntosRequeridos')";
                $con->query($sqlCanje);

                // Descontar los puntos del usuario
                $sqlDescuento = "UPDATE usuarios SET coins = coins - $puntosRequeridos WHERE id_usuario = '$idUsuario'";
                $con->query($sqlDescuento);

                header("Location: ../home.php");
                exit();
            } else {
                echo "Error: No tienes suficientes puntos para canjear este accesorio.";
            }
        }
    }
}
?>
