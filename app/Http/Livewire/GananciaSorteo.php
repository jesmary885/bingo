<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;
use App\Models\MetodoPago;
use App\Models\Sorteo;
use Livewire\Component;

class GananciaSorteo extends Component
{

    public $sorteo, $ganancia_dolares_2do, $ganancia_dolares_3er;

    protected $listeners = ['render' => 'render','echo:cambio_cs,CambioEstadoCartonSorteo' => 'render'];


    public function render()
    {

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo)
            ->where('status_carton','No disponible')
            ->count();

        $sorteo_s = Sorteo::where('id',$this->sorteo)->first();

        

        $ganancia_dolares = $cant_cartones * ($sorteo_s->porcentaje_ganancia * 0.01);
        $dolar_hoy = MetodoPago::where('name', 'Pago Movil')
           ->value('valor');;

        $this->ganancia_dolares_2do = $cant_cartones * ($sorteo_s->porcentaje_ganancia_2do_lugar * 0.01);

        $this->ganancia_dolares_3er = $cant_cartones * ($sorteo_s->porcentaje_ganancia_3er_lugar * 0.01);



        return view('livewire.ganancia-sorteo',compact('dolar_hoy','ganancia_dolares','dolar_hoy','sorteo_s'));
    }
}
