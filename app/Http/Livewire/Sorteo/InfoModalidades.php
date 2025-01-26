<?php

namespace App\Http\Livewire\Sorteo;

use App\Models\Sorteo;
use Livewire\Component;

class InfoModalidades extends Component
{
    protected $listeners = ['render'];

    public $open = false, $sorteo_select, $sorteo, $carton_lleno, $tradicional, $tipo;

    public function mount(){

        $this->sorteo = Sorteo::where('id',$this->sorteo_select)->first();

        if($this->sorteo->type_1 == "Tradicional") $this->tradicional = 1;
        elseif($this->sorteo->type_1 == "Carton lleno") $this->carton_lleno = 1;

        if($this->sorteo->type_2 == "Tradicional") $this->tradicional = 1;
        elseif($this->sorteo->type_2 == "Carton lleno") $this->carton_lleno = 1;

        if($this->sorteo->type_3 == "Tradicional") $this->tradicional = 1;
        elseif($this->sorteo->type_3 == "Carton lleno") $this->carton_lleno = 1;

    }

    public function close(){

        $this->open = false;



    }

    public function render()
    {
        return view('livewire.sorteo.info-modalidades');
    }
}
