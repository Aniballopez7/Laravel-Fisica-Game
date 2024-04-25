@extends('layouts.nav_view')
@section('title', 'Perfil usuario')
@vite(['resources/css/perfil.css'])
@section('content')
    @if (Auth::check())
        <!-- Mostrar la información del customer, si existe -->
        @if (isset($user))
            <form class="form" enctype="multipart/form-data">
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
                        <div for="photo_user" class="form_div" value="">Foto de perfil:</div>
                        <div>
                            @if ($user->photo_user == null)
                                <p>No se ha encontrado una foto</p>

                            @else
                                <img src="{{asset('User/imaged'.
                                $user->photo_user)}}" width="100px" height="100px">
                                {{-- <img src="{{ asset('images/'.$user->photo_user) }}" alt=""> --}}
                            @endif
                        </div>
                    </div>
                    @if ($user->name == null && $user->last_name == null)
                    @else
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
                    @endif
                    <div class="form_grupo">
                        <div for="puntuacion" class="form_div" value="">Puntuacion:</div>
                        <div>
                            @if ($user->puntuation == null)
                            <p>No tienes puntuacion</p>
                            @else
                            <p>{{ $user->puntuation }}</p>
                            @endif
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
