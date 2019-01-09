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
               <header class="">
                  <!-- Crear elemento layout para el navegador en la columna izquierda
                  -->
                  @include('elements.navCol')

               </header>
            </div>
         </div>
      </div>

      <div class="container-profile">
         @yield('contenido')




         <!--#start Our footer Area -->
         <div class="our_footer_area">
            @include('elements.footer')
         </div>

      </div>
      <!--#End Our footer Area -->
      @include('elements.scripts')
   </body>
</html>
