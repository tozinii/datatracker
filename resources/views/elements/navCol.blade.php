


<div id="mySidenav" class="sidenav">
   <a class="navCol-icon" href="/home"> <img src="{{asset('assets/images/logo.png')}}"></a>
   <!--          Starts views-menu        -->
   <div>
      <ul class="nav flex-column">
        <li class="nav-item lista">
          <a class="nav-link active" href="{{route('profile')}}">Perfil</a>
        </li>
        <li class="nav-item lista">
          <a class="nav-link" href="/groups">Grupos</a>
        </li>
        <li class="nav-item lista">
          <a class="nav-link" href="cars">Coches</a>
        </li>
        <li class="nav-item lista">
          <a class="nav-link disabled" href="/sensors">Sensores</a>
        </li>
        <li class="nav-item lista">
          <a class="nav-link disabled" href="{{ route('logout')}}"  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Cerrar Sesión</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
        </form>
        </li>
      </ul>
   </div>
   <!--          Ends views-menu           -->

   <!--       Starts profile-options       -->
   <div class="nav-icon">
     <img  src="{{asset('assets/images/navIcon.png')}}">
   </div>
</div>
