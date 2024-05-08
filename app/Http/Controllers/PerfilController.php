<?php

namespace App\Http\Controllers;

use App\Models\Data_user;
use App\Models\Scores;
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
        return view('front.userConfig.view_editPerfil')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //todo validando la tabla de User
        $user = User::findOrFail($id);
        $image = $request->file('photo_user');
        $path = 'User/images/';
        $imageName = time() . "_" . $image->getClientOriginalName();
        $upload = $request->file('photo_user')->move($path, $imageName);
        $user->photo_user = $path . $imageName;

        $user->update($request->all());
        return redirect()->route('perfil');
    }

    public function updatePuntuacion(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $scoreSearch = Scores::where('user_id', $user->id)->first(); //TODO 
        if ($scoreSearch) {            
            if ($user->puntuation < $request->puntaje) {
                $user->puntuation = $request->puntaje;
            } else {
                $user->puntuation = $user->puntuation;
            }
        } else {
            $user->puntuation = $request->puntaje;
            $score = Scores::create([
                'user_id' => $user->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        $user->update($request->all());
        return view('front.index');
    }
}
