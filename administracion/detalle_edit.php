<?php
$productoId = $_GET['id'];
require_once("php/conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['editarDetalles'])) {
        //$nuevoNombre = $_POST['nuevoNombre'];
        $nuevoPrecio = $_POST['nuevoPrecio'];
        $nuevoResumen = $_POST['nuevoResumen'];
        $nuevoPeso = $_POST['nuevoPeso'];
        $nuevaDesarrolladora = $_POST['nuevaDesarrolladora'];
        $nuevoGenero = $_POST['nuevoGenero'];
        $nuevaFechaLanzamiento = $_POST['nuevaFechaLanzamiento'];
        $nuevaConsola = $_POST['nuevaConsola'];

        $editar = "UPDATE productos SET 
        precio = '$nuevoPrecio',
        resumen = '$nuevoResumen',
        peso = '$nuevoPeso',
        desarrolladora = '$nuevaDesarrolladora',
        genero = '$nuevoGenero',
        fecha_lanzamiento = '$nuevaFechaLanzamiento',
        consola = '$nuevaConsola',
    WHERE id_producto = $productoId";

        $conexion->query($editar);

        header("Location: ../detalles.php?id=$productoId");
        exit();
    }else {
        echo 'no funciona el boton';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/detalles.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <?php
        include('importar/navbar.php');
    ?>

    <main>
        
        <div class="atras">
            <h2 onclick="atras()"><i class="fa-solid fa-arrow-rotate-left"></i> volver</h2>
        </div>

        <section class="compra-container">
            <div class="details-container">
                <?php
                require_once("php/conexion.php");
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM productos WHERE id_producto = $id";
                    $resultado = $conexion->query($sql);
                    if ($resultado->num_rows > 0) {
                        $fila = $resultado->fetch_assoc();
                        $nombreProducto = $fila['nombre'];
                        echo '<form method="post" action="">';
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
                                    echo '<div class="resumen">';
                                        echo '<textarea style="background-color:#252425; color:#fff; outline:none; border:none;" cols="80" rows="15" name="nuevoResumen"> '. $fila['resumen'] .' </textarea>';
                                    echo '</div>';
                                    echo '<h3>Caracteristicas:</h3>';
                                    echo '<label>nuevo peso: </label>';
                                    echo '<input type="text" name="nuevoPeso" value="' . $fila['peso'] . 'Gb">';
                                    echo '<br>';
                                    echo '<lable>nuevo desarrolladora: </label>';
                                    echo '<input name="nuevaDesarrolladora" value="' . $fila['desarrolladora'] . '">';
                                    echo '<br>';
                                    echo '<label>nuevo genero: </label>';
                                    echo '<input name="nuevoGenero" value= "Genero: '. $fila['genero'] .'">';
                                    echo '<br>';
                                    echo '<label>nueva fecha</label>';
                                    echo '<input type="date" name="nuevaFechaLanzamiento" value=" Fecha de lanzamiento: ' . $fila['fecha_lanzamiento'] . '  ">';
                                    echo '<br>';
                                    echo '<label>nueva consola: </label>';
                                    echo '<input type="text" name="nuevaConsola" value=" ' . $fila['consola'] . ' " >';
                                    echo '</div>';
                                echo '<div class="right-box">';
                                echo '<div class="puntos">';   
                                $puntos = $fila['precio'] * 0.10;
                                echo '<img src="media/coins.png">';
                                echo '<h2>'. $puntos .' puntos</h2>';
                                echo '</div>';
                                echo '  <label for="nuevoPrecio">Nuevo Precio:</label>';
                                echo '  <input type="text" name="nuevoPrecio" value="' . $fila['precio'] . '">';
                                    echo '<h2>Formas de pago:</h2>';
                                    echo '<div class="pagos">';
                                        echo '<img src="media/Mercado-pago-1024x267.png" alt="Mercado Pago">';
                                        echo '<img src="media/uala.png" alt="uala">';
                                        echo '<form action="php/comprar.php" method="post">';
                                            echo '<input type="hidden" name="id_producto" value="' . $fila['id_producto'] . '">';
                                            echo '<br>';
                                            echo '<label>nuevo stock: </label>';
                                            echo '<input type="text" name="nuevoStock" value=" Stock disponibles: '. $fila['stock'] .' ">';
                                            echo '<br>';
                                            echo '<div class="cantidad">';
                                                echo '<p>Cantidad: </p>';
                                                echo '<input type="number" name="cantidad" value="1" min="1" max="' . $fila['stock'] . '">';
                                            echo '</div>';
                                            echo '<button class="btn-comprar" type="submit" name="comprar">Comprar</button>';
                                        echo '</form>';
                                    echo '</div>';
                                    echo '  <input type="submit" name="editarDetalles" value="Guardar Cambios">';
                                echo '</div>';
                            echo '</div>';
                        echo '</form>';
                    } else {
                        echo "No se encontró información para el juego seleccionado.";
                    }
                } else{
                    echo "ID de juego no proporcionado.";
                }
            ?>
        </section>
    </main>


<script src="js/detalles.js"></script>
<script>
    function atras(){
        window.history.back();
    }
</script>
</body>
</html>
