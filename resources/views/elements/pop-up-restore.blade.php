<div class="modal fade" id="restore{{$banned->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel2">Desbanear cuenta</h4>
      </div>
      <div class="modal-body">
        <h5>¿Está usted seguro de querer desbanear a {{ $banned->name }}  {{$banned->id}}?</h5>
          <form id="restored-form" action="{{ route('restore',$banned->id) }}" method="post">
              @csrf
          <button type="submit" id="restore" class="btnedit btnedit-outline-success2">Restore</button>
          <button type="button" class="btnedit btnedit-outline-secondary btnedit-size " data-dismiss="modal" aria-label="Close">Cancel</button>
          </form>      
      </div>
    </div>
  </div>
</div>
