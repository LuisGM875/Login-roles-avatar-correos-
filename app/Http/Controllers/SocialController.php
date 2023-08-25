<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirectFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook(){
        try{
            $facebookUser=Socialite::driver('facebook')->user();
            $findUser=User::where('fb_id',$facebookUser->id)->first();

            if($findUser){
                Auth::login($findUser);
                return redirect()->intented('principal');
            }else{
                $folderName = $facebookUser->name;
                $path = 'public/' . $folderName;
                $avatarUrl = 'https://api.dicebear.com/6.x/adventurer/svg?seed='.$facebookUser->name;
                Storage::put($path . '/avatar.txt', $avatarUrl);
                $new=User::create([
                    'nombre'=>$facebookUser->name,
                    'email'=>$facebookUser->email,
                    'fb_id'=>$facebookUser->id,
                    'rol'=>"Administrador",
                    'avatar' => $path . '/avatar.txt',
                    'password'=>encrypt('12345678')
                ]);
                Auth::login($new);
                return redirect()->intented('principal');
            }

        }catch (Exception $e){
dd($e->getMessage());
        }
    }
}
