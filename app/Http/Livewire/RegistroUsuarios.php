<?php

namespace App\Http\Livewire;

use App\Models\configuracion;
use Livewire\Component;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\referidos;
use App\Models\User;
use App\Models\UserSaldo;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Hash;

class RegistroUsuarios extends Component
{

    use PasswordValidationRules;

    public $referido, $name, $email,$password, $password_confirmation, $codigo, $terminos_condiciones, $confirmar_edad;

    protected $guard;

    public function mount(StatefulGuard $guard){

        $this->guard = $guard;

    }




    protected $listeners = ['render'];

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'min:6', 'max:12'],
    ];

    protected $rul_password_confirm = [
        'password' => 'required|confirmed',
    ];

    public function render()
    {

        $configuracion= configuracion::first()->referidos;

        if($configuracion == 'Si') $this->referido = 'si';
        else $this->referido = 'no';

        return view('livewire.registro-usuarios');
    }

    public function procesar(){

        $rules = $this->rules;
        $this->validate($rules);

        if($this->terminos_condiciones == 1){
            if($this->confirmar_edad == 1){

                if($this->password == $this->password_confirmation)
                {
                    $user= User::create([
                        'name' => $this->name,
                        'email' => $this->email,
                        'estado' => 'activo',
                        'password' => Hash::make($this->password),
                    ])->assignRole('Jugador');
            
                    UserSaldo::create([
                        'user_id' => $user->id,
                        'saldo' => '0',
                    ]);
            
                    $user->update([
                        'codigo_referido' => 'b-'.$user->id
                    ]);
            
                    if($this->codigo){
            
                        $busqueda_codigo = User::where('codigo_referido',$this->codigo)->first();
            
                        if( $busqueda_codigo){
            
                            referidos::create([
                                'user_id' => $user->id,
                                'refer_id' => $busqueda_codigo->id,
                                'status' => 'Pendiente'
                            ]);
            
                        }
            
                    }
            
                    auth()->login($user);
                    return redirect(route("home"));

                }

                else{
                    $rul_password_conf = $this->rul_password_confirm;
                    $this->validate($rul_password_conf);

                }
                

            }
            else{

                notyf()
                ->duration(9000) // 2 seconds
                ->addError('Debe confirmar que es mayor de 18 años para procesar el registro');

            }
        }else{

            notyf()
                ->duration(9000) // 2 seconds
                ->addError('Debe confirmar que esta de acuerdo con la Politica de Privacidad y las Condiciones de servicio para procesar el registro');

        }




    }
}
