<?php

use App\Http\Controllers\Auth\RegisterController;
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
    Route::put('/perfil/updateUserPuntuation/{id}', 'updatePuntuacion')->name('updatePuntuacion');
});

Route::get('/datatable/users', [App\Http\Controllers\DatatableController::class, 'user'])->name('user');
Route::post('/Registrar',[App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');