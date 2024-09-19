//// aca va para que se muestre la imagen al ser seleccionada

function mostrarImagen(inputId, imagenId) {
  var input = document.getElementById(inputId);
  var imgMostrada = document.getElementById(imagenId);

  // verificar si se selecciono un archivo
  if (input.files && input.files[0]) {
    var lector = new FileReader();

    lector.onload = function (e) {
      imgMostrada.src = e.target.result;
      imgMostrada.style.display = "block"; // mostrar

      input.value = "";
    };

    lector.readAsDataURL(input.files[0]);
  }
}
mostrarImagen("imagenInput1", "imagenMostrada1");
mostrarImagen("imagenInput2", "imagenMostrada2");