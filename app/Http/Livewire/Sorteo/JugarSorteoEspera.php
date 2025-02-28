<?php

namespace App\Http\Livewire\Sorteo;

use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class JugarSorteoEspera extends Component
{

    public $no_hay_sorteos = 0, $sorteo;
    protected $listeners = ['render' => 'render','echo:cambio_estado_sorteo,CambioEstadoSorteo' => 'render'];


    public function render()
    {

        $this->sorteo = Sorteo::where('status','Iniciado')->first();

        if($this->sorteo){

            $cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('id',$this->sorteo->id);
            })
            ->where('user_id', auth()->user()->id)
            ->where('status_pago', 'Pago recibido')
            ->where('status_juego', 'Sin estado')
            ->count();

            $mes_restantes = 0;
            $dias_restantes = 0;
            $horas_restantes = 0;
            $minutos_restantes = 0;
            $ano_restantes = 0;

            $sorteo_nro = 0;

            if($cartones >= 1){

                $this->emitTo('jugar-sorteo', 'render');

            }

        }else{
            $sorteo_user = Sorteo::where('status','Aperturado')->first(); 

                if($sorteo_user) {

                    $proxima_fecha = strtotime($sorteo_user->fecha_ejecucion);

                    $mes_restantes = date("m",$proxima_fecha);
                    $dias_restantes = date("d",$proxima_fecha);
                    $horas_restantes = date("H",$proxima_fecha);
                    $minutos_restantes = date("I",$proxima_fecha);
                    $ano_restantes = date("Y",$proxima_fecha);

                    $sorteo_nro = $sorteo_user->id;
                }else{

                    $this->no_hay_sorteos = 1;

                    $mes_restantes = 0;
                    $dias_restantes = 0;
                    $horas_restantes = 0;
                    $minutos_restantes = 0;
                    $ano_restantes = 0;
                }
        }
        return view('livewire.sorteo.jugar-sorteo-espera',compact('sorteo_nro','ano_restantes','minutos_restantes','mes_restantes','dias_restantes','horas_restantes'));
    }
}
