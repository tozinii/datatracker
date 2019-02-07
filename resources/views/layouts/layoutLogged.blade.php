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
        <div class="container">
          @yield('contenido')
        </div>

      </div>
      @include('elements.scripts')
   </body>
</html>
