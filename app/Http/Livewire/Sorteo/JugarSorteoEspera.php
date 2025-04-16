<?php

namespace App\Http\Livewire\Sorteo;

use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class JugarSorteoEspera extends Component
{

    public $no_hay_sorteos = 0, $sorteo, $sorteo_user,$user;

    protected $listeners = [
        'render' => 'render',
        'echo:cambio_estado_sorteo,CambioEstadoSorteo' => 'render'
    ];
    

    public function mount(){

        $this->user = auth()->user();


    }


    public function render()
    {

        $this->sorteo = Sorteo::where('status','Iniciado')->first();

        if($this->sorteo){

            $cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('id',$this->sorteo->id);
            })
            ->where('user_id', $this->user->id)
            ->where('status_pago', 'Pago recibido')
            ->where('status_juego', 'Sin estado')
            ->count();

            $mes_restantes = 0;
            $dias_restantes = 0;
            $horas_restantes = 0;
            $minutos_restantes = 0;
            $ano_restantes = 0;
            $segundos_restantes = 0;

            $sorteo_nro = 0;

            if($cartones >= 1 || $this->user->id == 1){

                $this->redirect('/jugar'); 

            }else{
                $this->no_hay_sorteos = 1;
            }

        }else{

            $this->sorteo_user = Sorteo::where('status','Aperturado')->first(); 

                if($this->sorteo_user || $this->user->id == 1) {

                    $cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                        $query->where('id',$this->sorteo_user->id);
                    })
                    ->where('user_id', $this->user->id)
                    ->where('status_pago', 'Pago recibido')
                    ->where('status_juego', 'Sin estado')
                    ->count();

                    if($cartones){

                        $proxima_fecha = strtotime($this->sorteo_user->fecha_ejecucion);
                        $ahora = time();

                        $diferencia = $proxima_fecha - $ahora;

                        // Calculamos el tiempo restante
                        $dias_restantes = floor($diferencia / (60 * 60 * 24));
                        $horas_restantes = floor(($diferencia % (60 * 60 * 24)) / (60 * 60));
                        $minutos_restantes = floor(($diferencia % (60 * 60)) / 60);
                        $segundos_restantes = $diferencia % 60;
                        $mes_restantes = 0;
                        $ano_restantes = 0;

                        $sorteo_nro = $this->sorteo_user->id;

                    }else{
                        
                        $this->no_hay_sorteos = 1;

                        $mes_restantes = 0;
                        $dias_restantes = 0;
                        $horas_restantes = 0;
                        $minutos_restantes = 0;
                        $ano_restantes = 0;
                        $segundos_restantes = 0;

                        $sorteo_nro = 0;

                    }

                    
                }else{

                    $this->no_hay_sorteos = 1;

                    $mes_restantes = 0;
                    $dias_restantes = 0;
                    $horas_restantes = 0;
                    $minutos_restantes = 0;
                    $ano_restantes = 0;
                    $segundos_restantes = 0;

                    $sorteo_nro = 0;
                }
        }
        return view('livewire.sorteo.jugar-sorteo-espera',compact('sorteo_nro','ano_restantes','minutos_restantes','mes_restantes','dias_restantes','horas_restantes','segundos_restantes'));
    }
}
