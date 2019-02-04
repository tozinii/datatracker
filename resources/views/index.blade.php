@extends('layouts.layoutPrincipal')

@section('banner')

@include('elements.banner-img')

@endsection
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
                  <p class="about_h wow fadeInUp " data-wow-delay=" 0.5s" style="visibility: visible; animation-name: fadeInRight;">Construye tu propio coche</p>
                  <p class="about_bottom_h wow fadeInUp " data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;">Compra por piezas o un kit entero y monta de manera fácil <br>y sencilla tu propio coche eléctrico.</p>
                  <!--<div class="left-services wow fadeInRight text-right" style="visibility: visible; animation-name: fadeInRight;">
                     <a id="#services" href="#services" class="btn btn-default wow fadeInUp js-scroll-trigger disabled-link" data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;"><span class="skew_14">Sobre nosotros</span></a>
                  </div>-->
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
                     <p class="about_h wow fadeInUp " data-wow-delay=" 0.5s" style="visibility: visible; animation-name: fadeInRight;">Estadísticas</p>
                     <p class="about_bottom_h wow fadeInUp " data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;">Visualiza de una manera fácil y sencilla los datos recibidos <br>y mejora las capacidades de tu coche.</p>
                     <!--<div class="left-services_32 wow fadeInRight text-left" style="visibility: visible; animation-name: fadeInRight;">
                        <a id="#services" href="#services" class="btn btn-default wow fadeInUp js-scroll-trigger disabled-link" data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;"><span class="skew_14">Sobre nosotros</span></a>
                     </div>-->
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
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/Iker_Apaolaza.png" alt="">
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
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/Jon_Jauregui.png" alt="Jon Jauregi">
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
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/Ander_Gonzalez.png" alt="Ander González">
               </div>
            </div>
         </div>
         <div class="item">
            <div class="text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">Ekaitz Diestre </h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en electrónica<br> en Don bosco. </p>
            <div class="media">
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/Ekaitz.png" alt="Ekaitz Diestre">
               </div>
            </div>
         </div>
         <div class="item">
            <div class="text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">Pablo Hernández </h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en electrónica<br> en Don bosco. </p>
            <div class="media">
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/Pablo.png" alt="Pablo Hernández">
               </div>
            </div>
         </div>
         <div class="item">
            <div class="text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">Sergei Susperregui </h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en electrónica<br> en Don bosco. </p>
            <div class="media">
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/Sergei.png" alt="Sergei Susperregui">
               </div>
            </div>
         </div>
         <div class="item">
            <div class="text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">David García</h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en automoción<br> en Don bosco. </p>
            <div class="media">
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/DavidGarcia.png" alt="David García">
               </div>
            </div>
         </div>
         <div class="item">
            <div class="text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">David Martín </h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en automoción<br> en Don bosco. </p>
            <div class="media">
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/DavidMartin.png" alt="David Martín">
               </div>
            </div>
         </div>
         <div class="item">
            <div class="text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">Kaiet López de Etxezarreta </h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en automoción<br> en Don bosco. </p>
            <div class="media">
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/Kaiet.png" alt="Kaiet López de Etxezarreta">
               </div>
            </div>
         </div>
         <div class="item">
            <div class="text-center">
               <div class="img-s ">
                  <img src="assets/images/testimonial-top.png">
               </div>
               <h4 class="body-slider media-heading">Miguel Ángel Díaz</h4>
               <hr class="slider_hr">
            </div>
            <p>Estudiante de grado superior en automoción<br> en Don bosco. </p>
            <div class="media">
               <div class="media-body">
                  <img class="media-object" src="assets/images/team/Miguel.png" alt="Miguel Ángel Díaz">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--#End Our testimonial Area -->
<div id="contacto" class="our_partners_area ">
   @include('elements.contact')
</div>
@endsection
