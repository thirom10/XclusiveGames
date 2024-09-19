<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
    <link rel="stylesheet" href="css/eliminar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php
        include("importar/navbar.php");
    ?>
    <main>

    <section class="container">
        <?php

        require_once("php/conexion.php");
        
        define('PRODUCTOS_POR_PAGINA', 9);
        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $indice_inicial = ($pagina_actual - 1) * PRODUCTOS_POR_PAGINA;

        $sql = "SELECT * FROM productos LIMIT $indice_inicial, " . PRODUCTOS_POR_PAGINA;
        $resultado = $conexion->query($sql);
        
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo '<div class="card" id="card' . $fila['id_producto'] . '"> ';

                echo '<span class="eliminar-card" onclick="eliminarCard(' . $fila['id_producto'] . ')">X</span>';
                    echo '<img class="card-img" src="../administracion/php/'. $fila['imagen1'] .'">';
                    echo '<p class="card-precio">$' . $fila['precio'] . '</p>';
                    echo '<h2> '. $fila['nombre'] .' </h2>';    
                    echo '<p class="card-des">' . $fila['desarrolladora'] . '</p>';
                    echo '<p class="card-año">' . $fila['fecha_lanzamiento'] . '</p>';
                    echo '<p class="card-consola">' . $fila['consola'] . '</p>';
                    echo '</div>';
                    
            }
        } else {
            echo "No se encontraron tarjetas para la tabla de productos.";
        }
        ?>
    </section>
    <?php
    $total_filas = $conexion->query("SELECT COUNT(*) FROM productos")->fetch_row()[0];
    $total_paginas = ceil($total_filas / PRODUCTOS_POR_PAGINA);
                  echo '<div class="paginacion">';
                  for ($pagina = 1; $pagina <= $total_paginas; $pagina++) {
                      echo "<a href='?pagina=$pagina'>$pagina</a> ";
                  }
                  echo '</div>';
    ?>

    <script src="js/index.js"></script>
    <script>
        function eliminarCard(id_producto) {
    if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        // Realiza una solicitud al servidor para eliminar el producto
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "php/eliminar.php?id=" + id_producto, true);
        xhr.send();

        // Elimina el card del DOM
        var card = document.getElementById('card' + id_producto);
        card.parentNode.removeChild(card);
    }
}
    </script>
</body>
</html>