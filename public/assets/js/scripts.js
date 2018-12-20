var validRegisterName = false;
var validRegisterEmail = false;
var validRegisterPassword = false;
var validRegisterConfirmPassword = false;
var validLoginEmail = false;
var validLoginPassword = false;

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
          validRegisterName = true;
        }else{
          $('#register-name-error-text').css('display','block');
          validRegisterName = false;
        }
      registerValidated();
      });
      //Validacion email
    	$('#register-email').on('input', function(){
    		if(isValidEmail($(this).val())){
    			$('#register-email-error-text').css('display','none');
    			validRegisterEmail = true;
    		}else{
    			$('#register-email-error-text').css('display','block');
    			validRegisterEmail = false;
    		}
        registerValidated();
      });
      //Validación contraseña
      $('#register-password').on('input', function(){
        if(isValidPassword($(this).val())){
          $('#register-password-error-text').css('display','none');
          validRegisterPassword = true;
        }else{
          $('#register-password-error-text').css('display','block');
          validRegisterPassword = false;
        }
        registerValidated();
      });
      //Validación repetir contraseña
      $('#register-confirm-password').on('input', function(){
        if(passwordMatches($('#register-password').val(),$(this).val())){
          $('#register-confirm-password-error-text').css('display','none');
          validRegisterConfirmPassword = true;
        }else{
          $('#register-confirm-password-error-text').css('display','block');
          validRegisterConfirmPassword = false;
        }
        registerValidated();
      });
    //Validación login
      //Validación email
      $('#login-email').on('input', function(){
        if(isValidEmail($(this).val())){
          $('#login-email-error-text').css('display','none');
          validLoginEmail = true;
        }else{
          $('#login-email-error-text').css('display','block');
          validLoginEmail = false;
        }
        loginValidated();
      });
      //Validación password
      $('#login-password').on('input', function(){
        if(isValidPassword($(this).val())){
          $('#login-password-error-text').css('display','none');
          validLoginPassword = true;
        }else{
          $('#login-password-error-text').css('display','block');
          validLoginPassword = false;
        }
        loginValidated();
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

function registerValidated(){
  if(validRegisterName && validRegisterEmail &&
    validRegisterPassword && validRegisterConfirmPassword){
    $('#register-submit').prop('disabled',false);
  }else{
    $('#register-submit').prop('disabled',true);
  }
}

function loginValidated(){
  if(validLoginEmail && validLoginPassword){
    $('#login-submit').prop('disabled',false);
  }else{
    $('#login-submit').prop('disabled',true);
  }
}
