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


    public function render()
    {

        $movimientos = Pago::where('user_id', Auth::id()) 
            ->where('tipo','!=','Pago de cartón')
            ->latest('id')
            ->Paginate(5);

        $user_saldo = UserSaldo::where('user_id',Auth::id())->first()->saldo;

        $dolar_hoy = valor_dolar_hoy();

        return view('livewire.billetera.billetera-index',compact('movimientos','dolar_hoy','user_saldo'));
    }
}
