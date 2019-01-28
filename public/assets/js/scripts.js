$(document).ready(function(){
  //Hace submit del formulario de contacto
  $('#enviar-form-contacto').click(function(e){
    e.preventDefault();
    $('#submit-form-contacto').click();
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

    //Mostrar y ocultar formulario de cambiar contraseña
    $('#change-password-button').on('click', function(){
      $('#change-password-element').fadeToggle();
      $(this).hide();
    });
});
