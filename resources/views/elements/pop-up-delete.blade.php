<div class="modal fade" id="delete{{$banned->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Eliminar cuenta</h4>
      </div>
      <div class="modal-body">
        <h5>¿Está usted seguro de querer eliminar a {{ $banned->name }}  {{$banned->id}}? No podrá volver a recuperarla más adelante. </h5>
        <form id="delete-form" action="{{ route('forceDelete',$banned->id) }}" method="post">
          @csrf
          <button type="submit"  class="btnedit btnedit-outline-danger btnedit-size">Delete</button>
          <button type="button" class="btnedit btnedit-outline-secondary btnedit-size" data-dismiss="modal" aria-label="Close">Cancel</button>
        </form>        
      </div>
    </div>
  </div>
</div>
