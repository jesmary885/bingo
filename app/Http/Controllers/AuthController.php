<?php

namespace App\Http\Controllers;

use App\Models\configuracion;
use App\Models\User;
use App\Models\UserSaldo;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function redirect(){


        return Socialite::driver('facebook')->redirect();

    }

    public function callback(){

        $user = Socialite::driver('facebook')->stateless()->user();


        $user_buscar = User::where('email', $user->getEmail())->first();
 
        if ($user_buscar === null) {

            $user= User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'estado' => 'activo',
                'saldo' => '0',
                //'profile_photo_path' => $user->getAvatar().'&access_token='.$user->token,
                'profile_photo_path' => $user->avatar_original.'&access_token='.$user->token,
            ])->assignRole('Jugador');

            UserSaldo::create([
                'user_id' => $user->id,
                'saldo' => '0',
            ]);

            $user->update([
                'codigo_referido' => 'b-'.$user->id
            ]);

            auth()->login($user);
        }

        else auth()->login($user_buscar);

        $configuracion= configuracion::first()->referidos;

        if($configuracion == 'si') return redirect()->to('/cuentanos');
        else return redirect()->to('/home');

    }
}
