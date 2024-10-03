<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Livewire\Component;

class GananciaSorteo extends Component
{

    public $sorteo;


    public function render()
    {

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo)
            ->where('status_carton','No disponible')
            ->count();

        $sorteo = Sorteo::where('id',$this->sorteo)->first();

        

        $ganancia_dolares = $cant_cartones * ($sorteo->porcentaje_ganancia * 0.01);
        $dolar_hoy = valor_dolar_hoy();



        return view('livewire.ganancia-sorteo',compact('dolar_hoy','ganancia_dolares','dolar_hoy'));
    }
}
