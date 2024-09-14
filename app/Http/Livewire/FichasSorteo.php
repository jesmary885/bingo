<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FichasSorteo extends Component
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
        return view('livewire.fichas-sorteo');
    }
}
