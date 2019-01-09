//Variables para validación de register
var validRegisterName = false;
var validRegisterEmail = false;
var validRegisterPassword = false;
var validRegisterConfirmPassword = false;

//Variables para validación de login
var validLoginEmail = false;
var validLoginPassword = false;

//Variables para validación de reset password
var validResetPasswordEmail = false;

//Variables para validación de user profile
var validProfileName =false;
var validProfileEmail = false;

$(document).ready(function(){
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

    //Validacion reset password
      $('#reset-password-email').on('input', function(){
        if(isValidEmail($(this).val())){
          $('#reset-password-error-text').css('display','none');
          validResetPasswordEmail = true;
        }else{
          $('#reset-password-error-text').css('display','block');
          validResetPasswordEmail = false;
        }
        resetPasswordEmailValidated();
      });

    //Validación user profile
      //Validación nombre
      $('#profile-name').on('input', function(){
        var nameReg = /^[a-zA-Z]+$/;
        if($(this).val().match(nameReg)){
          $('#profile-name').css('border','1px solid black');
          validProfileName = true;
        }else{
          $('#profile-name').css('border','1px solid red');
          validProfileName = false;
        }
      userProfileValidated();
      });

      //Validacion email
    	$('#profile-email').on('input', function(){
    		if(isValidEmail($(this).val())){
    			$('#profile-email').css('border','1px solid black');
    			validProfileEmail = true;
    		}else{
    			$('#profile-email').css('border','1px solid red');
    			validProfileEmail = false;
    		}
        userProfileValidated();
      });
});

//Funciones validacion login y register
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

//Función validacion reset password
function resetPasswordEmailValidated(){
  if(validResetPasswordEmail){
    $('#reset-password-submit').prop('disabled', false);
  }else{
    $('#reset-password-submit').prop('disabled', true);
  }
}

//Función para validación user profile
function userProfileValidated(){
  if(validProfileName && validProfileEmail){
    $('#guardarPerfil').prop('disabled', false);
  }else{
    $('#guardarPerfil').prop('disabled', true);
  }
}
