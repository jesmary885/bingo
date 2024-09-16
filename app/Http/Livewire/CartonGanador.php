<?php

namespace App\Http\Livewire;

use App\Models\CartonGanador as ModelsCartonGanador;
use Livewire\Component;

class CartonGanador extends Component
{

    public $open = false, $sorteo;

    public function mount($sorteo){

        $this->sorteo = $sorteo;

    }

    public function close(){

        $this->open = false;

    }

    public function render()
    {

        $ganadores_sorteo = ModelsCartonGanador::with('carton')
            ->where('sorteo_id',$this->sorteo)
            ->get();


        return view('livewire.carton-ganador',compact('ganadores_sorteo'));
    }
}
