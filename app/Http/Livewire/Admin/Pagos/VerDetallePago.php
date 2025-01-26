<?php

namespace App\Http\Livewire\Admin\Pagos;

use App\Models\Cart;
use App\Models\Pago;
use Livewire\Component;

class VerDetallePago extends Component
{

    protected $listeners = ['render'];

    public $registro;

    public $sorteo_select, $sorteo;

    public $isopen = false;


    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

   

    public function render()
    {


        $registros = Cart::where('pago_id',$this->registro)
            ->get();



        return view('livewire.admin.pagos.ver-detalle-pago',compact('registros'));
    }
}
