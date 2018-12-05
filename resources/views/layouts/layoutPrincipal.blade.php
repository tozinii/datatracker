<!DOCTYPE html>
<html lang="en">
   <head>
      @include('elements.head')
   </head>
   <body id="top">
      <div class="bg-grediunt">
         <div class="bg-banner-img ">
            <div class="overlay-all ">
               <!-- Header_Area -->
               <!-- header
                  ================================================== -->
               <header class="s-header">
                  @include('elements.navBar')
               </header>
               <!-- end s-header -->
               <!-- End Header_Area -->
               <!-- #banner start -->
               <section id="banner" class=" mb-90">
                  <div class="container ">
                     <div class="row">
                        <!-- #banner-text start -->
                        <div id="banner-text" class="col-md-7 text-c text-left ">
                           <h5 class="wow fadeInUp main-h" data-wow-delay="0.2s" >Euskelec Data Tracker</h5>
                           <p class="banner-text wow fadeInUp main-h3" data-wow-delay="0.8s">Administra tus coches y gestiona sus datos para<br> mejorar su rendimiento y capacidades. </p>
                           <div class="top-banner wow fadeInRight">
                              <a id="#services"  href="#equipo" class="btn btn-default  wow fadeInUp  js-scroll-trigger" data-wow-delay=" 0.5s"><span class="skew_14"><i> Más información </i> </span></a>
                           </div>
                        </div>
                        <!-- /#banner-text End -->
                        <div class="our_partners_area_register ">
                           <div class="book_now_aera_register ">
                              <div class="container">
                                 <div class="row book_now_register bg-new">
                                    <div class="col-md-7 booking_text_register">
                                          <h2>¡Registrate!
                                          </h2>
                                          <a id="#services" href="#services" class="btn btn-primary button_12  wow fadeInUp  js-scroll-trigger" data-wow-delay=" 0.5s" style="visibility: visible; animation-delay:  0.5s; animation-name: fadeInUp;"><span class="skew_14">Registrate!</span></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </section>
               <div class="container-fluid p0 banner-shap-img">
               </div>
            </div>
         </div>
         <!-- /#banner end -->
      <!--start Hey title Area-right_img -->
        @yield('contenido')
      <!--End Hey title Area-right_img -->
         <!--#strat service-text  -->

      </div>
      <!--#End service-text  -->
      <!--#Our Testimonial Area start-->
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
      <!--#End Our testimonial Area -->
      <div id="contacto" class="our_partners_area ">
         @include('elements.contact')
      </div>
      <!--#start Our footer Area -->
      <div class="our_footer_area">
         @include('elements.footer')
      </div>
      <!--#End Our footer Area -->
      @include('elements.scripts')
   </body>
</html>
