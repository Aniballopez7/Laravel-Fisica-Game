<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\User;

class DatatableController extends Controller
{
    public function user(){
        return DataTables::collection(User::all())->toJson();
    }
    public function guardarPreguntasCorrectas(Request $request, $id) {
        $preguntasCorrectas = $request->preguntas_correctas;
        $registro = new User(); // Asume que Registro es tu modelo
        $registro->preguntas_correctas = $preguntasCorrectas;
        $registro->save();
    }
    
}
