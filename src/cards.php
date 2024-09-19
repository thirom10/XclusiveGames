<style>
    .titulo {
  padding: 20px;
  font-size: 32px;
  color: rgba(255,255,255,0.4);
  margin-bottom: 40px
}

.gallery .card {
  max-width: 250px;
  height: auto;
  border-radius: 10px;
  position: relative;
  overflow: hidden;
}

.card-img {
  margin: 0 auto;
  display: flex;
  justify-content: center;
  height: 250px;
  border-radius: 12px 12px 0 0;
  transition: 0.5s ease-out;
}

.card-img:hover{
  transform: scale(1.1);
}

.card h3 a {
  text-decoration: none;
  color: #fff;
}

.card-des {
  font-size: 14px;
  font-weight: 600;
  position: absolute;
  padding: 4px;
}

.card-año {
  margin: 8px;
}

.nombre {
  margin-top: -8px;
  padding: 8px;
}

.carrito {
  display: flex;
  align-items: center;
}

.cantidades {
  width: 28px;
  height: 20px;
  text-align: center;
}


.precio-car {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 2px;
  padding: 8px;
  color: #000;
  background-color: #d8d8d8;
  border-radius: 0 0 12px 12px;
}

.fav {
  color: #007bff;
  transform: scale(1.2);
}

.precio {
  display: inline-block;
  font-weight: 700;
  padding: 3px;
  border-radius: 10px;
}

.des-con {
  margin-top: 12px;

}

.card-consola {
  padding: 2px 4px;
  border-radius: 8px;
  opacity: 0;
  animation: aparecerTitulo .4s ease-in-out 0.7s forwards;
}

.linea {
  width: 0;
  height: 5px;
  border-radius: 8px;
  background-color: #007bff;
  margin: 8px;
  animation: expandirLinea .4s ease-in-out 1s forwards;
}

@keyframes aparecerTitulo {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes expandirLinea {
  from {
    width: 0;
  }
  to {
    width: 15%;
  }
}

.card-agregar-carrito {
  background-color: #007bff;
  color: #fff;
  padding: 4px 8px;
  border-radius: 12px;
}

.slider {
  display: flex;
  gap: 10px;
}

.container-btn {
  margin-top: -50px;
  margin-left: -100px;
}

button {
  margin: 10px;
  font-size: 20px;
  background: none;
  border: none;
  cursor: pointer;
}

.visto {
    position: absolute;
    z-index: 99;
    margin-left: -8px;
    margin-top: -20px;
}
</style>
<?php
require_once("../php/conexion.php");

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo '<div class="card">';
        $fechaActual = new DateTime();
        $fechaProducto = new DateTime($fila['fecha_creacion']);
        $diferencia = $fechaActual->diff($fechaProducto)->days;
        if ($diferencia <= 7) {
            //echo '<img src="./media/new-product.png" class="etiqueta-nuevo" >';
        }
        echo '<div class="visto">';
        echo '<p><i class="fa-regular fa-eye"></i> '. $fila['veces_visto'] .'</p>';
        echo '</div>';
        echo '<a href="detalles.php?id=' .$fila['id_producto']. '"><img class="card-img" src="../administracion/php/'. $fila['imagen1'] .'"> </a>';
        echo '<div class="des-con">';
        echo '<span class="card-consola">' . $fila['consola'] . '</span>';
        echo '<div class="linea"></div>';
        echo '</div>';
        $descripcionCorta = substr($fila['nombre'], 0, 22);
        if (strlen($fila['nombre']) > strlen($descripcionCorta)) {
            $descripcionCorta .= '...';
        }
        echo '<h3 class="nombre"><a href="detalles.php?id=' . $fila['id_producto'] . '">' . $descripcionCorta . '</a></h3>';
        echo '<p class="card-año"><i class="fa-regular fa-calendar"></i> ' . $fila['fecha_lanzamiento'] . '</p>';
        echo '<div class="precio-car">';
        echo '<p class="precio">$' . $fila['precio'] . '</p>';
        
        if (isset($_SESSION['id_usuario'])) {
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
                echo '<form class="favorito-form" action="../php/agregar_favoritos.php" method="post">';
                echo '<input type="hidden" name="id_producto" value="' . $fila['id_producto'] . '">';
                echo '<button type="submit" class="fav favorito-activo" name="eliminar_favorito"> <i class="fa-solid fa-heart"></i> </button>';
                echo '</form>';
            }
            echo '<form class="carrito" action="../php/agregar_carrito.php" method="post">';
            echo '<input type="hidden" name="id_producto" value="' . $fila['id_producto'] . '">';
            echo '<button type="submit" class="card-agregar-carrito"><i class="fa-solid fa-cart-shopping"></i></button>';
            echo '<input class="cantidades" type="number" name="cantidad" value="1" min="1" max="'. $fila['stock'] .'">';
            echo '</form>';
        } else {
            // si no hay un usuario en sesion, muestra un enlace para iniciar sesión
            echo '<a href="session/iniciar.html"><button type="submit" class="fav"><i class="fa-regular fa-heart"></i></button></a>';
            echo '<a href="session/iniciar.html"><button type="submit" class="card-agregar-carrito"><i class="fa-solid fa-cart-shopping"></i></button></a>';
        }

        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No se encontraron tarjetas para la tabla de productos.";
}
?>
