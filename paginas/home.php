<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xclusivegames</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <?php
        include("../src/navbar.php");
    ?>

    <main>
        <br><br><br>
        <section id="cons" class="container-consolas">
            <div class="consolas">
                <div class="cons todos">Todos</div>
                <a href="homecon.php?consola=ps4" class="cons con-img"><img src="../media/ps4-logo.png" alt=""></a>
                <a href="homecon.php?consola=xbox" class="cons con-img"><img src="../media/xboxone-logo.jpg" alt=""></a>
            </div>
        </section>
        
        <h2 class="titulo">Juegos más populares</h2>
        <section class="container-cards">
            <div class="wrapper">
                <div class="slider">
                    <?php
                        $sql2 = "SELECT * FROM productos ORDER BY veces_visto DESC LIMIT 4";
                        $resultado = $con->query($sql2);
                        include("../src/cards.php");
                    ?>
                </div>
            </div>
        </section>
        <br><br>
        <h2 class="titulo">Juegos recien ingresados</h2>
        <section class="container-cards">
            <div class="wrapper">
                <div class="slider">
                    <?php
                        $sql2 = "SELECT * FROM productos ORDER BY fecha_creacion DESC LIMIT 4";
                        $resultado = $con->query($sql2);
                        include("../src/cards.php");
                    ?>
                </div>
            </div>
        </section>
        <br><br>
        <h2 class="titulo">Juegos economicos</h2>
          <section class="container-cards">
              <div class="wrapper">
                  <div class="slider">
                      <?php
                          $sql2 = "SELECT * FROM productos ORDER BY precio ASC LIMIT 4";
                          $resultado = $con->query($sql2);
                          include("../src/cards.php");
                      ?>
                  </div>
              </div>
          </section>
          <br><br>
        <h2 id="cat" class="titulo">Categorias</h2>
      <section class="categorias">
        <div class="categoria-container">
            <?php
              require_once("../php/conexion.php");
                $sqlCategorias = "SELECT DISTINCT genero FROM productos ORDER BY precio desc LIMIT 6";
                $resultCategorias = $con->query($sqlCategorias);
                
                if($resultCategorias->num_rows > 0) {
                  while ($rowCategoria = $resultCategorias->fetch_assoc()) {
                    $genero = $rowCategoria['genero'];

                    $sqlimg = "SELECT imagen1 FROM productos WHERE genero = '$genero'  LIMIT 1";
                    $resultimg = $con->query($sqlimg);
                    
                    
                    if($resultimg->num_rows > 0) {
                      $filaimg = $resultimg->fetch_assoc();
                      echo '<div class="categoria-card">';
                        echo '<div class="txt-categoria">';
                          echo '<h3>'.$genero.'</h3>';
                          echo '<img class="cat-img" src="../administracion/php/'. $filaimg['imagen1'] .'" />';
                        echo '</div>';
                      echo '</div>';
                    }
                  }
                } else {
                  echo 'No hay categorías :V';
                }
            ?>
        </div>
      </section>
      <br><br>
      <section class="container-puntos">
        <div class="monedas">
        <img class="moneda" src="media/coins.png">
          <h2 class="titulo">Regalos por puntos</h2>
          <img class="moneda" src="media/coins.png">
        </div>

        <?php
          include('../src/slider.php');
        ?>
      </section>
      <br><br>
    </main>
    <br><br><br>
    <footer>
        <?php
            include("../src/footer.php");
        ?>
    </footer>

    <script src="js/swiper-bundle.min.js"></script>
</body>
</html>