@extends('layouts.nav_view')
@section('title', 'Perfil usuario')
@vite(['resources/css/perfil.css'])
@section('content')
    @if (Auth::check())
        <!-- Mostrar la información del customer, si existe -->
        @if (isset($user) && isset($user->data_user))
            <form class="form">
                <div class="form_container">
                    <div class="form-control">
                        <input type="hidden" id="id" name="username" value="" />
                    </div>
                    <div class="form_grupo">
                        <div for="apellido" class="form_div" value="">Nickname:</div>
                        <div>
                            <p>{{ $user->nickname }}</p>
                        </div>
                    </div>
                    <div class="form_grupo">
                        <div for="nombre" class="form_div">Nombre:</div>
                        <div>
                            <p>{{ $user->data_user->name }}</p>
                        </div>
                    </div>
                    <div class="form_grupo">
                        <div for="apellido" class="form_div" value="">Apellido:</div>
                        <div>
                            <p>{{ $user->data_user->last_name }}</p>
                        </div>
                    </div>
                    <div class="form_grupo">
                        <div for="apellido" class="form_div" value="">Puntuacion:</div>
                        <div>
                            <p>{{ $user->data_user->puntuation }}</p>
                        </div>
                    </div>
                </div>
                <a class="btn btn-sm btn-success" href="{{ route('editUser', $user->id) }}"><i
                        class="fa fa-fw fa-edit"></i> Editar</a>
            </form>
        @else
            <p>No existe data del usuario</p>
            <div>
                <a class="btn btn-sm btn-success" href="{{ route('editUser', $user->id) }}"><i
                        class="fa fa-fw fa-edit"></i>
                    Añadir informacion</a>
            </div>
        @endif
    @endif
@endsection
