<?php


use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Clasifications;
use App\Models\Data_user;

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
Route::get('/clasifications', [App\Http\Controllers\ClasificationController::class, 'clasifications'])->name('clasifications');
Route::get('/game', [App\Http\Controllers\GameController::class, 'game'])->name('game');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'perfil'])->name('perfil');
Route::get('/user/{id}', [App\Http\Controllers\PerfilController::class, 'editUser'])->name('editUser');
Route::get('/editUser/{id}', [App\Http\Controllers\PerfilController::class, 'updateUser'])->name('updateUser');