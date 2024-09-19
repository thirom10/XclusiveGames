<?php
session_start();
$productoId = $_GET['id'];
require_once("../php/conexion.php");

$actualizar = "UPDATE productos SET veces_visto = veces_visto + 1 WHERE id_producto = $productoId";
mysqli_query($con, $actualizar);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/detalles.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <?php
        include('../src/navbar.php');
    ?>

    <main>
        <br><br><br>
        <div class="atras">
            <h2 onclick="atras()"><i class="fa-solid fa-arrow-rotate-left"></i> volver</h2>
        </div>

        <section class="compra-container">
            <div class="details-container">
                <?php
                require_once("../php/conexion.php");
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    
                    $sql = "SELECT * FROM productos WHERE id_producto = $id";
                    $resultado = $con->query($sql);
                    if ($resultado->num_rows > 0) {
                        $fila = $resultado->fetch_assoc();
                        $nombreProducto = $fila['nombre'];
                        echo '<div class="logo-titulo">';
                            echo '<img src="../administracion/php/'. $fila['imagen2'] .'" alt="">';
                        echo '</div>';
                        echo '<div class="port-tra">';
                            echo '<img class="imagen" src="../administracion/php/' . $fila['imagen1'] . '" alt="' . $fila['nombre'] . '">';
                            echo '<div class="trailer">';
                            echo '<iframe width="650" height="355" src="'. $fila['trailer'] .'" title="YouTube video player"
                                 frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                 </iframe>';
                            echo '</div>';
                        echo '</div>';
                            echo '<div class="caracte">';
                                echo '<div class="item-car">';
                                    //echo '<p>Precio: $' . $fila['precio'] . '</p>';
                                    echo '<div class="resumen">';
                                        echo '<p> '. $fila['resumen'] .' </p>';
                                    echo '</div>';
                                    echo '<h3>Caracteristicas:</h3>';
                                    echo '<p>Peso: ' . $fila['peso'] . 'GB</p>';
                                    echo '<p>Desarrolladora: ' . $fila['desarrolladora'] . '</p>';
                                    echo '<p>Genero: '. $fila['genero'] .'</p>';
                                    echo '<p>Fecha de lanzamiento: ' . $fila['fecha_lanzamiento'] . '</p>';
                                    echo '<p>Consola: ' . $fila['consola'] . '</p>';
                                    echo '</div>';
                                echo '<div class="right-box">';
                                echo '<div class="puntos">';   
                                $puntos = $fila['precio'] * 0.10;
                                echo '<img src="../media/coins.png">';
                                echo '<h2>'. $puntos .' puntos</h2>';
                                echo '</div>';
                                echo '<p class="precio"> $ '. $fila['precio'] .' </p>';
                                    echo '<h2>Formas de pago:</h2>';
                                    echo '<div class="pagos">';
                                        echo '<img src="../media/Mercado-pago-1024x267.png" alt="Mercado Pago">';
                                        echo '<img src="../media/uala.png" alt="uala">';
                                        echo '<form action="../php/agregar_carrito.php" method="post">';
                                            echo '<input type="hidden" name="id_producto" value="' . $fila['id_producto'] . '">';
                                            echo '<span> Stock disponibles: '. $fila['stock'] .' </span>';
                                            echo '<br>';
                                            echo '<div class="cantidad">';
                                                echo '<p>Cantidad: </p>';
                                                echo '<input type="number" name="cantidad" value="1" min="1" max="' . $fila['stock'] . '">';
                                            echo '</div>';
                                            echo '<button class="btn-comprar" type="submit" name="comprar">Comprar</button>';
                                        echo '</form>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                    } else {
                        echo "No se encontró información para el juego seleccionado.";
                    }
                } else{
                    echo "ID de juego no proporcionado.";
                }
            ?>
        </section>
    </main>

    <footer>
        <?php
            include('../src/footer.php');
        ?>
    </footer>

<script src="js/detalles.js"></script>
<script>
    function atras(){
        window.history.back();
    }
</script>
</body>
</html>
