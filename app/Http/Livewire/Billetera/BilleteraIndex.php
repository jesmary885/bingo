<?php

namespace App\Http\Livewire\Billetera;

use App\Models\Pago;
use App\Models\User;
use App\Models\UserSaldo;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
Use Livewire\WithPagination;

class BilleteraIndex extends Component
{
    protected $listeners = ['render' => 'render'];
    public $retiro_inmediato;

    public function render()
    {
        $movimientos = Pago::where('user_id', Auth::id()) 
            ->where('tipo','!=','Pago de cartón')
            ->latest('id')
            ->Paginate(5);

        $user = User::where('id',Auth::id())->first();

        if($user->retiro_inmediato != null){
            if($user->retiro_inmediato == 'Si') $this->retiro_inmediato = 1;
            else $this->retiro_inmediato = 2;
        }

        $user_saldo = UserSaldo::where('user_id',Auth::id())->first()->saldo;
        $dolar_hoy = valor_dolar_hoy();

        return view('livewire.billetera.billetera-index',compact('movimientos','dolar_hoy','user_saldo'));
    }

    public function opcion_retiro($opcion_seleccionada){
        if($opcion_seleccionada == 'Si') $this->retiro_inmediato = 1;
        else $this->retiro_inmediato = 2;

        User::where('id',auth()->user()->id)->first()->update([
            'retiro_inmediato' => $opcion_seleccionada,
        ]);
    }
}
