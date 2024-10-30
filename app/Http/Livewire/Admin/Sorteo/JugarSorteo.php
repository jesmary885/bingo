<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\CartonGanador;
use App\Models\Notification_Sorteo;
use App\Models\Sorteo;
use App\Models\SorteoFicha;
use Livewire\Component;

class JugarSorteo extends Component
{

    public $letra_select = 0, $numero_select = 0, $sorteo, $iniciar=0, $ganador_1, $lugares, $ganador_2, $ganador_3;

    protected $listeners = ['render' => 'render', 'echo:ganador,NewGanador' => 'ganad' ];

    public function iniciar_sorteo(){
        $this->iniciar = 1;

        Sorteo::where('id',$this->sorteo)->first()->update([
            'status' => 'Iniciado'
        ]);
    }

    public function mount(){
  

        $sorteo_inicio = Sorteo::where('id',$this->sorteo)->first();

        if($sorteo_inicio->type_2 == null) $this->lugares = 1;
        if($sorteo_inicio->type_2 != null && $sorteo_inicio->type_3 == null) $this->lugares = 2;
        if($sorteo_inicio->type_2 != null && $sorteo_inicio->type_3 != null) $this->lugares = 3; 

    }

    

    public function letra($letra_s){

        if($letra_s == 'B') $this->letra_select = 'B';
        elseif($letra_s == 'I') $this->letra_select = 'I';
        elseif($letra_s == 'N') $this->letra_select = 'N';
        elseif($letra_s == 'G') $this->letra_select = 'G';
        else $this->letra_select = 'O';

    }

    public function ganad(){


 
        if($this->lugares == 1){
            $ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo)->get();

            if($ganadores_sorteo->isEmpty() == false){

                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                        ->where('sorteo_id',$this->sorteo)
                        ->where('nro','1')
                        ->first();

                if(!$buscar_notificacion){ 

                    Notification_Sorteo::create([
                        'user_id' => auth()->user()->id,
                        'sorteo_id' => $this->sorteo,
                        'nro' => '1'
                    ]);

                    $this->ganador_1 = 1;

                    notyf()
                        ->duration(0)
                        ->position('x', 'center')
                        ->position('y', 'center')
                        ->dismissible(true)
                        ->addInfo('El sorteo ha finalizado, ya existen ganadores');
                }
            }
        }
        elseif($this->lugares == 2){

            /*$cant_ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Primero')->count();

            $cant_ganadores_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Segundo')->count();

            if($cant_ganadores_sorteo_1 > 0)  $this->ganador_1 = 1;
            else $this->ganador_1 = 0;

            if($cant_ganadores_sorteo_2 > 0)  $this->ganador_2 = 1;
            else $this->ganador_2 = 0;*/


            if($this->ganador_1 == 0){

                $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Primero')->get();

                if($ganadores_sorteo_1->isEmpty() == false){

                    $this->ganador_1 = 1;

                    $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                        ->where('sorteo_id',$this->sorteo)
                        ->where('nro','1')
                        ->first();

                    if(!$buscar_notificacion){ 

                            Notification_Sorteo::create([
                                'user_id' => auth()->user()->id,
                                'sorteo_id' => $this->sorteo,
                                'nro' => '1'
                            ]);
        
                        notyf()
                            ->duration(0)
                            ->position('x', 'center')
                            ->position('y', 'center')
                            ->dismissible(true)
                            ->addInfo('Ya hay ganadores en el 1er lugar, continuemos para el 2do lugar');
                    }
                }
            }
            else{
                $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Segundo')->get();

                if($ganadores_sorteo_1->isEmpty() == false){

                    $this->ganador_2 = 1;

                    $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                        ->where('sorteo_id',$this->sorteo)
                        ->where('nro','2')
                        ->first();

                    if(!$buscar_notificacion){ 

                            Notification_Sorteo::create([
                                'user_id' => auth()->user()->id,
                                'sorteo_id' => $this->sorteo,
                                'nro' => '2'
                            ]);
        
                        notyf()
                            ->duration(0)
                            ->position('x', 'center')
                            ->position('y', 'center')
                            ->dismissible(true)
                            ->addInfo('Ya hay ganadores en el 2do lugar, ha finalizado el sorteo');
                    }
                }
            }
        }
        else{

            /*$cant_ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Primero')->count();

            $cant_ganadores_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Segundo')->count();

            $cant_ganadores_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Tercero')->count();

            if($cant_ganadores_sorteo_1 > 0)  $this->ganador_1 = 1;
            else $this->ganador_1 = 0;

            if($cant_ganadores_sorteo_2 > 0)  $this->ganador_2 = 1;
            else $this->ganador_2 = 0;

            if($cant_ganadores_sorteo_3 > 0)  $this->ganador_3 = 1;
            else $this->ganador_3 = 0;*/

            if($this->ganador_1 == 0){

                    $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Primero')->get();

                    if($ganadores_sorteo_1->isEmpty() == false){

                        $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                        ->where('sorteo_id',$this->sorteo)
                        ->where('nro','1')
                        ->first();

                        if(!$buscar_notificacion){ 

                            Notification_Sorteo::create([
                                'user_id' => auth()->user()->id,
                                'sorteo_id' => $this->sorteo,
                                'nro' => '1'
                            ]);

                            $this->ganador_1 = 1;
                
                            notyf()
                                ->duration(0)
                                ->position('x', 'center')
                                ->position('y', 'center')
                                ->dismissible(true)
                                ->addInfo('Ya hay ganadores en el 1er lugar, continuemos para el 2do lugar');
                        }
                    }
            }
            elseif($this->ganador_1 == 1 && $this->ganador_2 == 0){

                    $ganadores_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Segundo')->get();

                    if($ganadores_sorteo_2->isEmpty() == false){

                        $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                        ->where('sorteo_id',$this->sorteo)
                        ->where('nro','2')
                        ->first();

                        if(!$buscar_notificacion){ 

                            Notification_Sorteo::create([
                                'user_id' => auth()->user()->id,
                                'sorteo_id' => $this->sorteo,
                                'nro' => '2'
                            ]);

                            $this->ganador_2 = 1;
            
                            notyf()
                                ->duration(0)
                                ->position('x', 'center')
                                ->position('y', 'center')
                                ->dismissible(true)
                                ->addInfo('Ya hay ganadores en el 2do lugar, continuemos para el 3er lugar');
                        }
                    }
            }
            elseif($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0){

                $ganadores_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Tercero')->get();

                if($ganadores_sorteo_3->isEmpty() == false){

                    $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                        ->where('sorteo_id',$this->sorteo)
                        ->where('nro','3')
                        ->first();

                    if(!$buscar_notificacion){ 

                        Notification_Sorteo::create([
                            'user_id' => auth()->user()->id,
                            'sorteo_id' => $this->sorteo,
                            'nro' => '3'
                        ]);

                        $this->ganador_3 = 1;
                
                        notyf()
                            ->duration(0)
                            ->position('x', 'center')
                            ->position('y', 'center')
                            ->dismissible(true)
                            ->addInfo('Ya hay ganadores en el 3er lugar, ha finalizado el sorteo');
                    }
                }
            }
        }
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
