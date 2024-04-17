<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function perfil(){
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

    public function showUser(string $id){
        $user = User::find($id);
        return view('front.view_perfil', compact('user'));
    }

    public function editUser(string $id){
        $user2 = User::find($id);
        $user = User::find($user2->data_user);
        return view('front.userConfig.view_editPerfil', compact('user'))->with([
            'user' => $user,
        ]);
    }
}
