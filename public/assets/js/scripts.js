$(document).ready(function(){
  //Hace submit del formulario de contacto
  $('#enviar-form-contacto').click(function(e){
    e.preventDefault();
    $('#submit-form-contacto').click();
  });

  //Eventos navCol
  $('#navcol-toggle-submenu').on('mouseover',function(e){
    e.preventDefault();
    $(this).css('cursor','pointer');
  });

  //Scrolling al clicar en un elemento de navbar
    $('.nav-herramientas').click(function() {
      $('html, body').animate({
        scrollTop: $('#equipo').offset().top
      }, 500, function(){
        window.scrollTo(0, 1100);
      });
    });

    $('.nav-quienes-somos').click(function() {
      $('html, body').animate({
        scrollTop: $('#testimonials').offset().top
      }, 500);
    });

    $('.nav-contacto').click(function() {
      $('html, body').animate({
        scrollTop: $('#contacto').offset().top
      }, 500);
    });

    $('#services').click(function() {
      $('html, body').animate({
        scrollTop: $('#equipo').offset().top
      }, 500, function(){
        window.scrollTo(0, 1100);
      });
    });

    //Mostrar y ocultar formulario de cambiar contraseña
    $('#change-password-button').on('click', function(){
      $('#change-password-element').fadeToggle();
      $(this).hide();
    });

    //Scripts para formularios de edición
      //Editar Perfil
      $('#editarPerfil').on('click', function() {

        $('#profile-name').removeAttr('disabled');
        $('#apellido').removeAttr('disabled');
        $('#profile-email').removeAttr('disabled');
        $('#descripcion').removeAttr('disabled');
        /*$('#avatar').removeAttr('disabled');
        $('.upload-btn').removeAttr('disabled');*/

        $('#editarPerfil').fadeToggle(function(){
          $('#guardarPerfil').fadeToggle();
        });
      });

    //Editar coche
    $('#edit-car').on('click', function() {

      $('#car-code').removeAttr('disabled');
      $('#car-description').removeAttr('disabled');

      $('#edit-car').fadeToggle(function(){
        $('#save-car').fadeToggle();
      });
    });
});

function getSensores(){
  
  var sensores=[valor: ];
    $.get( "/api/lastdata/", function( result ) {
      for(var i=0;i<result.length;i++){
        sensores+=(result[i], true);
      }
        if(sensores==""){
          sensores="value='Sin valor'";
        }
        document.getElementById("valor").innerHTML=sensores;
      });
    });
}
