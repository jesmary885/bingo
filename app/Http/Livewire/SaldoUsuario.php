<?php

namespace App\Http\Livewire;

use App\Models\UserSaldo;
use Livewire\Component;

class SaldoUsuario extends Component
{

    protected $listeners = ['render' => 'render','echo:saldo_user,NewSaldoUser' => 'render'];

    public function render()
    {

        $saldo= UserSaldo::where('user_id',auth()->user()->id)->first()->saldo;

        $dolar_hoy = valor_dolar_hoy();

        return view('livewire.saldo-usuario',compact('saldo','dolar_hoy'));
    }
}
