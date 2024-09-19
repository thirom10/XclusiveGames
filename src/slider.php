<style>
  .wrapper-slider {
  max-width: 950px;
  width: 100%;
  position: relative;
  margin-left: 52px;
}

.wrapper-slider i {
  top: 50%;
  height: 50px;
  width: 50px;
  cursor: pointer;
  font-size: 1.25rem;
  position: absolute;
  text-align: center;
  line-height: 50px;
  background: #fff;
  border-radius: 50%;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
  transform: translateY(-50%);
  transition: transform 0.1s linear;
}

.wrapper-slider i:active {
  transform: translateY(-50%) scale(0.85);
}

.wrapper-slider i:first-child {
  left: -22px;
}

.wrapper-slider i:last-child {
  right: -22px;
}

.wrapper-slider .carousel-slider {
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: calc((100% / 4) - 12px);
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  gap: 16px;
  border-radius: 8px;
  scroll-behavior: smooth;
  scrollbar-width: none;
}

.carousel-slider::-webkit-scrollbar {
  display: none;
}

.carousel-slider.no-transition {
  scroll-behavior: auto;
}

.carousel-slider.dragging-slider {
  scroll-snap-type: none;
  scroll-behavior: auto;
}

.carousel-slider.dragging-slider .card-slider {
  cursor: grab;
  user-select: none;
}

.carousel-slider :where(.card-slider, .img-slider) {
  display: flex;
  justify-content: center;
  align-items: center;
}

.carousel-slider .card-slider {
  scroll-snap-align: start;
  height: 350px;
  list-style: none;
  background: #fff;
  cursor: pointer;
  padding-bottom: 15px;
  flex-direction: column;
  border-radius: 8px;
}

.carousel-slider .card-slider .img-slider {
  background: #001f85;
  height: 200px;
  width: 200px;
  border-radius: 20px;
}

.carousel-slider .card-slider .img-slider img {
  width: 100%;

  object-fit: cover;
}

.carousel-slider .card-slider h2 {
  font-weight: 500;
  font-size: 1.56rem;
  margin: 20px 0 5px;
  color: #000;
}

.carousel-slider .card-slider span {
  color: #6A6D78;
  font-size: 1.31rem;
}

@media screen and (max-width: 900px) {
  .wrapper-slider .carousel-slider {
    grid-auto-columns: calc((100% / 2) - 9px);
  }
}

@media screen and (max-width: 600px) {
  .wrapper-slider .carousel-slider {
    grid-auto-columns: 100%;
  }
}

</style>
<?php
echo '<div class="wrapper-slider">';
echo '  <i id="left-slider" class="fa-solid fa-angle-left-slider"></i>';
echo '  <ul class="carousel-slider">';
$sql = "SELECT * FROM accesorios";
$resultado = $con->query($sql);

if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {
    echo '    <li class="card-slider">';
    $descripcionCorta = substr($fila['nombre_acc'], 0, 17);
    if (strlen($fila['nombre_acc']) > strlen($descripcionCorta)) {
      $descripcionCorta .= '...';
    }
    echo '      <div class="img-slider"><img src="accesorios/'. $fila['img_acc'] .'" draggable="false"></div>';
    echo '<h3 class="nombre"><a href="../paginas/coins.php?id_acc=' . $fila['id_accesorio'] . '">' . $descripcionCorta . '</a></h3>';
    echo '<span>'. $fila['puntos_requeridos'] .'</span>';
    echo '    </li>';
  }
} else {
  echo "no hay accesorios";
}

echo '  </ul>';
echo '  <i id="right-slider" class="fa-solid fa-angle-right-slider"></i>';
echo '</div>';
?>

<script defer>
  const envoltorio = document.querySelector(".wrapper-slider");
const carrusel = document.querySelector(".carousel-slider");
const anchoPrimeraTarjeta = carrusel.querySelector(".card-slider").offsetWidth;
const botonesFlecha = document.querySelectorAll(".wrapper-slider i");
const hijosCarrusel = [...carrusel.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Obtener el número de tarjetas que caben en el carrusel a la vez
let tarjetasPorVista = Math.round(carrusel.offsetWidth / anchoPrimeraTarjeta);

// Insertar copias de las últimas tarjetas al principio del carrusel para el desplazamiento infinito
hijosCarrusel.slice(-tarjetasPorVista).reverse().forEach(tarjeta => {
    carrusel.insertAdjacentHTML("afterbegin", tarjeta.outerHTML);
});

// Insertar copias de las primeras tarjetas al final del carrusel para el desplazamiento infinito
hijosCarrusel.slice(0, tarjetasPorVista).forEach(tarjeta => {
    carrusel.insertAdjacentHTML("beforeend", tarjeta.outerHTML);
});

// Desplazar el carrusel a la posición adecuada para ocultar las primeras tarjetas duplicadas en Firefox
carrusel.classList.add("no-transition-slider");
carrusel.scrollLeft = carrusel.offsetWidth;
carrusel.classList.remove("no-transition-slider");

// Agregar event listeners para los botones de flecha para desplazar el carrusel izquierda y derecha
botonesFlecha.forEach(btn => {
    btn.addEventListener("click", () => {
        carrusel.scrollLeft += btn.id == "left-slider" ? -anchoPrimeraTarjeta : anchoPrimeraTarjeta;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carrusel.classList.add("dragging-slider");
    // Registra la posición inicial del cursor y la posición de desplazamiento inicial del carrusel
    startX = e.pageX;
    startScrollLeft = carrusel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; // Si isDragging es false, regresa desde aquí
    // Actualiza la posición de desplazamiento del carrusel basándose en el movimiento del cursor
    carrusel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carrusel.classList.remove("dragging-slider");
}

const desplazamientoInfinito = () => {
    // Si el carrusel está al principio, desplázalo al final
    if(carrusel.scrollLeft === 0) {
        carrusel.classList.add("no-transition-slider");
        carrusel.scrollLeft = carrusel.scrollWidth - (2 * carrusel.offsetWidth);
        carrusel.classList.remove("no-transition-slider");
    }
    // Si el carrusel está al final, desplázalo al principio
    else if(Math.ceil(carrusel.scrollLeft) === carrusel.scrollWidth - carrusel.offsetWidth) {
        carrusel.classList.add("no-transition-slider");
        carrusel.scrollLeft = carrusel.offsetWidth;
        carrusel.classList.remove("no-transition-slider");
    }

    // Limpiar el timeout existente e iniciar la reproducción automática si el mouse no está sobre el carrusel
    clearTimeout(timeoutId);
    if(!envoltorio.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if(window.innerWidth < 800 || !isAutoPlay) return; // Regresar si la ventana es más pequeña que 800 o isAutoPlay es falso
    timeoutId = setTimeout(() => carrusel.scrollLeft += anchoPrimeraTarjeta, 8000);
}
autoPlay();

carrusel.addEventListener("mousedown", dragStart);
carrusel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carrusel.addEventListener("scroll", desplazamientoInfinito);
envoltorio.addEventListener("mouseenter", () => clearTimeout(timeoutId));
envoltorio.addEventListener("mouseleave", autoPlay);

</script>