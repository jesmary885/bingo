<?php

namespace App\Http\Livewire\Admin\Usuarios;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CambiarContrasena extends Component
{

     public $isopen = false, $user, $nueva_contrasena;

     protected $listeners = ['render'];

     
    protected $rules = [
        'nueva_contrasena' => 'required',

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
        return view('livewire.admin.usuarios.cambiar-contrasena');
    }

     public function procesar(){

        $rules = $this->rules;
        $this->validate($rules);

        DB::table('users')->where('id', $this->user->id)->update(['password' => Hash::make($this->user->email)]);

        $this->emit('alert','Contrasena modificada correctamente');
        $this->emitTo('admin.usuarios.usuarios-index','render');
        $this->isopen = false;  

     }
}
