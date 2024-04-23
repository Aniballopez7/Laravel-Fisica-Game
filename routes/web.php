<?php

use App\Http\Controllers\DatatableController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ScoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.index');
    // $users = User::all();
    // foreach ($users as $user) {
    //     echo $user->email.'<br>'.$user->nickname.'<br>'.$user->password.'<br>';
    //     echo '<hr>';
        
    // }
    // $clasifications1 = Clasifications::all();
    // foreach ($clasifications1 as $clasification) {
    //     echo $clasification->user->email.'<br>'.$clasification->user->nickname.'<br>'.$clasification->user->password;
    // }
    // echo '<hr>';
    // $data = Data_user::all();
    // foreach ($data as $dat) {
    //     echo $dat->user;
    // }
});

Auth::routes();

//todo primero la ruta, controlador, nombre de la funcion a llamar en el controlador y el nombre el cual se llamara en el html
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/scores', [App\Http\Controllers\ScoresController::class, 'scores'])->name('scores');

Route::get('/game', [App\Http\Controllers\GameController::class, 'game'])->name('game');

//todo rutas de perfil
Route::controller(PerfilController::class)->group(function(){
    Route::get('/perfil','perfil')->name('perfil');
    Route::get('/perfil/editUser/{id}', 'editUser')->name('editUser');
    Route::put('/perfil/updateUser/{id}', 'update')->name('update');
});

Route::get('/datatable/users', [App\Http\Controllers\DatatableController::class, 'user'])->name('user');
Route::post('/api/update-user', function (Request $request) {
    $user = auth()->user();
    $user->nickname = $request->name;
    $user->email = $request->email;
    $user->puntuation = $request->preguntas_correctas;
    $user->save();
    return response()->json(['success' => true]);
});