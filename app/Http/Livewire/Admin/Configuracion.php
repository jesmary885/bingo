<?php

namespace App\Http\Livewire\Admin;

use App\Models\configuracion as ModelsConfiguracion;
use Livewire\Component;

class Configuracion extends Component
{

    protected $listeners = ['render' => 'render'];

    public $cant_ref, $estado;
    public function render()
    {

        $conf = ModelsConfiguracion::first();

        $this->cant_ref = $conf->cant_referidos;

        if($conf->referidos == 'Si') $this->estado = 1;
        else $this->estado = 0;
               

        return view('livewire.admin.configuracion');
    }

    public function update(){

        $conf = ModelsConfiguracion::first();

        if($this->estado == 1) $opcion = 'Si';
        else $opcion = 'No';

        $conf->update([
            'cant_referidos' => $this->cant_ref,
            'referidos' => $opcion
        ]);

        $this->emit('alert','Datos registrados correctamente');
        $this->emitTo('admin.configuracion','render');
    }
}
