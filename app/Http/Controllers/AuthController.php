<?php

namespace App\Http\Controllers;

use App\Models\configuracion;
use App\Models\User;
use App\Models\UserSaldo;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirect(){


        return Socialite::driver('facebook')->redirect();

    }

    public function logout(Request $request){

        Auth::logout();

        $cart = collect(session()->get('cart'));

        if (!config('cart.destroy_on_logout')) {
            $cart->each(function($rows, $identifier) {
                session()->put('cart.' . $identifier, $rows);
            });
        }


        return redirect('/');

    }

    public function callback(){

        $user = Socialite::driver('facebook')->stateless()->user();

       //$user = Socialite::driver('facebook')->user();



        $user_buscar = User::where('email', $user->getEmail())->first();
 
        if ($user_buscar === null) {

            $user= User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'estado' => 'activo',
                'saldo' => '0',
                //'profile_photo_path' => $user->getAvatar().'&access_token='.$user->token,
               // 'profile_photo_path' => $user->avatar_original.'&access_token='.$user->token,
            ])->assignRole('Jugador');
       // }

            UserSaldo::create([
                'user_id' => $user->id,
                'saldo' => '0',
            ]);

            $user->update([
                'codigo_referido' => 'b-'.$user->id
            ]);

            

            auth()->login($user);

            $configuracion= configuracion::first()->referidos;

            if($configuracion == 'Si') return redirect()->to('/cuentanos');
            else return redirect()->to('/home');

        }

        else{

            auth()->login($user_buscar);

            return redirect()->to('/home');
        }

        

    }
}
