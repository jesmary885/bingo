<?php

namespace App\Http\Livewire;

use App\Models\MetodoPago;
use App\Models\UserSaldo;
use Livewire\Component;

class SaldoUsuario extends Component
{

    protected $listeners = ['render' => 'render','echo:saldo_user,NewSaldoUser' => 'render'];

    public function render()
    {

        $saldo= UserSaldo::where('user_id',auth()->user()->id)->first()->saldo;

        $dolar_hoy = MetodoPago::where('name', 'Pago Movil')
           ->value('valor');

        return view('livewire.saldo-usuario',compact('saldo','dolar_hoy'));
    }
}
