<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Administración</title>
    <link rel="stylesheet" href="css/insertar.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
  <?php
    include("importar/navbar.php");
  ?>

  <main>
    <form action="php/insertar.php" method="post" enctype="multipart/form-data">
      <div class="container-agregar">
        <div class="imagenes">
          <div class="container-imagenes">
            <label>Logo del juego:</label>
            <input type="file" name="imagen2" accept="imgage/*" id="imagenInput2" onchange="mostrarImagen('imagenInput2', 'imagenMostrada2')">
            <img id="imagenMostrada2" src="#" alt="Imagen seleccionada" style="display:none; max-width: 300px; height: 200px; object-fit: cover;">
          </div>
          <div class="container-imagenes">
            <label>Imagen card:</label>
            <input type="file" name="imagen1" accept="imgage/*" id="imagenInput1" onchange="mostrarImagen('imagenInput1', 'imagenMostrada1')">
            <img id="imagenMostrada1" src="#" alt="Imagen seleccionada" style="display:none; max-width: 300px; height: 300px; object-fit: cover;">
          </div>
          <br>
        </div>
        
          <div class="agregar">
            <div class="primero">
              <div class="item">
                <label>Nombre del producto</label><br>
                <input type="text" name="nombre" required />
              </div>
  
              <div class="item">
                <label>Precio del producto</label><br>
                <input type="text" name="precio" required />
              </div>
  
              <div class="item">
                <label>Genero del producto</label><br>
                <input type="text" name="genero">
              </div>
  
              <div class="item">
                <label>Peso del juego (en gbs)</label><br>
                <input type="number" min="1" max="200" name="peso" required />
              </div>
  
              <div class="item">
                <label>Es multijugador?</label><br>
                <select name="multi">
                  <option value="si">si</option>
                  <option value="no">no</option>
                </select>
              </div>
              
              <div class="item">
                  <label>Stocks disponible:</label><br>
                  <input type="number" name="stock" min="1" max="9999">
              </div>
  
              <div class="item">
                <label>Agregar video trailer:</label><br>
                <input type="text" name="trailer">
              </div>
            </div>
              <!-- segunda parte para q no se haga re larga viste --->
            <div class="segundo">
              <div class="item">
                <label>Desarrolladora:</label><br>
                <input type="text" name="des">
              </div>
  
              <div class="item">
                <label>Fecha de lanzamiento:</label><br>
                <input type="date" name="f_lan">
              </div>
              
              <div class="item">
                <label>Consola:</label><br>
                <select name="consola">
                  <option value="ps4">play 4</option>
                  <option value="ps5">play 5</option>
                  <option value="xbox">xbox one</option>
                  <option value="xbox_x">xbox x</option>
                  <option value="switch">nintendo</option>
                </select>
              </div>
              
              <div class="item">
                <label>Resumen del juego:</label><br>
                <textarea name="resumen" cols="30" rows="8"></textarea>
              </div>
  
            </div>
          </div>
      </div>
      <div class="btn">
        <input type="submit" value="Guardar">
      </div>
    </form>
  </main>
  <script src="js/index.js"></script>

</body>
</html>
