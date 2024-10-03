<?php

namespace App\Http\Livewire\Billetera;

use App\Models\Pago;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BilleteraRecargar extends Component
{
    use WithFileUploads;

    protected $listeners = ['render'];
    public $metodo_select = 0, $dolar_valor, $procesa = 0, $adjunta = 0, $constancia, $monto;

    protected $rules = [
        'constancia' => 'required',

    ];

    public function metodo($metodo_seleccionado){
        if($metodo_seleccionado == 'binance') $this->metodo_select = 1;
        else $this->metodo_select=2;
        $this->adjunta = 1;
    }

    public $open = false;

    public function close(){

        $this->open = false;

    }

    public function render()
    {
        return view('livewire.billetera.billetera-recargar');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        if($this->monto <= 500){

            $constancia = Storage::put('transacciones', $this->constancia);

            if($this->metodo_select == 1) $metodo= 'Binance';
            else $metodo= 'Pago movil';
    
            Pago::create([
                    'user_id' => auth()->user()->id,
                    'metodo_pago' => $metodo,
                    'monto' => $this->monto,
                    'constancia' => $constancia,
                    'tipo' => 'Recarga',
                    'status' => 'Pendiente', 
            ]);
    
    
            $this->reset(['open','monto','constancia','metodo_select']);
    
            $this->emitTo('billetera.billetera-index','render');
    
            notyf()
                ->duration(9000) // 2 seconds
                ->addSuccess('Su solicitud esta siendo procesada');

        }
        else{

            notyf()
                ->duration(9000) // 2 seconds
                ->addError('El monto máximo permitido es de 500$');
        }

    }
}
