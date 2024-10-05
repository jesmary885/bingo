<?php

namespace App\Http\Livewire\Billetera;

use App\Models\CuentasUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MisCuentasIndex extends Component
{

    protected $listeners = ['render' => 'render'];

    public function render()
    {

        $cuentas = CuentasUser::where('user_id', Auth::id()) 
            ->Paginate(5);


        return view('livewire.billetera.mis-cuentas-index',compact('cuentas'));
    }
}
