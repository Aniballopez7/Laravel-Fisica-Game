@extends('layouts.nav_view')
@section('title', 'Perfil usuario')
@vite(['resources/css/perfil.css'])
@section('content')
    @if (Auth::check())
        <!-- Mostrar la información del customer, si existe -->
        @if (isset($user) && isset($user->data_user))
            <p>{{ $user->id }}</p>
            <p>{{ $user->nickname }}</p>
            <p>{{ $user->data_user->name }}</p>
            <p>{{ $user->data_user->last_name }}</p>
            <p>{{ $user->data_user->puntuacion }}</p>
            <!-- Mostrar otros campos del customer -->
            <div>
                <a class="btn btn-sm btn-success" href="{{ route('editUser', $user->id) }}"><i class="fa fa-fw fa-edit"></i>
                    Editar perfil</a>
            </div>
        @else
            <p>No existe data del usuario</p>
            <div>
                <a class="btn btn-sm btn-success" href="{{ route('editUser', $user->id) }}"><i class="fa fa-fw fa-edit"></i>
                    Añadir informacion</a>
            </div>
        @endif
    @endif
@endsection
