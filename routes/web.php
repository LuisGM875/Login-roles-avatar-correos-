<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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
    return view('welcome');
});

Route::view('/registro',"register")->name('registrate');
Route::view('/login',"login")->name('login');
Route::view('/recuperar',"password")->name('recuperar');

Route::post('/IniciaSesion',[UsuarioController::class,'login'])->name('IniciaSesion');
Route::post('/Registrar',[UsuarioController::class,'register'])->name('Registrar');
Route::get('/logout',[UsuarioController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::view('/principal',"principal")->name('principal');

    Route::get('/edit/{id}',[UsuarioController::class,'actualizar'])->name('Editar');
    Route::put('/update/{id}',[UsuarioController::class,'update'])->name('Actualizar');
});


use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});
