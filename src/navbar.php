<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  background-color: #100f11;
  color: #fff;
}

main {
  margin-left: 200px;
}

/*arriba navbar*/
.navbar {
  position: fixed;
  width: 100%;
  background-color: #1e1d1f;
  display: flex;
  align-items: center;
  justify-content: start;
  padding: 8px;
  z-index: 1000;
  margin-left: 200px;
  gap: 180px;

}

.navbar_content img {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  cursor: pointer;
}
.navbar_content {
  display: flex;
  align-items: center;
  gap: 18px;
  margin-left: -100px;
}

.navbar_content i {
  font-size: 20px;
  color: #fff;
}

.buscador {
  margin-left: 265px;
  position: relative;
}

.busc {
  max-width: 300px;
  padding: 12px 50px;
  outline: none;
  border: none;
  color: #ffff;
  border:2px solid #007bff;
  border-radius: 20px;
  background-color: transparent;
}

.container-resultados {
  display: flex;
  justify-content: center;
  color: #000;
}

 .resultados {
  max-width: 240px;
  background-color: #100f11;
  border: 2px solid #1d1d1d;
  margin-left: 275px;
  color: #000;
  border-radius: 0 0 20px 20px;
  z-index: 999999;
  top: 55px;
  left: 18px;
  position: absolute;
}

.card-bus {
  display: flex;
}

.card-img-bus {
  width: 70px;
  border-radius: 8px;
  margin: 4px;
}
  .buscador .lupa {
    position: absolute;
    color: #ffff;
    top: 0px;
    left: 0px;
    background-color: #007bff;
    border-radius: 20px 0 0 20px;
    padding: 11px;
  }

/*navbar arriba*/

/*inicio navbar*/
.sidebar {
  position: fixed;
  height: 100%;
  width: 200px;
  background: #1e1d1f;
  padding: 15px;
  z-index: 99;

}
.logo {
  font-size: 25px;
  padding: 0 15px;
  display: flex;
  justify-content: center;
  flex-direction: column;
  gap: 8px;
}
.logo i{
  font-size: 38px;
}
.sidebar a {
  color: #fff;
  text-decoration: none;
}
.menu-content {
  position: relative;
  height: 100%;
  width: 100%;
  margin-top: 40px;
  overflow-y: scroll;
}
.menu-content::-webkit-scrollbar {
  display: none;
}
.menu-items {
  height: 100%;
  width: 100%;
  list-style: none;
  transition: all 0.4s ease;
  display: flex; 
  flex-direction: column;
  gap: 14px;
}
.submenu-active .menu-items {
  transform: translateX(-58%);
}
.menu-title {
  color: #fff;
  font-size: 14px;
  padding: 15px 20px;
}
.item a,
.submenu-item {
  padding: 16px;
  display: inline-block;
  width: 100%;
  border-radius: 12px;
}
.item i {
  font-size: 12px;
}
.item a:hover,
.submenu-item:hover,
.submenu .menu-title:hover {
  background: rgba(255, 255, 255, 0.1);
}
.active {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
}
.submenu-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
  cursor: pointer;
  
}
.submenu {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  right: calc(-100% - 26px);
  height: calc(100% + 100vh);
  background: #1e1d1f;
  display: none;
}
.show-submenu ~ .submenu {
  display: block;
}
.submenu .menu-title {
  border-radius: 12px;
  cursor: pointer;
}
.submenu .menu-title i {
  margin-right: 10px;
}
/*fin navbar*/

.carrito {
  position: relative;
}

.carrito .cantidad {
  position: absolute;
  top: 10px;
  left: 20px;
  background-color: #007bff;
}

.iniciar {
  background-color: #007bff;
  padding: 4px 8px;
  border-radius: 8px;
  transition: 0.3s ease-in;
}

.iniciar a {
  text-decoration: none;
  color: #ffff;
}

.iniciar:hover {
  transform: scale(1.1);
}

.subperfil {
  display: flex;
  justify-content: end;
}

#cajaTexto {
  position: absolute;
  background-color: #333;
  padding: 12px 8px;
  z-index: 999999;
  width: 300px;
  margin-top: 28px;
  border-radius: 8px;
}

#cajaTexto a{
  text-decoration: none;
  color: #fff;

}

