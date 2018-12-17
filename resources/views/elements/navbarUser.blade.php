 <div class="header-logo">
   <a class="navbar-brand logo-biss" href="/"> <img src="assets/images/logo.png">  </a>
</div>
<!-- end header-logo -->
<div class="main-navbar">
   <ul>
      <li class="current"><a class=""  href="/" >Inicio</a></li>
      <li><a class=""  href="#equipo" >Herramientas</a></li>
      <li><a class=""  href="#testimonials" >¿Quiénes somos?</a></li>
      <li><a class=""  href="#contacto" >Contacto</a></li>
      <li><a class=""  href="{{ route('logout')}}">Cerrar Sesión</a></li>
   </ul>
</div>

<nav class="header-nav">
   <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>
   <div class="header-nav__content">
      <h3>Euskelec Data Tracker </h3>
      <ul class="header-nav__list">
         <li class="current"><a class="" href="/" >Inicio</a></li>
         <li><a class=""  href="#herramientas" >Herramientas</a></li>
         <li><a class=""  href="#nosotros" >¿Quiénes somos?</a></li>
         <li><a class=""  href="#contacto" >Contacto</a></li>
         <li><a class=""  href="{{route('logout')}}">Cerrar Sesión</a></li>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
         </form>
      </ul>
      <ul class="header-nav__social">
         <li>
            <a href="" target="_blank"><i  class="fa fa-facebook-square fa-3x social"></i></a>
         </li>
         <li>
            <a href="" target="_blank"><i  class="fa fa-twitter-square fa-3x social"></i></a>
         </li>
         <li>
            <a href="" target="_blank"><i  class="fa fa-instagram fa-3x social"></i></a>
         </li>
         <li>
            <a href="#0"><i class="fa fa-linkedin-square fa-3x social"></i></a>
         </li>

      </ul>

   </div>
<!-- end header-nav__content -->
</nav>
<!-- end header-nav -->
<a class="header-menu-toggle" href="#0">
   <span class="header-menu-icon"></span>
</a>
