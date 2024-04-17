<?php
use App\Http\Controllers\UsuariosController;
?>
@extends('layouts.nav_view')
@section('title', 'Fisic Games')
@vite(['resources/css/home.css'])
@section('content')
    <div id="contenedor">
        <div class="titulo">Elija una opcion</div>
        <div class="card matematicas">
            <div class="contenido">
                <a href="{{ route('perfil') }}">Perfil</a>
            </div>
        </div>
        <div class="card fisica">
            <div class="contenido">
                <a href="{{ route('game') }}">Jugar</a>
            </div>
        </div>
        <div class="card quimica">
            <div class="contenido">
                <a href="{{ route('clasifications') }}">Clasificacion</a>
            </div>
        </div>
    </div>
@endsection
