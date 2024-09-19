<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comprar</title>
    <link rel="stylesheet" href="../css/compra.css">
</head>
<body>
    <?php
    include('../src/navbar.php');
    ?>

    <main>
        <div class="container">
            <section class="container-select">
                <br><br>
                <?php
                                if (isset($_SESSION['id_usuario'])) {
                                    $id_usuario = $_SESSION['id_usuario'];
                                    
                                    require_once("../php/conexion.php");
                                    
                                    $query = "SELECT productos.*, carrito.cantidad
                                    FROM productos
                                    INNER JOIN carrito ON productos.id_producto = carrito.id_producto
                                    WHERE carrito.id_usuario = '$id_usuario'";
                    
                    $result = $con->query($query);
                    $totalCompra = 0;
                if ($result->num_rows > 0) {
                    while ($fila = $result->fetch_assoc()) {
                    echo '<div class="juegos">';
                    echo '  <div class="card">';
                    echo '    <input type="hidden" name="idUsuario" value="' . $id_usuario . '">';
                    echo '    <input type="hidden" name="idProducto" value="' . $fila['id_producto'] . '">';
                    echo '    <p class="cantidad">'. $fila['cantidad'] .'</p>';
                    echo '    <div class="card-img">';
                    echo '      <img class="card-img" src="../administracion/php/'. $fila['imagen1'] .'">';
                    echo '    </div>';
                    echo '    <div class="info">';
                    echo '      <div><h2>'. $fila['nombre'] .'</h2></div>';
                    echo '      <div><h3>'. $fila['consola'] .'</h3></div>';
                    echo '      <div><span>'. $fila['precio'] .'</span></div>';
                    echo '    </div>';
                    echo '    <div class="contenedor-btn">';
                    echo '<form class="btn-in" action="../php/eliminar.php" method="post">';
                    echo '<input type="hidden" name="id_producto" value="' . $fila['id_producto'] . '">';
                    echo '<input type="number" name="cantidad" value="1" min="1" max="' . $fila['cantidad'] . '">';
                    echo '<button  type="submit" name="eliminar_cantidad">Eliminar Cantidad</button>';
                    echo '<br>';
                    echo '<button type="submit" name="eliminar_producto">Eliminar Producto</button>';
                    echo '</form>';
                    echo '      <span><a href="detalles.php?id=' .$fila['id_producto']. '">ver</a></span>';
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                    $totalCompra += $fila['precio'] * $fila['cantidad'];
                }
                
            }else {
                    echo 'no hay nada pa comprar';
                }
            }
                ?>
            </section>
    
            <section class="container-total">
<div class="pagos">
    <?php
    echo '<p>Total de la compra: $' . number_format($totalCompra, 2) . '</p>';
    ?>
    <h2 class="titulo">Con qué paga?</h2>
    <form method="post" action="../php/confirmar_compra.php">
        <div class="formas-pago">
            <div class="forma-pago">
                <label>
                    <input type="radio" name="formaPago" value="mercadoPago">
                    <img src="media/Mercado-pago-1024x267.png" alt="Mercado Pago">
                </label>
            </div>

            <div class="forma-pago">
                <label>
                    <input type="radio" name="formaPago" value="uala">
                    <img src="media/uala.png" alt="Uala">
                </label>
            </div>

            <div class="forma-pago">
                <label class="pago-efectivo">
                    <input type="radio" name="formaPago" value="efectivo">
                    <img class="efectivo"  src="media/efectivo.png" alt="Efectivo">
                    Efectivo
                </label>
            </div>
        </div>

        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
        <input type="hidden" name="formaPago" value="">
        <input type="hidden" name="totalCompra" value="<?php echo $totalCompra; ?>">

        <input type="submit" name="confirmarCompra" value="Confirmar Compra">
    </form>
</div>

            </section>
        </div>
    </main>
    <script>
            const checkboxes = document.querySelectorAll('input[type="radio"]');
            
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    checkboxes.forEach(otherCheckbox => {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                });
            });
    </script>
</body>
</html>