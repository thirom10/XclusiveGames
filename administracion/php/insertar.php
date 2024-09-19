<?php
require_once('conexion.php');


$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$genero = $_POST['genero'];
$peso = $_POST['peso'];
$multi = $_POST['multi'];
$desarrolladora = $_POST['des'];
$f_lanzamiento = $_POST['f_lan'];
$consola = $_POST['consola'];
$resumen = $_POST['resumen'];
$stock = $_POST['stock'];
$trailer = $_POST['trailer'];

// subir imagenes
$imagen1 = subirImagen('imagen1');
$imagenFondo = subirImagen('imagen2');


$query = "INSERT INTO productos (nombre, precio, genero, peso, multijugador, desarrolladora, fecha_lanzamiento, consola, resumen, stock, trailer , imagen1, imagen2)
 VALUES ('$nombre', '$precio', '$genero', '$peso', '$multi', '$desarrolladora', '$f_lanzamiento', '$consola', '$resumen', '$stock', '$trailer' , '$imagen1', '$imagenFondo')";

// funcion para las imagenes
function subirImagen($imagenInput) {
    $carpetaDestino = "../imagenes-productos/";
    $nombreImagen = $_FILES[$imagenInput]['name'];
    $rutaImagen = $carpetaDestino . $nombreImagen;

    if (move_uploaded_file($_FILES[$imagenInput]['tmp_name'], $rutaImagen)) {
        return $rutaImagen;
    }
}

if (mysqli_query($conexion, $query)) {
    header("Location: ../insertar.html");
} else {
    echo "Error al insertar en la base de datos: " . mysqli_error($conexion);
}
?>
