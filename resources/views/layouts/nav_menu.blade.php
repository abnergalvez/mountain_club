
<nav class="navbar navbar-default navbar-static-top navbar-inverse ">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Club Andino Piramide') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else

                  @if(\Auth::user()->role == 'admin')
                    <li class="dropdown @if(isset($section)){{ $section=='reuniones'?'active':''}}@endif">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Reuniones <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/meetings">Gestionar</a></li>
                            <li><a href="/meetings_assistance">Pasar Lista</a></li>
                            <li><a href="/meetings_records">Registro de Actas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown @if(isset($section)){{ $section=='equipo'?'active':''}}@endif">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Equipo <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/equipments') }}">Inventario</a></li>
                            <li><a href="{{ url('/lend_equipments') }}">Prestamos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown @if(isset($section)){{ $section=='socios'?'active':''}}@endif">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Socios <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/users') }}">Gestionar</a></li>
                            <li><a href="{{ url('/suggestions') }}">Propuestas</a></li>
                            <li><a href="{{ url('/payments') }}">Pagos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown @if(isset($section)){{ $section=='actividades'?'active':''}}@endif">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Actividades <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="">Gestionar</a></li>
                            <li><a href="">Participacion Socios</a></li>
                        </ul>
                    </li>
                    <li class="dropdown @if(isset($section)){{ $section=='club'?'active':''}}@endif">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Club <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu " role="menu">
                            <li><a href="/info_club">Info.General</a></li>
                            <li><a href="/contacts">Contactos</a></li>
                            <li><a href="/news">Noticias</a></li>
                            <li><a href="#"><del>Donaciones</del></a></li>
                        </ul>
                    </li>
                    @endif

                    <li class="dropdown @if(isset($section)){{ $section=='usuario'?'active':''}}@endif" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/profile_member">Perfil</a></li>
                            <li><a href="/suggestions_member">Mis Propuestas</a></li>
                            <li><a href="/assistance_member">Mi Asistencia</a></li>
                            <li><a href="/payments_member">Mis Pagos & Cuotas</a></li>
                            <li><a href="">Mis Pedidos de Equipo</a></li>
                            <li><a href="">Mi Participacion Actividades</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Salir
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>
