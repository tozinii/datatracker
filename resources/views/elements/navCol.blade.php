<div class="sidenav">
  <div class="sidenav-header-logo">
  @if(auth()->user()->role == 'User')
   <a class="navCol-icon" href="/home"> <img src="{{asset('assets/images/logo.png')}}"></a>
  @else
    <a class="navCol-icon" href="{{route('admin')}}"> <img src="{{asset('assets/images/logo.png')}}"></a>
  @endif
  </div>
  <!--Starts views-menu-->
  <div>
    <ul class="nav flex-column">
      <li class="nav-item lista">
        <a class="navcol-link collapsed" href="#submenu" data-toggle="collapse" data-target="#submenu">{{auth()->user()->name}}</a>
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
          <a class="nav-link" href="{{route('cars.index')}}">Coches</a>
        </li>
      @else
        <li class="nav-item lista">
          <a class="nav-link" href="{{route('listUsers')}}">Lista de usuarios</a>
        </li>
        <li class="nav-item lista">
          <a class="nav-link" href="{{route('statistics')}}">Estadisticas</a>
        </li>
      @endif
    </ul>
  </div>
  <!--Ends views-menu-->
</div>


<nav id="menu-hamburger" class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <div class="sidenav-header-logo">
      @if(auth()->user()->role == 'User')
       <a class="navCol-icon" href="/home"> <img src="{{asset('assets/images/logo.png')}}"></a>
      @else
        <a class="navCol-icon" href="{{route('admin')}}"> <img src="{{asset('assets/images/logo.png')}}"></a>
      @endif
      </div>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
      </button>
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <!--<ul class="nav navbar-nav">
        <li class="nav-item lista">
          <a class="navcol-link collapsed" href="#submenu" data-toggle="collapse" data-target="#submenu">{{auth()->user()->name}}</a>
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
            <a class="nav-link" href="{{route('cars.index')}}">Coches</a>
          </li>
        @else
          <li class="nav-item lista">
            <a class="nav-link" href="{{route('listUsers')}}">Lista de usuarios</a>
          </li>
          <li class="nav-item lista">
            <a class="nav-link" href="{{route('statistics')}}">Estadisticas</a>
          </li>
        @endif
      </ul>-->
    </div>
  </div>
</nav>
