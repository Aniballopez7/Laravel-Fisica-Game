<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function game(){
        $user = Auth::user();
        if ($user) {
            return view('front.view_game')->with('user', $user);
        } else{
            return view('front.view_game');
        }
    }

}
