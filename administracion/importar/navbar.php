<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  background-color: #100f11;
  color: #fff;
}

/*inicio navbar*/
.sidebar {
  position: fixed;
  height: 100%;
  width: 260px;
  background: #1e1d1f;
  padding: 15px;
  z-index: 99;
}

.sidebar h2{
    margin-top: 20px;
    text-align: center;
    color:rgba(255,255,255, 0.4);
}
.logo {
  font-size: 25px;
  padding: 0 15px;
}
.sidebar a {
  color: #fff;
  text-decoration: none;
}
.menu-content {
  position: relative;
  height: 100%;
  width: 100%;
  margin-top: 20px;
  overflow-y: scroll;
}
.menu-content::-webkit-scrollbar {
  display: none;
}
.menu-items {
  height: 100%;
  width: 100%;
  list-style: none;
  transition: all 0.4s ease;
}
.submenu-active .menu-items {
  transform: translateX(-56%);
}
.menu-title {
  color: #fff;
  font-size: 14px;
  padding: 15px 20px;
}
.item a,
.submenu-item {
  padding: 16px;
  display: inline-block;
  width: 100%;
  border-radius: 12px;
  margin-top: 20px
}
.item i {
  font-size: 12px;
}
.item a:hover,
.submenu-item:hover,
.submenu .menu-title:hover {
  background: rgba(255, 255, 255, 0.1);
}
.active {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
}
.submenu-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
  cursor: pointer;
}
.submenu {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  right: calc(-100% - 26px);
  height: calc(100% + 100vh);
  background: #1e1d1f;
  display: none;
}
.show-submenu ~ .submenu {
  display: block;
}
.submenu .menu-title {
  border-radius: 12px;
  cursor: pointer;
}
.submenu .menu-title i {
  margin-right: 10px;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
</html>

<?php
echo '<nav class="sidebar">';
echo '    <a href="index.php" class="logo">Xclusive Games</a>';
echo '      <h2>Administracion</h2>';    
echo '    <div class="menu-content">';
echo '        <ul class="menu-items">';
echo '            <li class="item">';
echo '                <a href="index.php">Home-Panel</a>';
echo '            </li>';
echo '            <li class="item">';
echo '                <a href="usuarios.php">Usuarios</a>';
echo '            </li>';
echo '            <li class="item">';
echo '                <a href="juegos.php">Compras realizadas</a>';
echo '            </li>';
echo '            <li class="item">';
echo '                <a href="insertar.php">Agregar</a>';
echo '            </li>';
echo '            <li class="item">';
echo '                <div class="submenu-item">';
echo '                    <span>Modificar</span>';
echo '                    <i class="fa-solid fa-chevron-right"></i>';
echo '                </div>';
echo '                <ul class="menu-items submenu">';
echo '                    <div class="menu-title">';
echo '                        <i class="fa-solid fa-chevron-left"></i>';
echo '                        Volver';
echo '                    </div>';
echo '                    <li class="item">';
echo '                        <a href="eliminar.php">Eliminar</a>';
echo '                    </li>';
echo '                    <li class="item">';
echo '                        <a href="editar.php">modificar</a>';
echo '                    </li>';
echo '                </ul>';
echo '            </li>';
echo '        </ul>';
echo '    </div>';
echo '</nav>';
echo '<nav class="nav2">';
echo '  <div class="contenido-nav">';
echo '  </div>';
echo '</nav>';
?>

<script>
const sidebar = document.querySelector(".sidebar");
const menu = document.querySelector(".menu-content");
const menuItems = document.querySelectorAll(".submenu-item");
const subMenuTitles = document.querySelectorAll(".submenu .menu-title");

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    menu.classList.add("submenu-active");
    item.classList.add("show-submenu");
    menuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show-submenu");
      }
    });
  });
});

subMenuTitles.forEach((title) => {
  title.addEventListener("click", () => {
    menu.classList.remove("submenu-active");
  });
});

console.log(menuItems, subMenuTitles);
</script>
