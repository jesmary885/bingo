<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            ])->assignRole('Jugador');

            auth()->login($user);
        }

        else auth()->login($user_buscar);

        

        return redirect()->to('/home');
    }
}
