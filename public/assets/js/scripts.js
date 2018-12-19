$(document).ready(function(){

  //Hace submit del formulario de contacto
  $('#enviar-form-contacto').click(function(){
      $('#form-contacto').submit();
  });

  //Validación formularios register y login
    //Validación register
      //Validación Nombre
      $('#register-name').on('input', function(){
        var nameReg = /^[a-zA-Z]+$/;
        if($(this).val().match(nameReg)){
          $('#register-name-error-text').css('display','none');
          $('#register-submit').prop('disabled',false);
        }else{
          $('#register-name-error-text').css('display','block');
          $('#register-submit').prop('disabled',true);
        }
      });
      //Validacion email
    	$('#register-email').on('input', function(){
    		if(isValidEmail($(this).val())){
    			$('#register-email-error-text').css('display','none');
    			$('#register-submit').prop('disabled',false);
    		}else{
    			$('#register-email-error-text').css('display','block');
    			$('#register-submit').prop('disabled',true);
    		}
      });
      //Validación contraseña
      $('#register-password').on('input', function(){
        if(isValidPassword($(this).val())){
          $('#register-password-error-text').css('display','none');
          $('#register-submit').prop('disabled',false);
        }else{
          $('#register-password-error-text').css('display','block');
          $('#register-submit').prop('disabled',true);
        }
      });
      //Validación repetir contraseña
      $('#register-confirm-password').on('input', function(){
        if(passwordMatches($('#register-password').val(),$(this).val())){
          $('#register-confirm-password-error-text').css('display','none');
          $('#register-submit').prop('disabled',false);
        }else{
          $('#register-confirm-password-error-text').css('display','block');
          $('#register-submit').prop('disabled',true);
        }
      });
    //Validación login
      //Validación email
      $('#login-email').on('input', function(){
        if(isValidEmail($(this).val())){
          $('#login-email-error-text').css('display','none');
          $('#login-submit').prop('disabled',false);
        }else{
          $('#login-email-error-text').css('display','block');
          $('#login-submit').prop('disabled',true);
        }
      });
      //Validación password
      $('#login-password').on('input', function(){
        if(isValidPassword($(this).val())){
          $('#login-password-error-text').css('display','none');
          $('#login-submit').prop('disabled',false);
        }else{
          $('#login-password-error-text').css('display','block');
          $('#login-submit').prop('disabled',true);
        }
      });


});
//Funciones validacion register
function isValidEmail(email){
  if(email.includes('@') &&
    email.includes('.') &&
    email.length > 2 &&
    email.indexOf(' ') == -1 &&

    email.indexOf('@') == email.lastIndexOf('@') &&
    email.indexOf('@') < email.lastIndexOf('.') &&

    email.lastIndexOf('.') + 2 < email.length &&
    email.lastIndexOf('.') + 7 > email.length &&
    email.lastIndexOf('.') - email.lastIndexOf('@') > 1

  ){
    return true;
  }
  return false;
}

function isValidPassword(password){
  if(password.length > 7){
    return true;
  }
  return false;
}

function passwordMatches(password, confirmPassword){
  if(password === confirmPassword){
    return true;
  }
  return false;
}
