<?php
session_start();
require_once("../php/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['canjear'])) {
    $idUsuario = $_SESSION['id_usuario'];
    $id_accesorio = $_GET['id_acc'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coins</title>
    <link rel="stylesheet" href="../css/coins.css">
</head>
<body>
    <?php
        include("../src/navbar.php");
    ?>

    <main>
        <br><br><br>
    <div class="atras">
    <h2 onclick="atras()"><i class="fa-solid fa-arrow-rotate-left"></i> volver</h2>
    </div>
        <div class="todo">
            <?php
                if (isset($_GET['id_acc'])) {
                $id = $_GET['id_acc'];
                $sql = "SELECT * FROM accesorios WHERE id_accesorio = $id";
                $resultado = $con->query($sql);
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                    echo '<div class="container">';
                        echo '<div class="puntos-img">';
                            echo '<img src="accesorios/'. $fila['img_acc'] .'" alt="">';
                        echo '</div>';
                        echo '<div class="info">';
                            echo '<div class="titulo-desc">';
                                echo '<h2>'. $fila['nombre_acc'] .'</h2>';
                                echo '<span>'. $fila['detalles'] .'</span>';
                            echo '</div>';
                            echo '<form action="" method="post">';
                            echo '<div class="puntos">';
                                echo '<img src="media/coins.png" alt="">';
                                $puntosTotales = $fila['puntos_requeridos'];
                                echo '<input  name="coins" value=" '. $puntosTotales .' ">';
                            echo '</div>';
                            echo '<div class="btn-reclamar">';
                                echo '<input type="submit" name="canjear" value="reclamar">';
                            echo '</div>';
                            echo '</form>';
                        echo '</div>';
                    echo '</div>';
                    }
                }
                }
            ?>
            <form action="../php/agregar_canje.php" method="post">
    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
    <input type="hidden" name="id_accesorio" value="<?php echo $id; ?>">
    <input type="submit" name="canjear" value="Canjear Accesorio">
</form>

        </div>
    </main>

    <footer>
        <?php
            include("../src/footer.php");
        ?>
    </footer>
    <script>
        function atras(){
            window.history.back();
        }
    </script>
</body>
</html>