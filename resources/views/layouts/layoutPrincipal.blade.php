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
               @guest
                 <header class="s-header">
                     @include('elements.navBar')
                 </header>
               @else
                  <header class="s-header">
                     @include("elements.navbarUser")
                 </header>

               @endguest

              @include('elements.pop-up-login')
               <!-- end s-header -->
               <!-- End Header_Area -->
               <!-- #banner start -->
               <section id="banner" class=" mb-90">
                  @yield('banner')
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
      @yield('members')
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
