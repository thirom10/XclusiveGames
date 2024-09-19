<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras hechas</title>
    <link rel="stylesheet" href="css/compras.css">
</head>
<body>
    <?php
        include("importar/navbar.php");
    ?>
    <main>
    <br>
        <h2 class="titulo">Compras hechas</h2>
        <section class="tabla-user">
            <?php
            include_once("php/conexion.php");

            $consulta = "SELECT * FROM transacciones";
            $resultado = mysqli_query($conexion, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                echo "<table class='tabla'>";
                echo "<tr><th>Id de compra</th><th>Id del juego</th><th>id usuario</th><th>Cantidad</th><th>total pagado</th><th>Metodo de pago</th><th>XclusiveCoins ganados</th><th>Fecha de la compra</th></tr>";

                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id_transaccion'] . "</td>";
                    echo "<td><a href='../pagina/detalles.php?id=". $fila['id_producto'] ."'>" . $fila['id_producto'] . "</a></td>";
                    echo "<td>". $fila["id_usuario"] . "</td>";
                    echo "<td>" . $fila['cantidad'] . "</td>";
                    echo "<td>". $fila['total'] ."</td>";
                    echo "<td>". $fila["pago"] . "</td>";
                    echo "<td>". $fila["coins_g"] . "</td>";
                    echo "<td>". $fila["fecha_compra"] . "</td>";
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