<?php

namespace App\Http\Livewire\Admin\Usuarios;

use App\Models\CuentasUser;
use Livewire\Component;

class CuentaUsuario extends Component
{

    public $registro,$usuario;

    public $isopen = false;

    protected $listeners = ['render'];

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
        $cuentas_usuario = CuentasUser::where('user_id',$this->registro)
            ->get();

        return view('livewire.admin.usuarios.cuenta-usuario',compact('cuentas_usuario'));
    }
}
