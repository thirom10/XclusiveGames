<?php

require_once('../php/conexion.php');

$seleccion = isset($_GET['desarrolladora']) ? 'desarrolladora' : (isset($_GET['genero']) ? 'genero' : '');

$seleccionado = '';
if ($seleccion === 'desarrolladora') {
    $seleccionado = urldecode($_GET['desarrolladora']);
} elseif ($seleccion === 'genero') {
    $seleccionado = urldecode($_GET['genero']);
}

if ($seleccion === 'desarrolladora') {
    $sql = "SELECT * FROM productos WHERE desarrolladora = '$seleccionado'";
} elseif ($seleccion === 'genero') {
    $sql = "SELECT * FROM productos WHERE genero = '$seleccionado'";
} else {
    die("no funciona");
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
