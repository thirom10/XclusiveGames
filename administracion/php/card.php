<?php
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo '<div class="card">';
                echo '<div class="precio">';
                    echo '<p>' . $fila['precio'] . '</p>';
                echo '</div>';


                    echo '<h3 class="nombre">' . $fila['nombre'] . '</h3>';
                    echo '<img class="card-img" src="' . $fila['img1'] . '" alt="">';
                    echo '<img class="card-img" src="' . $fila['img2'] . '" alt="">';
                    echo '<img class="card-img" src="' . $fila['img3'] . '" alt="">';

                echo '</div>';
        }
    }
?>