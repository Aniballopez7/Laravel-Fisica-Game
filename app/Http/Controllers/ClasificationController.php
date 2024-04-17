<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClasificationController extends Controller
{
    public function clasifications(){
        return view('front.view_clasifications');
    }
}
