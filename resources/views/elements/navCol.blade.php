


<div id="mySidenav" class="sidenav">
  @if(auth()->user()->role == 'User')
   <a class="navCol-icon" href="/home"> <img src="{{asset('assets/images/logo.png')}}"></a>

  @else
    <a class="navCol-icon" href="{{route('admin')}}"> <img src="{{asset('assets/images/logo.png')}}"></a>
  @endif
   <!--          Starts views-menu        -->
   <div>
      <ul class="nav flex-column">
        <li class="nav-item lista">
          <a class="nav-link collapsed" href="#submenu" data-toggle="collapse" data-target="#submenu">{{auth()->user()->name}}</a>
          <div class="collapse" id="submenu" aria-expanded="false">
            <ul class="nav flex-column p-4">
              <li class="nav-item lista">
                <a class="nav-link" href="{{route('profile.show',auth()->user()->id)}}">Perfil</a>
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
        </li>
        @if(auth()->user()->role == 'User')
          <li class="nav-item lista">
            <a class="nav-link" href="/groups">Grupos</a>
          </li>
          <li class="nav-item lista">
            <a class="nav-link" href="cars">Coches</a>
          </li>
          <li class="nav-item lista">
            <a class="nav-link disabled" href="/sensors">Sensores</a>
          </li>
        @else
          <li class="nav-item lista">
            <a class="nav-link" href="{{route('listUsers')}}">Lista de usuarios</a>
          </li>
          <li class="nav-item lista">
            <a class="nav-link" href="/groups">Estadisticas</a>
          </li>
        @endif
      </ul>
   </div>
   <!--          Ends views-menu           -->
</div>
