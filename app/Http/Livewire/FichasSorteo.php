<?php

namespace App\Http\Livewire;

use App\Models\SorteoFicha;
use Livewire\Component;

class FichasSorteo extends Component
{
    public $open = false, $sorteo, $tipo;

    public function mount($sorteo){

        $this->sorteo = $sorteo;

    }

    public function close(){

        $this->open = false;

    }
    
    public function render()
    {

        $fichas = SorteoFicha::where('sorteo_id',$this->sorteo)
            ->get();


        return view('livewire.fichas-sorteo',compact('fichas'));
    }
}
