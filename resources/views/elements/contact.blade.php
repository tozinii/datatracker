<div class="book_now_aera ">
  <div class="container">
    <div class="row book_now bg-new">
        <div class="col-md-7 booking_text">
          <form id="form-contacto" method="POST" action="{{ route('postContact') }}">
            @csrf
            <label>Nombre: </label>
            <input type="text" name="name"placeholder="Nombre" />
            <label>E-mail: </label>
            <input type="text" name="email" placeholder="E-mail" /><br />
            <label>Mensaje:</label><br />
            <textarea form="form-contacto" name="message" placeholder="Texto"></textarea>
          </form>
        </div>
      <div class="col-md-5 p0 book_bottun">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
          <div class="top-banner wow fadeInRight text-left" style="visibility: visible; animation-name: fadeInRight;">
            <a id="enviar-form-contacto" href="#" class="btn btn-primary button_12  wow fadeInUp  js-scroll-trigger" data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;"><span class="skew_14">ENVIAR</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
