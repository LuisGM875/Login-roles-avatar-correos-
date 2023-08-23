<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function register(Request $request)
    {
        $user=new User();
        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        $user->usuario=$request->usuario;
        $user->email=$request->email;
        $user->avatar=$request->avatar;
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect(route('principal'));
    }

    public function login(Request $request)
    {
        $credentials=[
            "usuario"=>$request->UserorEmail,
            "password"=>$request->password,
        ];
        //mantener la sesion con culaquier cambio entre paginas
        $remember=($request->has('remember')?true:false);
        //clase de auth metodo estatico para verificar el intento de sesion
        if(Auth::attempt($credentials,$remember)){
            //preparar sesion
            $request->session()->regenerate();
            //por si estas dentro del crud y entras a otro espacio privado
            return redirect()->intended(route('principal'));
        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        //resetear la sesion(se invalida)
        $request->session()->invalidate();
        //regenera la sesion sin cambiar rutas
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
