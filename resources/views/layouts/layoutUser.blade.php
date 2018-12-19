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
                 <div class="container ">
                    <div class="row">
                      <div class="book_now_aera_register ">
                         <div class="container">
                            <div class="row book_now_register bg-new">
                               <div class="col-md-7 booking_text_register">
                                  <h2>Verifica tu correo electrónico</h2>
                                  <p>Before proceeding, please check your email for a verification link.</p>
                                  <p>If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another</a>.</p>
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
