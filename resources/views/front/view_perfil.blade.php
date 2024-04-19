@extends('layouts.nav_view')
@section('title', 'Perfil usuario')
@vite(['resources/css/perfil.css'])
@section('content')
    @if (Auth::check())
        <!-- Mostrar la información del customer, si existe -->
        @if (isset($user))
            <form class="form">
                <div class="form_container">
                    <div class="form-control">
                        <input type="hidden" id="id" name="username" value="" />
                    </div>
                    <div class="form_grupo">
                        <div for="nickname" class="form_div" value="">Nickname:</div>
                        <div>
                            <p>{{ $user->nickname }}</p>
                        </div>
                    </div>
                    <div class="form_grupo">
                        <div for="nombre" class="form_div">Nombre:</div>
                        <div>
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>
                    <div class="form_grupo">
                        <div for="apellido" class="form_div" value="">Apellido:</div>
                        <div>
                            <p>{{ $user->last_name }}</p>
                        </div>
                    </div>
                    <div class="form_grupo">
                        <div for="puntuacion" class="form_div" value="">Puntuacion:</div>
                        <div>
                            @if ($user->puntuacion == null)
                                <p>No tienes puntuacion</p>
                            @else
                                <p>{{ $user->puntuation }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form_grupo">
                        <div for="img_user" class="form_div" value="">Puntuacion:</div>
                        <div>
                            <p>{{ $user->photo_user }}</p>
                        </div>
                    </div>
                </div>
                <a class="btn btn-sm btn-success" href="{{ route('editUser', $user->id) }}"><i class="fa fa-fw fa-edit"></i>
                    Editar</a>
            </form>
        @else
            <p>No existe data del usuario</p>
            <div>
                <a class="btn btn-sm btn-success" href="{{ route('editUser', $user->id) }}"><i class="fa fa-fw fa-edit"></i>
                    Añadir informacion</a>
            </div>
        @endif
    @endif
@endsection
