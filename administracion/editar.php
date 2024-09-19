<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar producto</title>
    <link rel="stylesheet" href="css/editar.css">
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

    $sql = "SELECT * FROM productos";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo '<div class="card" id="card' . $fila['id_producto'] . '"> ';
            echo '<img class="card-img" src="../administracion/php/'. $fila['imagen1'] .'">';
            echo '<p class="card-precio">$' . $fila['precio'] . '</p>';
            echo '<a href="detalle_edit.php?id='. $fila['id_producto'] .'"> '. $fila['nombre'] .' </h2></a>';
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


    <script src="js/index.js"></script>
    <script>

function editarNombre(cardId) {
    // el elemento editable (h2) correspondiente al cardId
    var nombreElement = document.querySelector('.editable[data-cardid="' + cardId + '"]');

    // preguntar al admin por el nuevo nombre
    var nuevoNombre = prompt("Ingrese el nuevo nombre:", nombreElement.textContent);

    // verificar si el usuario hizo clic en "aceptar" y el nuevo nombre no está vacío
    if (nuevoNombre !== null && nuevoNombre !== "") {
        // Actualizar el contenido del elemento del nombre
        nombreElement.textContent = nuevoNombre;

        // Realizar una solicitud al servidor para actualizar el nombre en la base de datos (puedes usar AJAX o enviar un formulario, según tu implementación)
        // Aquí asumimos que ya tienes una función actualizarNombreEnBaseDeDatos
        actualizarNombreEnBaseDeDatos(cardId, nuevoNombre);
    }
}

// Función de ejemplo para simular una solicitud al servidor para actualizar el nombre en la base de datos
function actualizarNombreEnBaseDeDatos(cardId, nuevoNombre) {
    // Realiza la lógica necesaria para actualizar el nombre en la base de datos
    // Puedes usar AJAX para enviar una solicitud al servidor y manejar la actualización en el lado del servidor (PHP)
    // Ejemplo:
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/actualizar.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Manejar la respuesta del servidor, si es necesario
            console.log(xhr.responseText);
        }
    };
    xhr.send("cardId=" + cardId + "&nuevoNombre=" + encodeURIComponent(nuevoNombre));
    
}


    </script>
</body>
</html>