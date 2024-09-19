<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Games</title>
    <link rel="stylesheet" href="../css/juegos.css" />
  </head>
  <body>
    <?php
      include("../src/navbar.php");
    ?>
    <br><br><br><br><br>
 <main class="main-content">
   <div class="container">
    <div class="filtros-container">


    </div>
          <div class="container-juegos">
            <div class="gallery">
              <?php
              require_once("../php/conexion.php");
              define('PRODUCTOS_POR_PAGINA', 8);
                $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                $indice_inicial = ($pagina_actual - 1) * PRODUCTOS_POR_PAGINA;
                $sql = "SELECT * FROM productos ORDER BY veces_visto desc LIMIT $indice_inicial, " . PRODUCTOS_POR_PAGINA;
                $resultado = $con->query($sql);
                include('../src/cards.php');
                ?>
            </div>
            </div>
            <?php
              $total_filas = $con->query("SELECT COUNT(*) FROM productos")->fetch_row()[0];
              $total_paginas = ceil($total_filas / PRODUCTOS_POR_PAGINA);
              echo '<div class="paginacion">';
              for ($pagina = 1; $pagina <= $total_paginas; $pagina++) {
                  echo "<a href='?pagina=$pagina'>$pagina</a> ";
              }
              echo '</div>';
              ?>
          </div>

        <div class="shadow"></div>
      </section>
    </main>
    <br>
    <footer>
      <?php
        include('../src/footer.php');
      ?>
    </footer>

</div>
    <!--- tiene el jquery para que una vez seleccionado algo en los filtros y lo mustra, quede el filtro seleccionado --->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/juegos.js"></script>
  </body>
</html>
