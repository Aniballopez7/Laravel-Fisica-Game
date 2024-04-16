<?php
use App\Http\Controllers\UsuariosController;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/home.css'])
    </head>
    <body>
        <div class="contenedor">
            <div class="titulo">Elija una opcion</div>
            @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="/register">{{ __('Registrarse') }}</a>
                </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nickname }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
         @endguest
            <div class="card matematicas">
                <div class="contenido">
                    <a href="/">Perfil</a>
                </div>
            </div>
            <div class="card fisica">
                <div class="contenido">
                    <a href="{{route('game')}}">Jugar</a>
                </div>
            </div>
            <div class="card quimica">
                <div class="contenido">
                    <a href="/">Clasificacion</a>
                </div>
            </div>
    
        </div>
    </body>
</html>
