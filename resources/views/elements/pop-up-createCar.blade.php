<div class="modal fade" id="createCar{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Personaliza tu coche</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{ route('cars.store') }}" method="post">
          @csrf
          <input type="hidden" name="kit" value="{{$i}}">
          <label>Nombre del coche: </label>
          <input id="carname" type="text" name="carname" placeholder="Nombre del coche" required /><br/>
          <!--<span id="login-email-error-text" class="form-error">Introduce un correo válido</span>
          <span id="login-password-error-text" class="form-error">La contraseña debe tener 8 carácteres o más</span>-->
          <button type="submit" class="btnedit btnedit-outline-success2">Aceptar</button>
          <button type="button" class="btnedit btnedit-outline-secondary btnedit-size " data-dismiss="modal" aria-label="Close">Cancel</button>
          </form>   
        </form>


      </div>
    </div>
  </div>
</div>
