<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\SorteoFicha;
use Livewire\Component;

class JugarSorteo extends Component
{

    public $letra_select = 0, $numero_select = 0, $sorteo;

    public function letra($letra_s){

        if($letra_s == 'B') $this->letra_select = 'B';
        elseif($letra_s == 'I') $this->letra_select = 'I';
        elseif($letra_s == 'N') $this->letra_select = 'N';
        elseif($letra_s == 'G') $this->letra_select = 'G';
        else $this->letra_select = 'O';

    }

    public function numero($numero_n){

        SorteoFicha::create([
            'sorteo_id' => $this->sorteo,
            'letra' => $this->letra_select,
            'numero' => $numero_n,
        ]);

        $this->letra_select = 0;

    }

    public function eliminar_ficha($ficha){

        SorteoFicha::where('id',$ficha)->first()->delete();

    }



    public function render()
    {

        $fichas = SorteoFicha::where('sorteo_id',$this->sorteo)->get();

        return view('livewire.admin.sorteo.jugar-sorteo',compact('fichas'));
    }
}
