<?php

namespace App\Http\Livewire;

use App\Models\referidos;
use App\Models\User;
use Livewire\Component;

class Cuentanos extends Component
{
    public $codigo;

    protected $rules = [
        'codigo' => 'required',
    ];

    public function render()
    {

        return view('livewire.cuentanos');
    }

    public function ignorar(){

        return redirect(route('home'));

    }

    public function save(){

        $busqueda_codigo = User::where('codigo_referido',$this->codigo)->first();

        if( $busqueda_codigo){

            $rules = $this->rules;
            $this->validate($rules);

            referidos::create([
                'user_id' => auth()->user()->id,
                'refer_id' => $busqueda_codigo->id
            ]);

        }
        else{

            notyf()
            ->duration(0) // 2 seconds
            ->position('x', 'center')
            ->position('y', 'center')
            ->dismissible(true)
            ->addError('No existe ningún usuario con el código ingresado');

        }
    }
}
