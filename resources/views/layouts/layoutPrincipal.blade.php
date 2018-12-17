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
              @include('elements.pop-up-login')
               <!-- end s-header -->
               <!-- End Header_Area -->
               <!-- #banner start -->
               <section id="banner" class=" mb-90">
                  @include('elements.banner-img')
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
