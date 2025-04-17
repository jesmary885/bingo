<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Livewire\Component;

class ResultadosSorteos extends Component
{



    public function render()
    {

        $sorteos = Sorteo::select('id', 'fecha_ejecucion')
            ->where('status','Finalizado')
            ->paginate(15);

        return view('livewire.resultados-sorteos',compact('sorteos'));
    }
}
