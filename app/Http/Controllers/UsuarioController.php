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
        // Verificar si ya existe un usuario con el mismo nombre de usuario o correo electrónico
        $existingUser = User::where('usuario', $request->usuario)
            ->orWhere('email', $request->email)
            ->exists();

        if ($existingUser) {
            // Si ya existe un usuario con el mismo nombre de usuario o correo electrónico, redirige de vuelta al formulario de registro con un mensaje de error.
            return redirect('registro')->with('error', 'El nombre de usuario o el correo electrónico ya están en uso.');
        }

        $user=new User();
        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        $user->usuario=$request->usuario;
        $user->email=$request->email;
        $user->rol=$request->rol;
        $user->avatar = $request->has('avatarCheckbox');

        if($request->confirm==$request->password){
            $user->password=Hash::make($request->password);
            $user->save();

            Auth::login($user);
            return redirect(route('principal'));
        }else{
            return redirect('registro');
        }


    }

    public function login(Request $request)
    {
        $loginField = $request->input('UserorEmail');
        $password = $request->input('password');

        if (Auth::attempt(['usuario' => $loginField, 'password' => $password]) || Auth::attempt(['email' => $loginField, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->intended(route('principal'));
        } else {
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        //resetear la sesion(se invalida)
        $request->session()->invalidate();
        //regenera la sesion sin cambiar rutas
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }

    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        $user->usuario=$request->usuario;
        $user->email=$request->email;
        $user->rol=$request->rol;
        $user->avatar=$request->avatar;
        $user->save();
        return redirect()->route('principal');
    }

    public function actualizar($id)
    {
        $User = User::find($id);
        return view("edit", compact('User'));
    }

}
