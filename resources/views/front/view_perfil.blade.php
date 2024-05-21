@extends('layouts.nav_view')
@section('title', 'Perfil usuario')
@vite(['resources/css/perfil.css'])
@section('content')
    @if (Auth::check())
        <!-- Mostrar la información del customer, si existe -->
            <div class="container">
                <div class="profile-info">
                        <div>
                             @if ($user->photo_user == null)
                            <p>No hay Foto de Perfil</p>
                            @else
                                <img src="{{asset('User\images'.
                                $user->photo_user)}}" width="100px" height="100px">
                                {{-- <img src="{{ asset('images/'.$user->photo_user) }}" alt=""> --}}
                            @endif
                        </div>
                    <div class="profile-details">
                        <h2>{{ $user->nickname }}</h2>
                        <p>Puntuación: {{ $user->puntuation ?? 'No tienes puntuación' }}</p>
                    </div>
                </div>
                <a class="edit-button" href="{{ route('editUser', $user->id) }}">
                    <i class="fa fa-fw fa-edit"></i> Editar
                </a>
            </div>
        @else
            <p>No existe información del usuario</p>
            <div>
                <a class="edit-button" href="{{ route('editUser', $user->id) }}">
                    <i class="fa fa-fw fa-edit"></i> Añadir información
                </a>
            </div>
    @endif
@endsection