#cajaTexto a p{
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 8px;
  margin: 2px;
  margin-top: 22px;
  margin-bottom: 22px;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
</html>

<?php
echo '<nav class="navbar">';
echo '  <div class="buscador">';
echo '    <form id="formularioBusqueda" action="../php/buscar.php" method="POST">';
echo '      <input class="busc" type="search" id="busqueda" name="busqueda" placeholder="Buscar juego" />';
echo '      <div class="lupa">';
echo '        <i class="fa-solid fa-magnifying-glass"></i>';
echo '      </div>';
echo '    </form>';
echo '  </div>';
echo '  <div class="container-resultados">';
echo '    <div class="resultados">';
echo '      <div id="resultados"></div>';
echo '    </div>';
echo '  </div>';
echo '  <div class="navbar_content">';
echo '      <img src="../media/coins.png">';
            require_once('../php/conexion.php');
            $sql5 = "SELECT coins FROM usuarios";
          if(isset($_SESSION['id_usuario'])) {
            $resultado = $con->query($sql5);
            if ($fila = $resultado->fetch_assoc()) {
              function formatoCorto($numero) {
                $sufijos = array('', 'k', 'M', 'B');
                $base = log($numero, 1000);
                $potencia = floor($base);
                $indice = min($potencia, count($sufijos) - 1);
                return round(pow(1000, $base - $potencia), 2) . $sufijos[$indice];
            }
            
            // Formatear el precio del producto
            $puntos = formatoCorto($fila['coins']);

              echo '      <p style="margin-left:-18px;">'. $puntos .'</p>';  
            
            }
          } else {
            echo '<span style="margin-left:-18px; margin-right:10px;">0</span>';
          }

        if(isset( $_SESSION['id_usuario'])) {
            $sqlCarrito = "SELECT SUM(cantidad) AS totalProductos FROM carrito";
            $resultadoCarrito = $con->query($sqlCarrito);
            
            if ($filaCarrito = $resultadoCarrito->fetch_assoc()) {
                $cantidadCarrito = $filaCarrito['totalProductos'];
        
                // Muestra la cantidad de productos en el carrito junto al icono
                echo '<p style=" font-size:12px; margin-right:-54px; margin-top:22px; background-color:#1e1d1f; z-index:999; padding:2px 10px; border-radius:20px;"><a style="text-decoration:none; color:#fff;" href="carrito.php">' . $cantidadCarrito . '</a></p>';
            }
          }
            echo '    <a href="carrito.php"><i class="fa-solid fa-cart-shopping carrito"></i></a>';
echo '    <a href="favoritos.php"><i class="fa-regular fa-heart"></i></a>';
            if(isset($_SESSION['id_usuario'])) {
echo '    <img src="images/profile.jpg" alt=""  onclick="alternarCajaTexto()" class="profile" />';

echo '<div class="subperfil" >';
    echo'<div id="cajaTexto" style="display:none;">';
      echo '<div class="bienvenido">';
              echo '<h3>Hola</h3>';
      echo '</div>';
      echo '<a href="#"><p>hola :V</p></a>';
      echo '<a href="#"><p>hola :V</p></a>';
      echo '<a href="../php/cerrar_sesion.php"><p>Cerrar sesion</p></a>';
    echo '</div>';
echo '</div>';
            }else {
              echo '<h3 class="iniciar"><a href="session/iniciar.html">Iniciar</a></h3>';
            }
echo '  </div>';
echo '</nav>';
echo '<nav class="sidebar">';
echo '<div  class="logo">';
echo '<i class="fa-solid fa-gamepad"></i>';
echo '    <a href="home.php">Xclusive Games</a>';
echo '</div>';
echo '    <div class="menu-content">';
echo '        <ul class="menu-items">';
echo '            <li class="item">';
echo '                <a href="home.php">Home</a>';
echo '            </li>';
echo '            <li class="item">';
echo '                <a href="juegos.php">Juegos</a>';
echo '            </li>';
echo '            <li class="item">';
echo '                <div class="submenu-item">';
echo '                    <span>Desarrolladoras</span>';
echo '                    <i class="fa-solid fa-chevron-right"></i>';
echo '                </div>';
echo '                <ul class="menu-items submenu">';
echo '                    <div class="menu-title">';
echo '                        <i class="fa-solid fa-chevron-left"></i>';
echo '                        Volver';
echo '                    </div>';
echo '                    <li class="item">';
echo '                        <a href="juegos.php">Todas</a>';
echo '                    </li>';

