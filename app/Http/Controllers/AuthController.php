<?php

namespace App\Http\Controllers;

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
            ])->assignRole('Jugador');

            UserSaldo::create([
                'user_id' => $user->id,
                'saldo' => '0',
            ]);

            auth()->login($user);
        }

        else auth()->login($user_buscar);

        

        return redirect()->to('/home');
    }
}
