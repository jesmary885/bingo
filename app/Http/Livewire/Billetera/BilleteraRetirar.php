<?php

namespace App\Http\Livewire\Billetera;

use App\Models\CuentasUser;
use App\Models\Pago;
use App\Models\UserSaldo;
use Livewire\Component;

class BilleteraRetirar extends Component
{

    public $open = false;

    protected $listeners = ['render'];

    public $monto=1, $tipo_monto = 1, $cuenta_id, $cuentas, $saldo_actual;

    public function mount(){

        $this->saldo_actual = UserSaldo::where('user_id',auth()->user()->id)
            ->first()
            ->saldo;
        $this->cuentas = CuentasUser::where('user_id',auth()->user()->id)->get();
    }

    public function decrement(){
        $this->monto = $this->monto - 1;
    }

    public function increment(){
        $this->monto = $this->monto + 1;
    }

    protected $rules = [
        'cuenta_id' => 'required',

    ];

    protected $rules_all = [
        'cuenta_id' => 'required',
        'monto' => 'required',

    ];

  

    public function close(){

        $this->open = false;

    }
    
    public function render()
    {
        return view('livewire.billetera.billetera-retirar');
    }

    public function save(){

        if($this->tipo_monto == 0) {
            $rules = $this->rules_all;
            $this->validate($rules);
            $monto = $this->monto;
        }else{
            $rules = $this->rules;
            $this->validate($rules);

            $monto = UserSaldo::where('user_id',auth()->user()->id)->first()->saldo;
        }


        Pago::create([
            'user_id' => auth()->user()->id,
            'monto' => $monto,
            'cuenta_id'=> $this->cuenta_id,
            'tipo' => 'Retiro',
            'status' => 'Pendiente', 
        ]);

  
        $this->reset(['open','monto','cuenta_id']);
        $this->emitTo('billetera.billetera-index','render');

        notyf()
        ->duration(9000) // 2 seconds
        ->addSuccess('Su solicitud esta siendo procesada');


    }
}
