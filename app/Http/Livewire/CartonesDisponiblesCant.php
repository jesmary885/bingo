<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartonesDisponiblesCant extends Component
{

    public $sorteo;

    public function render()
    {
  
        $total_cartones = DB::select('SELECT COUNT(*) as cantidad from carton_sorteos cs
            where cs.sorteo_id = :sorteo_id AND cs.status_carton = "disponible"',array('sorteo_id' => $this->sorteo));

        $json = json_encode($total_cartones);
        $cantidad = json_decode($json);
        $cantidad_total= $cantidad[0]->cantidad;


        return view('livewire.cartones-disponibles-cant',compact('cantidad_total'));
    }
}
