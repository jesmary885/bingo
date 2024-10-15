<?php

namespace App\Http\Livewire\Admin\Pagos;

use App\Models\CuentasUser;
use App\Models\Pago;
use App\Models\UserSaldo;
use Livewire\Component;

class ReportePagoReportar extends Component
{
    public $registro,$file,$cuenta_id;

    public $isopen = false;

    protected $listeners = ['render'];

    protected $rules = [
        'file' => 'required|image',
    ];

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

        $p = Pago::where('id',$this->registro)->first();

        $cuentas = CuentasUser::where('user_id',$p->user_id)->get();

        return view('livewire.admin.pagos.reporte-pago-reportar',compact('cuentas'));
    }

    public function guardar(){

        $rules = $this->rules;
        $this->validate($rules);

        $pago = Pago::where('id',$this->registro)
            ->first()
            ->update([
                'constancia' => $this->file,
                'status' => 'Pago recibido'
            ]);

        $saldo = UserSaldo::where('user_id',$pago->user_id)->first()->saldo;

        UserSaldo::where('user_id',$pago->user_id)
            ->first()
            ->update([
                'saldo' => $saldo - $pago->monto
            ]);

    }
}