$sqlDes = "SELECT DISTINCT desarrolladora FROM productos";
$queryDes = $con->query($sqlDes);

if ($queryDes->num_rows > 0) {
  while ($filaDes = $queryDes->fetch_assoc()) {
    echo '                    <li class="item">';
    echo '                        <a href="filtrado.php?desarrolladora=' . urlencode($filaDes['desarrolladora']) . '">' . $filaDes['desarrolladora'] . '</a>';
    echo '                    </li>';
  }
}
echo '                </ul>';
echo '            </li>';
echo '            <li class="item">';
echo '                <div class="submenu-item">';
echo '                    <span>Categorias</span>';
echo '                    <i class="fa-solid fa-chevron-right"></i>';
echo '                </div>';
echo '                <ul class="menu-items submenu">';
echo '                    <div class="menu-title">';
echo '                        <i class="fa-solid fa-chevron-left"></i>';
echo '                        Volver';
echo '                    </div>';
$consultaGeneros = "SELECT genero FROM productos";
$resultadoGeneros = $con->query($consultaGeneros);

$categoriasUnicas = array();

echo '                    <li class="item">';
if ($resultadoGeneros->num_rows > 0) {
    while ($filaGenero = $resultadoGeneros->fetch_assoc()) {
        $primeraPalabra = strtok($filaGenero['genero'], '/');

        if (!in_array($primeraPalabra, $categoriasUnicas)) {
            $categoriasUnicas[] = $primeraPalabra;

            echo '                        <a href="filtrado.php?genero=' . urlencode($filaGenero['genero']) . '">' . $primeraPalabra . '</a>';
          }
        }
      }
      echo '                    </li>';

echo '                </ul>';
echo '            </li>';
echo '            <li class="item">';
echo '                <a href="contacto.php">Contacto</a>';
echo '            </li>';

echo '                </ul>';
echo '            </li>';

echo '        </ul>';
echo '    </div>';
echo '</nav>';
echo '<nav class="nav2">';
echo '  <div class="contenido-nav">';
echo '  </div>';
echo '</nav>';

?>


<script>
    function alternarCajaTexto() {
        var cajaTexto = document.getElementById("cajaTexto");
        cajaTexto.style.display = (cajaTexto.style.display === "none" || cajaTexto.style.display === "") ? "block" : "none";
    }
</script>
<script>
const sidebar = document.querySelector(".sidebar");
const menu = document.querySelector(".menu-content");
const menuItems = document.querySelectorAll(".submenu-item");
const subMenuTitles = document.querySelectorAll(".submenu .menu-title");

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    menu.classList.add("submenu-active");
    item.classList.add("show-submenu");
    menuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show-submenu");
      }
    });
  });
});

subMenuTitles.forEach((title) => {
  title.addEventListener("click", () => {
    menu.classList.remove("submenu-active");
  });
});

console.log(menuItems, subMenuTitles);


function searchProducts() {
  var query = document.getElementById('search').value;

  $.ajax({
      type: 'POST',
      url: 'php/buscador.php',
      data: { query: query },
      success: function(response) {
          $('#results').html(response);
      }
  });
}

$(document).ready(function () {
  // Función para mostrar u ocultar el cuadro de resultados según si hay texto en el campo de búsqueda
  function toggleCuadroResultados() {
    $("#resultados").toggle($("#busqueda").val().trim() !== "");
  }

  // Evento cuando se escribe en el campo de búsqueda
  $("#busqueda").on("input", function () {
    toggleCuadroResultados(); // Muestra u oculta el cuadro de resultados

    var formData = $("#formularioBusqueda").serialize();

    $.ajax({
      type: "POST",
      url: $("#formularioBusqueda").attr("action"),
      data: formData,
      success: function (data) {
        $("#resultados").html(data);
        toggleCuadroResultados(); // Muestra u oculta el cuadro de resultados
      },
    });
  });
  toggleCuadroResultados();
});
</script>


