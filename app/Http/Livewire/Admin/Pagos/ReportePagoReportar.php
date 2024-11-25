<?php

namespace App\Http\Livewire\Admin\Pagos;

use App\Models\CuentasUser;
use App\Models\Pago;
use App\Models\UserSaldo;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReportePagoReportar extends Component
{
    use WithFileUploads;

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

    public function procesar(){

        $rules = $this->rules;
        $this->validate($rules);

        $pago_select = Pago::where('id',$this->registro)->first();

        $pago = Pago::where('id',$this->registro)
            ->first()
            ->update([
                'constancia' => $this->file,
                'status' => 'Pago recibido',
                'cuenta_id' => $this->cuenta_id
            ]);

        $saldo = UserSaldo::where('user_id',$pago_select->user_id)->first()->saldo;

        UserSaldo::where('user_id',$pago_select->user_id)
            ->first()
            ->update([
                'saldo' => $saldo - $pago_select->monto
            ]);

        $this->emit('alert','Datos registrados correctamente');
        
        $this->emitTo('admin.pagos.reporte-pago-index','render');
        $this->isopen = false;  

    }
}
