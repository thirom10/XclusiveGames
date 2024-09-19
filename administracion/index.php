<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xclusive administracion</title>
  <link rel="stylesheet" href="css/index.css">

</head>
<body>
  <?php
    include("importar/navbar.php");
  ?>
  <main>
    <br><br><br>
    <h1 class="titulo">Interuaccion de la pagina </h1>
    <section class="interuaccion">
      <?php
        include("php/conexion.php");
        $consultaUsuarios = "SELECT COUNT(*) as totalUsuarios FROM usuarios";
        $resultadoUsuarios = mysqli_query($conexion, $consultaUsuarios);
        $filaUsuarios = mysqli_fetch_assoc($resultadoUsuarios);
        $usuariosIngresados = $filaUsuarios['totalUsuarios'];
        echo '<a href="usuarios.php">';
        echo '<div class="container-ing">';
        echo '<h3>Usuarios ingresados: </h3>';
        echo '<div class="info">';
        echo '<i class="fa-solid fa-user"></i>';
        echo '<p>' . $usuariosIngresados . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</a>';

        $consultaJuegos = "SELECT COUNT(*) as totalJuegos FROM transacciones where cantidad";
        $resultadoJuegos = mysqli_query($conexion, $consultaJuegos);
        $filaJuegos = mysqli_fetch_assoc($resultadoJuegos);
        $juegosComprados = $filaJuegos['totalJuegos'];
        echo '<div class="container-ing">';
        echo '<h3> Juegos comprados:</h2>';
        echo '<div class="info">';
        echo '<i class="fa-brands fa-shopify"></i>';
          echo '<p> ' . $juegosComprados . '</p>';
        echo '</div>';
        echo '</div>';

        $consultaCanjes = "SELECT COUNT(*) as totalCanjes FROM canjes";
        $resultadoCanjes = mysqli_query($conexion, $consultaCanjes);
        $filaCanjes = mysqli_fetch_assoc($resultadoCanjes);
        $productosCanjeados = $filaCanjes['totalCanjes'];
        echo '<div class="container-ing">';
        echo '<h3>Puntos canjeados:</h3>';
        echo '<div class="info">';
        echo '<i class="fa-solid fa-coins"></i>';
        echo '<p>' . $productosCanjeados . '</p>';
        echo '</div>';
        echo '</div>';
      ?>
    </section>
  </main>
</body>
</html>