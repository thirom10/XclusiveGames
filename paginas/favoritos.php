<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos Favoritos</title>
    <link rel="stylesheet" href="../css/favoritos.css">
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

        <section class="container">
  <?php


    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        require_once("../php/conexion.php");

        // Asegúrate de validar y sanitizar los datos antes de usarlos en la consulta SQL
        $id_usuario = $con->real_escape_string($id_usuario);

        $query = "SELECT productos.*, favoritos.fecha_agregado
                  FROM productos
                  INNER JOIN favoritos ON productos.id_producto = favoritos.id_producto
                  WHERE favoritos.id_usuario = '$id_usuario'";

        $result = $con->query($query);

        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                echo '<div class="container-productos">';
                echo '<div class="card">';
                echo '<a href="detalles.php?id=' . $fila['id_producto'] . '"><img class="card-img" src="../administracion/php/' . $fila['imagen1'] . '"> </a>';
                echo '<div class="det-card">';
                echo '<div class="nombre-cantidad">';
                echo '<h3 class="nombre"><a href="detalles.php?id=' . $fila['id_producto'] . '">' . $fila['nombre'] . '</a></h3>';
                echo '<span class="card-consola">' . $fila['consola'] . '</span>';
                echo '</div>';
                echo '<div class="info">';
                echo '<div class="cantidad-producto">';
                echo '</div>';
                echo '<div class="segundo">';
                    echo '<p class="precio">$' . $fila['precio'] . '</p>';
                    echo '<p class="card-cantidad">Agregado el: ' . $fila['fecha_agregado'] . '</p>';
                echo '</div>';
                $id_producto = $fila['id_producto'];
                $id_usuario = $_SESSION['id_usuario'];
                $verificarFavoritoQuery = "SELECT * FROM favoritos WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
                $verificarFavoritoResult = $con->query($verificarFavoritoQuery);
                
                // Si no está en favoritos, muestra el corazón para agregar a favoritos
                if ($verificarFavoritoResult->num_rows == 0) {
                    echo '<form class="favorito-form" action="../php/agregar_favorito.php" method="post">';
                    echo '<input type="hidden" name="id_producto" value="' . $fila['id_producto'] . '">';
                    echo '<button type="submit" class="fav" name="agregar_favorito"> <i class="fa-regular fa-heart"></i> </button>';
                    echo '</form>';
                } else {
                    echo '<form class="favorito-form" action="../php/agregar_favorito.php" method="post">';
                        echo '<input type="hidden" name="id_producto" value="' . $fila['id_producto'] . '">';
                        echo '<button type="submit" class="fav favorito-activo" name="eliminar_favorito"> <i class="fa-solid fa-heart"></i> </button>';
                    echo '</form>';
                }
                echo '</div>';
                echo '<div class="link">';
                    echo '<form class="carrito" action="php/agregar_carrito.php" method="post">';
                        echo '<input type="hidden" name="id_producto" value="' . $fila['id_producto'] . '">';
                        echo '<button type="submit" class="card-agregar-carrito"><i class="fa-solid fa-cart-shopping"></i></button>';
                        echo '<input class="cantidades" type="number" name="cantidad" value="1" min="1" max="'. $fila['stock'] .'">';
                    echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
              } else {
                  echo "La lista de favoritos está vacía.";
              }
          } else {
              echo "Debes iniciar sesión para ver la lista de favoritos.";
          }
  ?>
      </section>
    </main>

    <footer>
      <?php
        include('../src/footer.php');
      ?>
    </footer>
    <script>
        function atras(){
            window.history.back();
        }
    </script>
</body>
</html>