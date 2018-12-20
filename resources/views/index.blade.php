@extends('layouts.layoutPrincipal')
@section('contenido')
      <!--start Hey title Area-right_img -->
      <section class="" >
         <div class="container-fluid ">
            <div class="row text-left about_row_2 clip-polygon_right_2">
               <div class="col-md-5 p-0 clip-polygon_left_2 wow fadeInUp">
                  <div class="video-img">
                  </div>
               </div>
               <div id="equipo" class="col-md-7 wow fadeInUp  pl_90 pr_90">
                  <p class="about_h wow fadeInUp " data-wow-delay=" 0.5s" style="visibility: visible; animation-name: fadeInRight;">Equipo</p>
                  <p class="about_bottom_h wow fadeInUp " data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;">Crea o unete a un grupo y recopila información de los sensores implantados en vuestro coche para tener la certeza de poner en marcha el coche en cualquier momento.</p>
                  <div class="left-services wow fadeInRight text-right" style="visibility: visible; animation-name: fadeInRight;">
                     <a id="#services" href="#services" class="btn btn-default wow fadeInUp js-scroll-trigger disabled-link" data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;"><span class="skew_14">Sobre nosotros</span></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End Hey title Area-right_img -->
         <!--#strat service-text  -->
         <section class="">
            <div class="container-fluid ">
               <div class="row text-left about_row clip-polygon_right ">
                  <div id="estadisticas" class="col-md-7 wow fadeInUp pl_90 pr_90">
                     <p class="about_h wow fadeInUp " data-wow-delay=" 0.5s" style="visibility: visible; animation-name: fadeInRight;">Estadisticas</p>
                     <p class="about_bottom_h wow fadeInUp " data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;">Visualiza de una manera facil y sencilla los datos recibidos <br>y mejora las capacidades de tu coche.</p>
                     <div class="left-services_32 wow fadeInRight text-left" style="visibility: visible; animation-name: fadeInRight;">
                        <a id="#services" href="#services" class="btn btn-default wow fadeInUp js-scroll-trigger disabled-link" data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;"><span class="skew_14">Sobre nosotros</span></a>
                     </div>
                  </div>
                  <div class="col-md-5 p-0 clip-polygon_left wow fadeInUp">
                     <div class="video-img">
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!--#End service-text  -->
@endsection

@section('members')

<section id="testimonials" class="testimonial_area row">
   <div class="container ">
      <div class="title wow fadeInUp">
      </div>
      <div class="testimonial_carosel">
         <div class="item">
            <div class="text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">Iker Apaolaza </h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en desarrollo web<br> en IES Zubiri - Manteo. </p>
            <div class="media">
               <div class="media-left">
                  <a href="#">
                  <img class="media-object" src="assets/images/testimonial-3.jpg" alt="">
                  </a>
               </div>
               <div class="media-body">
                  <h4 class="media-heading">Iker Apaolaza <span class="slider_span_color"></span></h4>
               </div>
            </div>
         </div>
         <div class="item">
            <div class=" text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">Jon Jauregi </h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en desarrollo web<br> en IES Zubiri - Manteo.  </p>
            <div class="media">
               <div class="media-left">
                  <a href="#">
                  <img class="media-object" src="assets/images/testimonial-2.jpg" alt="">
                  </a>
               </div>
               <div class="media-body">
                  <h4 class="media-heading">Jon Jauregi <span class="slider_span_color"></span></h4>
               </div>
            </div>
         </div>
         <div class="item">
            <div class=" text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">Ander González </h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en desarrollo web<br> en IES Zubiri - Manteo.  </p>
            <div class="media">
               <div class="media-left">
                  <a href="#">
                  <img class="media-object" src="assets/images/testimonial-3.jpg" alt="">
                  </a>
               </div>
               <div class="media-body">
                  <h4 class="media-heading">Ander González <span class="slider_span_color"></span></h4>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
