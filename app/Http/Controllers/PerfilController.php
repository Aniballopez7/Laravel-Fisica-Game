<?php

namespace App\Http\Controllers;

use App\Models\Data_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function perfil()
    {
        $user = Auth::user(); //obtener el usuario autenticado, si el existe
        if ($user) {
            // Obtener el usuario (si existe)
            $data = $user->data_user;
            return view('front.view_perfil', compact('user'));
        } else {
            return redirect()->route('login');
        }
        return view('front.view_perfil');
    }

    public function showUser(string $id)
    {
        $user = User::find($id);
        return view('front.view_perfil', compact('user'));
    }

    public function editUser(string $id)
    {
        $user = User::find($id);
        $user = Data_user::find($user->data_user_id);
        return view('front.userConfig.view_editPerfil', compact('user'))->with([
            'user' => $user,
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        //todo validando la tabla de data_user
        $request->validate([
            'name' => 'string',
            'last_name' => 'string',
            'puntuation' => 'integer',
            'photo_user' => 'string',
        ]);
        $user = Data_user::find($id);
        $user->update($request->all());

        if ($user) {
            return view('front.view_perfil', compact('user'))->with('Success', 'Datos actualizados con exito');
        } else {
            return back()->with('error', 'No se pudo recuperar el cliente actualizado');
        }
    }
}
