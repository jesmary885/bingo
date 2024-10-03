<?php

namespace App\Http\Livewire\Billetera;

use App\Models\Pago;
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

        $dolar_hoy = valor_dolar_hoy();

        return view('livewire.billetera.billetera-index',compact('movimientos','dolar_hoy'));
    }
}
