<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialController;
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
Route::view('/Cambio',"cambiar")->name('cambiar');

Route::view('/modificar/',"modificar")->name('modificar');

Route::put('/corregir/',[UsuarioController::class,'final'])->name('ModificarFinal');



Route::put('/Verificar',[UsuarioController::class,'recuperar'])->name('VerificarTokenn');
Route::put('/Validar',[UsuarioController::class,'validar'])->name('EnviarValidacion');


Route::post('/IniciaSesion',[UsuarioController::class,'login'])->name('IniciaSesion');
Route::post('/Registrar',[UsuarioController::class,'register'])->name('Registrar');
Route::get('/logout',[UsuarioController::class,'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::view('/principal',"principal")->name('principal');
    Route::view('/editar',"edit")->name('editar');
    Route::get('/edit/{id}',[UsuarioController::class,'actualizar'])->name('Editar');
    Route::put('/update/{id}',[UsuarioController::class,'update'])->name('Actualizar');
    Route::delete('/eliminar/{id}', [UsuarioController::class, 'eliminar'])->name('Eliminar');
});

Route::view('/cart',"cart")->name('Carro');
Route::view('/about',"about")->name('Otro');
Route::view('/checkout',"checkout")->name('Checar');
Route::view('/contact',"contact")->name('Contacto');

Route::get('mail/send', [MailController::class,'send'])->name('EnviarCorreo');
Route::get('mail/send', [MailController::class,'send'])->name('EnviarToken');



Route::get('auth/facebook',[SocialController::class,'redirectFacebook']);

Route::get('auth/facebook/callback',[SocialController::class,'callbackFacebook']);
