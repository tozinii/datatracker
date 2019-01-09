window.onload = function () {
  document.getElementById('editarPerfil').addEventListener('click', function() {

    document.getElementById('profile-name').removeAttribute('disabled');
    document.getElementById('apellido').removeAttribute('disabled');
    document.getElementById('profile-email').removeAttribute('disabled');
    document.getElementById('descripcion').removeAttribute('disabled');
    document.getElementById('avatar').removeAttribute('disabled');

    document.getElementById('guardarPerfil').style.visibility = "visible";
    document.getElementById('editarPerfil').style.visibility = "hidden";
  })
}
