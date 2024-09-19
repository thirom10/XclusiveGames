<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("conexion.php");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Obtener datos del formulario de inicio de sesión
    $usuario = $_POST["user"];
    $contraseña = $_POST["clave"];

    // Buscar usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$usuario'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contraseña, $row["clave"])) {
            session_start();
            $_SESSION["id_usuario"] = $row["id_usuario"];
            $_SESSION["nombre"] = $row["nombre"];
            // Otras variables de sesión que puedas necesitar
    
            // Redirige al usuario a la página principal
            header("Location: ../../home.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
