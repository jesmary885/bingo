<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Livewire\Component;

class ResultadosSorteos extends Component
{

    
    public function cant_ganancias($sorteo_id){
        $cant_cartones = CartonSorteo::where('sorteo_id',$sorteo_id)
            ->where('status_carton','No disponible')
            ->count();
                        
        $sorteo = Sorteo::where('id',$sorteo_id)->first();
                        
        return ($cant_cartones * ($sorteo->porcentaje_ganancia * 0.01));
    }

    public function render()
    {

        $sorteos = Sorteo::where('status','Finalizado')
            ->paginate(15);

        return view('livewire.resultados-sorteos',compact('sorteos'));
    }
}
