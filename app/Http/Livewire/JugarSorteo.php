<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use App\Models\CartonGanador;
use App\Models\CartonSorteo;
use App\Models\Sorteo;
use App\Models\SorteoFicha;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class JugarSorteo extends Component
{
    public $sorteo, $type_1, $type_2, $cont;


   protected $listeners = ['render' => 'render','echo:sorteo_fichas,NewFichaSorteo' => 'render', 'echo:ganador,NewGanador' => 'render' ];


  // protected $listeners = ['render' => 'render','echo:sorteo_fichas,NewFichaSorteo' => 'render'];

    
    public function mount(){

        $this->sorteo = Sorteo::where('status','Iniciado')->first();

      /*  $this->type_1 = $this->sorteo->type_1;

        $this->type_2 = $this->sorteo->type_2;*/

    }

    public function background($item){
        $ficha_nueva = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();


        foreach ($ficha_nueva as $ficha){

            if($ficha->numero == $item) {
                $this->cont++;
                return 'bg-green-500';
            }

        }

       /* if($this->cont == 3){
            CartonGanador::create([
                'sorteo_id' => $this->sorteo->id,
                'carton_id' => $carton,
                'user_id' => auth()->user()->id,
                'type' => 'Lineal'
            ]);
        }*/
    }

    public function verifi_linea_horizontal($carton){
        $cont1 = 0;
        $cont2 = 0;
        $cont3 = 0;
        $cont4 = 0;
        $cont5 = 0;

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();
        $fichas_carton = Carton::where('id',$carton)->first();

        foreach($fichas_sorteo as $ficha_sorteo ){
            foreach(json_decode($fichas_carton->content_1) as $ficha_1){
                if($ficha_sorteo->numero == $ficha_1) $cont1++;
            }

            foreach(json_decode($fichas_carton->content_2) as $ficha_2){
                if($ficha_sorteo->numero == $ficha_2) $cont2++;
            }

            foreach(json_decode($fichas_carton->content_3) as $ficha_3){
                if($ficha_sorteo->numero == $ficha_3) $cont3++;
            }

            foreach(json_decode($fichas_carton->content_4) as $ficha_4){
                if($ficha_sorteo->numero == $ficha_4) $cont4++;
            }

            foreach(json_decode($fichas_carton->content_5) as $ficha_5){
                if($ficha_sorteo->numero == $ficha_5) $cont5++;
            }
        }

        
        if($cont1 == 5 || $cont2 == 5 || $cont3 == 5 || $cont4 == 5 || $cont5 == 5){

            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id',$carton)
                ->first();

            if(!$buscar){
                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => auth()->user()->id,
                    'type' => 'Lineal horizontal'
                ]);
            }
        }

    }


    
    public function render()
    {

        $ganador = 0;

        $mis_cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
            $query->where('id',$this->sorteo->id);
        })
        ->where('user_id', auth()->user()->id)
        ->where('status_pago', 'Pago recibido')
        ->get(); 


        $ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo->id)->get();



        if($ganadores_sorteo->isEmpty() == false){

            $ganador = 1;

        }


        //$fichas_nuevas = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();

        return view('livewire.jugar-sorteo',compact('mis_cartones','ganador'));
    }

   
}
