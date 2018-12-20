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

               <!-- end s-header -->
               <!-- End Header_Area -->
               <!-- #banner start -->
               <section id="banner" class=" mb-90">
                  @yield('bienvenido')
               </section>
               <div class="container-fluid p0 banner-shap-img">
               </div>
            </div>
         </div>
         <!-- /#banner end -->

         <!--#strat service-text  -->

      </div>
      <!--#End service-text  -->
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
