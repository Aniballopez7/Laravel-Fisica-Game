@extends('layouts.nav_view')
@section('title', 'Editar perfil')
@vite(['resources/css/perfil.css'])
@section('content')
    <div class="contenido__pagina">
        <div class="configuracion">
            <h3 class="configuracion__titulo">Editar perfil</h3>
            <form class="form" method="POST" action="{{ route('update', $user->id) }}" role="form"
                enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="form_container">
                    <div class="form-control">
                        <input type="hidden" id="id" name="users_id" value="{{ $user->id }}" />
                    </div>

                    <div class="form_grupo">
                        <input type="text" name="nickname" class="form_input" placeholder=" " value="{{ $user->nickname }}"
                            required>
                        <label for="nickname" class="form_label">Nickname:</label>
                        <span class="form_line"></span>
                    </div>
                    <div class="form_grupo">
                        <input type="text" name="email" class="form_input" placeholder=" " value="{{ $user->email }}"
                            required>
                        <label for="email" class="form_label">Email:</label>
                        <span class="form_line"></span>
                    </div>
                    <div class="form_grupo">
                        <input type="text" name="name" class="form_input" placeholder=" " value="{{ $user->name }}"
                        required>
                        <label for="name" class="form_label">Nombre:</label>
                        <span class="form_line"></span>
                    </div>
                    <div class="form_grupo">
                        <input type="text" name="last_name" class="form_input" placeholder=" " value="{{ $user->last_name }}"
                        required>
                        <label for="apellido" class="form_label" value="">Apellido:</label>
                        <span class="form_line"></span>
                    </div>
                    <div class="form_grupo">
                        <label for="apellido" class="upload-btn" value="">Foto</label>
                        <span class="form_line"></span>
                        <input type="file" class="form_grupo" id="photo_user" name="photo_user" accept="image/*">
                    </div>
                </div>
                <button type="submit" class="form_submit" name="subir" value="Guardar Cambios">Guardar</button>
            </form>
        </div>
    @endsection
