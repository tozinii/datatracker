window.onload = function () {
  document.getElementById('editarPerfil').addEventListener('click', function() {

    document.getElementById('nombre').removeAttribute('disabled');
    document.getElementById('apellido').removeAttribute('disabled');
    document.getElementById('emailPerfil').removeAttribute('disabled');
    document.getElementById('descripcion').removeAttribute('disabled');
    document.getElementById('imagenPerfil').removeAttribute('disabled');

    document.getElementById('guardarPerfil').style.visibility = "visible";
    document.getElementById('editarPerfil').style.visibility = "hidden";
  })
}
