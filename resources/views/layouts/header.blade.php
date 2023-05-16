<link rel="stylesheet" href="{{ asset('/css/header.css') }}">
<div>
    <img src="{{ asset('/img/campo.jpeg') }}" alt="">
</div>
<nav>
    <ul>
        <li id="perfil" class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Mi Perfil
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Configuración</a></li>
              <hr>
              <li><a class="dropdown-item" href="#">Salir</a></li>
            </ul>
        </li>
        <li class="primer-nivel">Temporadas</li>
        <li class="primer-nivel">Fincas</li>
        <li class="primer-nivel">Precios</li>
        <li class="primer-nivel">Ganancias</li>
        <li class="primer-nivel">Gastos</li>
    </ul>
</nav>
