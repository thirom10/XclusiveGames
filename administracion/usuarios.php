<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/usuarios.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <?php
        include('importar/navbar.php');
    ?>
    <main>
        <br>
        <h2 class="titulo">Usuarios ingresados</h2>
        <section class="tabla-user">
            <?php
            include_once("php/conexion.php");

            $consulta = "SELECT * FROM usuarios";
            $resultado = mysqli_query($conexion, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                echo "<table class='tabla'>";
                echo "<tr><th>Id de usuario</th><th>Nombre completo</th><th>XclusiveCoins</th><th>Compras realizadas</th><th>Puntos Canjeados</th></tr>";

                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id_usuario'] . "</td>";
                    echo "<td>" . $fila['nombre_com'] . "</td>";
                    echo "<td>" . $fila['coins'] . "</td>";

                    $idUsuario = $fila['id_usuario'];

                    $consultaJuegos = "SELECT COALESCE(COUNT(*), 0) as cantidad FROM transacciones WHERE id_usuario = '$idUsuario'";
                    $resultadoJuegos = mysqli_query($conexion, $consultaJuegos);

                    if ($resultadoJuegos) {
                        $filaJuegos = mysqli_fetch_assoc($resultadoJuegos);
                        $cantidadJuegosComprados = $filaJuegos['cantidad'];
                        echo "<td><a href='#'>$cantidadJuegosComprados</a></td>";
                    }

                    $idUuario = $fila['id_usuario'];

                    $consultaAcc = "SELECT COALESCE(COUNT(*), 0) as cantidad FROM canjes WHERE id_usuario = '$idUsuario'";
                    $resultadoAcc = mysqli_query($conexion, $consultaAcc);

                    if ($resultadoAcc) {
                        $filaAcc = mysqli_fetch_assoc($resultadoAcc);
                        $cantidaddeAcc = $filaAcc['cantidad'];
                        echo "<td><a href='#'>$cantidaddeAcc</a></td>";
                    }
                    
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No se encontraron resultados.";
            }
            ?>
        </section>
    </main>
</body>
</html>
