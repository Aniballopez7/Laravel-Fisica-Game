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
        return view('front.userConfig.view_editPerfil')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        //todo validando la tabla de User
        $request->validate([
            'name' => 'string',
            'last_name' => 'string',
            'puntuation' => 'integer',
            'photo_user' => 'string',
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('perfil');
    }
}
