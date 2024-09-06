<?php

namespace App\Http\Livewire;

use App\Models\SorteoFicha;
use Livewire\Component;

class JugarSorteo extends Component
{

    public $sorteo = 1, $nueva=0;

     protected $listeners = ['render' => 'render','echo:sorteo_fichas,NewFichaSorteo' => 'render'];

    public function render()
    {

        $fichas_nuevas = SorteoFicha::where('sorteo_id','1')->get();

        return view('livewire.jugar-sorteo',compact('fichas_nuevas'));
    }

    public function new_ficha(){

        $this->nueva=1;

    }
}
