<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("conexion.php");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Obtener datos del formulario de registro
    $nombre = $_POST["usuario"];
    $name = $_POST["nombre"];
    $email = $_POST["email"];
    $contraseña = password_hash($_POST["contra"], PASSWORD_BCRYPT);
    $tel = $_POST["tel"];

    // Insertar usuario en la base de datos
    $sql = "INSERT INTO usuarios (id_usuario, nombre_com, email, clave, tel) VALUES ('$nombre', '$name', '$email', '$contraseña', '$tel')";
    if ($conexion->query($sql) === TRUE) {
        header ("Location: ../iniciar.html");
    } else {
        echo "Error al registrar usuario: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
