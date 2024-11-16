<?php

namespace App\Http\Livewire\Sorteo;

use App\Models\Sorteo;
use Livewire\Component;

class InfoSorteo extends Component
{

    protected $listeners = ['render'];

    public $open = false, $sorteo_select, $sorteo;

    public function mount(){

        $this->sorteo = Sorteo::where('id',$this->sorteo_select)->first();

    }

    public function close(){

        $this->open = false;

    }

    public function render()
    {
        return view('livewire.sorteo.info-sorteo');
    }
}
