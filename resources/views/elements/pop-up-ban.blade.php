<div class="modal fade" id="ban{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Banear cuenta</h4>
      </div>
      <div class="modal-body">
        <h5>¿Está usted seguro de querer darse de baja? </h5>
        <form id="ban-form" action="{{ route('profile.destroy',$user->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btnedit btnedit-outline-danger btnedit-size">Ban</button>
          <button type="button" class="btnedit btnedit-outline-secondary btnedit-size " data-dismiss="modal" aria-label="Close">Cancel</button>
        </form>        
      </div>
    </div>
  </div>
</div>
