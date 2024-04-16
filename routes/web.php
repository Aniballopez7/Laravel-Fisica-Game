<?php


use Illuminate\Support\Facades\Route;

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
    return view('layouts.index');
    // $users = User::all();
    // foreach ($users as $user) {
    //     echo $user->email.'<br>'.$user->nickname.'<br>'.$user->password.'<br>';
    //     echo '<hr>';
        
    // }
    // $clasifications1 = Clasifications::all();
    // foreach ($clasifications1 as $clasification) {
    //     echo $clasification->user->email.'<br>'.$clasification->user->nickname.'<br>'.$clasification->user->password;
    // }
});

Auth::routes();

Route::get('/game', [App\Http\Controllers\GameController::class, 'game'])->name('game');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

