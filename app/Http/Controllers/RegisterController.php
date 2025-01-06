<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\configuracion;
use App\Models\referidos;
use App\Models\User;
use App\Models\UserSaldo;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    use PasswordValidationRules;

    /*protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
       
    }*/

    public function registro(){
         return view('registro');
    }



    public function index(){

        $configuracion= configuracion::first()->referidos;

        if($configuracion == 'Si') $referido = 'si';
        else $referido = 'no';


        return view('auth.register',compact('referido'));
    }

    public function create(Request $request){


        $request->validate([
            'terminos_condiciones' => ['required'],
            'confirmar_edad' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ]);

        $user= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'estado' => 'activo',
            'password' => Hash::make($request['password']),
        ])->assignRole('Jugador');

        UserSaldo::create([
            'user_id' => $user->id,
            'saldo' => '0',
        ]);

        $user->update([
            'codigo_referido' => 'b-'.$user->id
        ]);



        if($request['codigo']){



            $busqueda_codigo = User::where('codigo_referido',$request['codigo'])->first();

            if( $busqueda_codigo){

                referidos::create([
                    'user_id' => $user->id,
                    'compra' => 'No',
                    'refer_id' => $busqueda_codigo->id,
                    'status' => 'Pendiente'
                ]);

            }

        }

        auth()->login($user);

        $this->guard->login($user);
        return redirect(route("home"));

        


    }


}
