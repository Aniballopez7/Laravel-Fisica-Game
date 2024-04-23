<?php

namespace App\Http\Controllers;

use App\Models\Scores;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    public function scores(){
        $scores = Scores::all();
        $i = 1;
        return view('front.view_scores', compact('scores','i'));
    }
}
