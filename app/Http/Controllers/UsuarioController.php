<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Mail\DemoEmail;
use App\Mail\RestoreEmail;
use Illuminate\Support\Facades\Mail;


class UsuarioController extends Controller
{
    public function register(Request $request)
    {
        $existingUser = User::where('usuario', $request->usuario)
            ->orWhere('email', $request->email)
            ->exists();
        if ($existingUser) {
            return redirect('registro');
        }
        $user=new User();
        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        $user->usuario=$request->usuario;
        $user->email=$request->email;
        $user->rol=$request->rol;
        // Crear la carpeta con el nombre del usuario en storage/app/public
        $folderName = $request->nombre . '_' . $request->apellido;
        $path = 'public/' . $folderName;
        // Verificar el valor del avatar y establecer el enlace correspondiente
        if ($request->input('avatarCheckbox') == "true") {
            $avatarUrl = 'https://api.dicebear.com/6.x/adventurer/svg?seed='.$request->nombre;
        } else {
            $avatarUrl = 'https://api.dicebear.com/6.x/initials/svg?seed='.$request->nombre;
        }
        // Almacenar el enlace en un archivo dentro de la carpeta del usuario
        Storage::put($path . '/avatar.txt', $avatarUrl);

        $user->avatar = $path . '/avatar.txt';
        if($request->confirm==$request->password){
            $user->password=Hash::make($request->password);
            $user->save();
            $objDemo = new \stdClass();
            $objDemo->correo = $user->email;
            $objDemo->tag = $user->usuario;
            $objDemo->usuario = $user->nombre;
            $objDemo->identificacion = $user->apellido;
            $objDemo->receiver = $user->rol;
            Mail::to($user->email)->send(new DemoEmail($objDemo));
            Auth::login($user);
            return redirect('login');
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
        $user->save();
        return redirect()->route('principal');
    }

    public function actualizar($id)
    {
        return redirect("editar");
    }

    public function eliminar($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('principal')->with('error', 'Usuario no encontrado.');
        }
        // Obtener la carpeta de almacenamiento del usuario
        $folderName = $user->nombre . '_' . $user->apellido;
        $path = 'public/' . $folderName;
        // Eliminar la carpeta de almacenamiento del usuario si existe
        if (Storage::exists($path)) {
            Storage::deleteDirectory($path);
        }
        // Eliminar al usuario
        $user->delete();
        // Redirigir a la página principal con un mensaje de éxito
        return redirect()->route('login');
    }

    public function validar(Request $request)
    {
        $loginField = $request->input('UserorEmail');
        $user = User::where('email', $loginField)->orWhere('usuario', $loginField)->first();

        if ($user) {
            $token = bin2hex(random_bytes(6));
            $correo = new \stdClass();
            $correo->correo = $user->email;
            $correo->token=$token;

            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                ['token' => $token, 'created_at' => now()]
            );

            Mail::to($user->email)->send(new RestoreEmail($correo));
            return redirect()->route('cambiar');
        } else {
            return redirect('recuperar');
        }
    }

    public function recuperar(Request $request)
    {
        $email = $request->input('Email');
        $token = $request->input('Token');



        // Realiza la búsqueda en la base de datos para verificar si el correo y el token coinciden
        $isValid = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('token', $token)
            ->where('created_at', '>=', now()->subHours(2)) // Puedes definir un período de validez
            ->exists();

        if ($isValid) {
            // Si son válidos, elimina en la base de datos

            return redirect()->route('modificar');
        } else {
            return view('cambiar');
        }
    }

    public function final(Request $request){

        $email=$request->input('Email');
        $password = $request->input('password');
        $confirm = $request->input('confirm');

        $tokenvalid = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();
        if ($tokenvalid) {
            if ($password === $confirm) {
                $hashedpassword = Hash::make($password);

                DB::table('users')
                    ->where('email', $email)
                    ->update(['password' => $hashedpassword]);

                DB::table('password_reset_tokens')
                    ->where('email', $email)
                    ->delete();

                return redirect()->route('login');
            } else {
                return redirect()->route('modificar');
            }
        }else {
            return redirect()->route('modificar');
        }
    }

}
