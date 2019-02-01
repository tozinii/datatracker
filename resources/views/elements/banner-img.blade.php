<div class="container ">
   <div class="row">
   <!-- #banner-text start -->
      <div id="banner-text" class="col-md-7 text-c text-left ">
         <h5 class="wow fadeInUp main-h" data-wow-delay="0.2s" >Matxingo Data tracker</h5>
         <p class="banner-text wow fadeInUp main-h3" data-wow-delay="0.8s">Compra un coche eléctrico y gestiona sus datos para<br> mejorar su rendimiento y capacidades. </p>
         <div class="top-banner wow fadeInRight">
            <a id="services"  href="#equipo" class="btn btn-default  wow fadeInUp  js-scroll-trigger" data-wow-delay=" 0.5s"><span class="skew_14"><i> Más información </i> </span></a>
         </div>
      </div>
      <!-- /#banner-text End -->
      <div class="our_partners_area_register ">
         <div class="book_now_aera_register ">
            <div class="container">
               <div class="row book_now_register bg-new">
                  <div class="col-md-7 booking_text_register">
                     <h2>¡Regístrate!</h2>
                     <a id="services" href="" data-target="#registrar" data-toggle="modal" data-whatever="@mdo" class="btn btn-primary button_12  wow fadeInUp  js-scroll-trigger" data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;"><span class="skew_14">¡Regístrate!</span></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Pop up register -->
      <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Añada sus datos para registrarse:</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-register" action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name" class="col-form-label">Nombre:</label>
                  <input id="register-name" type="text" class="form-control" placeholder="Nombre" name="name" required>
                  <span id="register-name-error-text" class="form-error">Introduce un nombre válido</span>
                </div>
                <div class="form-group">
                  <label for="email" class="col-form-label">Correo electrónico:</label>
                  <input id="register-email" type="email" name="email" placeholder="Correo electrónico" class="form-control" required>
                  <span id="register-email-error-text" class="form-error">Introduce un correo válido</span>
                </div>
                <div class="form-group">
                   <label for="password" class="col-form-label">Contraseña:</label>
                   <input id="register-password" type="password" class="form-control" placeholder="Contraseña" name="password" required>
                   <span id="register-password-error-text" class="form-error">La contraseña debe tener 8 carácteres o más</span>
                </div>
                <div class="form-group">
                   <label for="password" class="col-form-label">Confirmar contraseña:</label>
                   <input id="register-confirm-password" type="password" class="form-control" placeholder="Repita su contraseña" name="password_confirmation" required>
                   <span id="register-confirm-password-error-text" class="form-error">Las contraseñas no coinciden</span>
                </div>
              <button id="register-submit" type="submit" class="btn btn-primary">Registrar</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- se cierra pop up register -->
   </div>
</div>
