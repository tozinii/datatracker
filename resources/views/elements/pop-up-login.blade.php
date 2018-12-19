<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicia Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-login" method="POST" action="{{ route('login') }}">
          @csrf
          <label>E-mail: </label>
          <input type="text" name="email" placeholder="E-mail" /><br/>
          <label>Contraseña: </label>
          <input type="password" name="password" placeholder="Contraseña" />
          <button type="submit" class="btn btn-primary">Inicia Sesión</button>
        </form>
        <a href="#" style="color:">Has olvidado la contraseña?</a>
      </div>
    </div>
  </div>
</div>
