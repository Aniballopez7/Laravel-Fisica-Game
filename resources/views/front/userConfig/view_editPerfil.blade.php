@extends('layouts.nav_view')
@section('title', 'Editar perfil')
@vite(['resources/css/perfil.css'])
@section('content')
<div class="contenido__pagina">
    <div class="configuracion">
        <h3 class="configuracion__titulo">Editar perfil</h3>
        <form class="form" method="POST" action="{{ route('updateUser', $data_user->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            <div class="form_container">
                <div class="form-control">        
                    <input type="hidden" id="id" name="users_id" value="{{$data_user->id}}" />
                </div>
                <div class="form_grupo">
                    <label for="nombre" class="form_label">Nombre:</label>
                    <span class="form_line"></span>
                    <input type="text" name="name" class="form_input" placeholder=" " value="{{$data_user->name}}" required>
                </div>
                <div class="form_grupo">
                    <label for="apellido" class="form_label" value="">Apellido:</label>
                    <span class="form_line"></span>
                    <input type="text" name="last_name" class="form_input" placeholder=" " value="{{$data_user->last_name}}" required>
                </div>
                <div class="form_grupo">
                    <label for="apellido" class="form_label" value="">Puntuacion: </label>
                    <span class="form_line">2</span>
                    <input type="hidden" name="puntuation" class="form_input" placeholder=" " value="{{$data_user->puntuation}}" required>
                </div>
                <div class="form_grupo">
                    <label for="apellido" class="form_label" value="">Foto</label>
                    <span class="form_line"></span>
                    <input type="text" name="photo_user" class="form_input" placeholder=" " value="{{$data_user->photo_user}}" required>
                </div>                        
            </div>
            <input type="submit" class="form_submit" name="subir" value="Guardar Cambios">
        </form>
    </div>
@endsection