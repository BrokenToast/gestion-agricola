<link rel="stylesheet" href="{{ asset('/css/header.css') }}">
<div>
    <img src="{{ asset('/img/campo.jpeg') }}" alt="">
</div>
<nav>
    <ul>
        <li id="perfil" class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->nombre}}
            </a>
            <ul class="dropdown-menu">
                {{-- <li><a class="dropdown-item" href="#">Configuración</a></li> --}}
                <hr>
                <li>
                    {!! Form::open(['method'=>'POST','url'=>route('logout'), 'class'=>'dropdown-item']) !!}
                        {!! Form::submit("Salir", ['class'=>'btn']) !!}
                    {!! Form::close() !!}
                </li>
            </ul>
        </li>
        <li class="primer-nivel"><a href="{{ route('temporada.index') }}">Temporadas</a></li>
        <li class="primer-nivel"><a href="{{ route('finca.index') }}">Finca</a></li>
        <li class="primer-nivel">Precios</li>
        <li class="primer-nivel"><a href="{{ route('ganancia.index') }}">Ganancias</a></li>
        <li class="primer-nivel"><a href="{{ route('gasto.index') }}">Gastos</a></li>
    </ul>
</nav>
