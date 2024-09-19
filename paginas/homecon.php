<?php

require_once('../php/conexion.php');

$seleccion = isset($_GET['consola']) ? 'consola' : '';

$seleccionado = '';
if ($seleccion === 'consola') {
    $seleccionado = urldecode($_GET['consola']);

    // Define la consulta SQL según la consola seleccionada
    if ($seleccionado === 'todos') {
        $sql = "SELECT * FROM productos";
    } else {
        $sql = "SELECT * FROM productos WHERE consola = '$seleccionado'";
    }
}

$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $seleccionado; ?></title>
    <link rel="stylesheet" href="../css/filtrado.css">
</head>
<body>
    <?php
        include('../src/navbar.php');
    ?>
    <main>
    <br><br><br>
        <section class="container-consolas">
            <div class="consolas">
            <a href="home.php"><div class="cons todos">Todos</div></a>
                <a href="homecon.php?consola=ps4" class="cons con-img"><img src="../media/ps4-logo.png" alt=""></a>
                <a href="homecon.php?consola=xbox" class="cons con-img"><img src="../media/xboxone-logo.jpg" alt=""></a>
            </div>
        </section>
        <br>
        <h1>Productos de <?php echo $seleccionado; ?></h1>
        <br><br><br>
        <section class="container">
            <?php
                include('../src/cards.php');
            ?>
        </section>
    </main>
</body>
</html>
