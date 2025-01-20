<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\CartonGanador;
use App\Models\CartonSorteo;
use App\Models\Notification_Sorteo;
use App\Models\Sorteo;
use App\Models\SorteoFicha;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class JugarSorteo extends Component
{

    public $letra_select = 0, $numero_select = 0, $sorteo, $iniciar, $ganador_1 = 0, $lugares, $ganador_2 = 0, $ganador_3 = 0;

    protected $listeners = ['render' => 'render', 'echo:ganador,NewGanador' => 'ganad' ];

    public function iniciar_sorteo(){
        $this->iniciar = 1;

        Sorteo::where('id',$this->sorteo)->first()->update([
            'status' => 'Iniciado'
        ]);
    }

    public function mount(){

  

        $sorteo_inicio = Sorteo::where('id',$this->sorteo)->first();

        if($sorteo_inicio){

            $this->iniciar = 1;

            if($sorteo_inicio->type_2 == null) $this->lugares = 1;
            if($sorteo_inicio->type_2 != null && $sorteo_inicio->type_3 == null) $this->lugares = 2;
            if($sorteo_inicio->type_2 != null && $sorteo_inicio->type_3 != null) $this->lugares = 3; 

            $ganadores_actuales_primer = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Primero')
                    ->first();

                $ganadores_actuales_segundo = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Segundo')
                    ->first();

                $ganadores_actuales_tercer = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Tercero')
                    ->first();

                if($ganadores_actuales_primer) $this->ganador_3 = 1;
                if($ganadores_actuales_segundo) $this->ganador_2 = 1;
                if($ganadores_actuales_tercer) $this->ganador_1 = 1; 

        }

        else $this->iniciar = 0;

        

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

                    /*$users_cant_ganador = User::whereHas('cartons_ganador',function(Builder $query){
                        $query->where('sorteo_id', $this->sorteo)
                                ->where('lugar', 'Primero');
                    })->get();

                    foreach($users_cant_ganador as $user){
                        $cont_s = 0;

                        foreach($ganadores_sorteo as $ganas){
                            if($ganas->user_id == $user->id) $cont_s++;
                        }

                        if($cont_s > 1){
                            $suma_premio =  CartonGanador::where('sorteo_id',$this->sorteo)
                            ->where('user_id',$user->id)
                            ->where('lugar', 'Primero')
                            ->sum('premio');

                            $eliminars= CartonGanador::where('sorteo_id',$this->sorteo)
                            ->where('user_id',$user->id)
                            ->take($cont_s - 1)
                            ->where('lugar', 'Primero')
                            ->get();

                            foreach ($eliminars as $eliminar){
                                $carton_eliminar  = $eliminar->carton_id;

                                CartonSorteo::where('carton_id',$carton_eliminar)
                                     ->where('sorteo_id',$this->sorteo)
                                    ->update([
                                        'status_juego' => 'Sin estado'
                                    ]);

                                $eliminar->delete();
                            }

                            CartonGanador::where('sorteo_id',$this->sorteo)
                                ->where('user_id',$user->id)
                                ->where('lugar', 'Primero')
                                ->first()
                                ->update([
                                    'premio' => $suma_premio
                                ]);
                        }
                    }*/

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

            if($this->ganador_1 == 0){

                $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Segundo')->get();

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

                            /*$users_cant_ganador = User::whereHas('cartons_ganador',function(Builder $query){
                                $query->where('sorteo_id', $this->sorteo)
                                        ->where('lugar', 'Segundo');
                            })->get();
        
                            foreach($users_cant_ganador as $user){
                                $cont_s = 0;
        
                                foreach($ganadores_sorteo_1 as $ganas){
                                    if($ganas->user_id == $user->id) $cont_s++;
                                }
        
                                if($cont_s > 1){
                                    $suma_premio =  CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar', 'Segundo')
                                    ->sum('premio');
        
                                    $eliminars= CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar', 'Segundo')
                                    ->take($cont_s - 1)
                                    ->get();
        
                                    foreach ($eliminars as $eliminar){

                                        $carton_eliminar  = $eliminar->carton_id;

                                        CartonSorteo::where('carton_id',$carton_eliminar)
                                            ->where('sorteo_id',$this->sorteo)
                                            ->update([
                                                'status_juego' => 'Sin estado'
                                            ]);

                                        $eliminar->delete();
                                    }
        
                                    CartonGanador::where('sorteo_id',$this->sorteo)
                                        ->where('user_id',$user->id)
                                        ->where('lugar', 'Segundo')
                                        ->first()
                                        ->update([
                                            'premio' => $suma_premio
                                        ]);
                                }
                            }*/
        
                        notyf()
                            ->duration(0)
                            ->position('x', 'center')
                            ->position('y', 'center')
                            ->dismissible(true)
                            ->addInfo('Ya hay ganadores en el 2do lugar, continuemos para el 1er lugar');
                    }
                }
            }
            else{
                $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Primero')->get();

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

                            /*$users_cant_ganador = User::whereHas('cartons_ganador',function(Builder $query){
                                $query->where('sorteo_id', $this->sorteo)
                                        ->where('lugar', 'Primero');
                            })->get();
        
                            foreach($users_cant_ganador as $user){
                                $cont_s = 0;
        
                                foreach($ganadores_sorteo_1 as $ganas){
                                    if($ganas->user_id == $user->id) $cont_s++;
                                }
        
                                if($cont_s > 1){
                                    $suma_premio =  CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar','Primero')
                                    ->sum('premio');
        
                                    $eliminars= CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar','Primero')
                                    ->take($cont_s - 1)
                                    ->get();
        
                                    foreach ($eliminars as $eliminar){
                                        $carton_eliminar  = $eliminar->carton_id;

                                        CartonSorteo::where('carton_id',$carton_eliminar)
                                            ->where('sorteo_id',$this->sorteo)
                                            ->update([
                                                'status_juego' => 'Sin estado'
                                            ]);

                                        $eliminar->delete();
                                    }
        
                                    CartonGanador::where('sorteo_id',$this->sorteo)
                                        ->where('user_id',$user->id)
                                        ->where('lugar','Primero')
                                        ->first()
                                        ->update([
                                            'premio' => $suma_premio
                                        ]);
                                }
                            }*/
        
                        notyf()
                            ->duration(0)
                            ->position('x', 'center')
                            ->position('y', 'center')
                            ->dismissible(true)
                            ->addInfo('Ya hay ganadores en el 1er lugar, ha finalizado el sorteo');
                    }
                }
            }
        }
        else{

            if($this->ganador_1 == 0){

                    $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Tercero')->get();


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

                         /*   $users_cant_ganador = User::whereHas('cartons_ganador',function(Builder $query){
                                $query->where('sorteo_id', $this->sorteo)
                                        ->where('lugar', 'Tercero');
                            })->get();

                            foreach($users_cant_ganador as $user){
                                $cont_s = 0;
        
                                foreach($ganadores_sorteo_1 as $ganas){
                                    if($ganas->user_id == $user->id) $cont_s++;
                                }

        
                                if($cont_s > 1){
                                    $suma_premio =  CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar', 'Tercero')
                                    ->sum('premio');
        
                                    $eliminars= CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar', 'Tercero')
                                    ->take($cont_s - 1)
                                    ->get();
        
                                    foreach ($eliminars as $eliminar){

                                        $carton_eliminar  = $eliminar->carton_id;

                                        CartonSorteo::where('carton_id',$carton_eliminar)
                                            ->where('sorteo_id',$this->sorteo)
                                            ->update([
                                                'status_juego' => 'Sin estado'
                                            ]);

                                        $eliminar->delete();
                                    }
        
                                    CartonGanador::where('sorteo_id',$this->sorteo)
                                        ->where('user_id',$user->id)
                                        ->where('lugar', 'Tercero')
                                        ->first()
                                        ->update([
                                            'premio' => $suma_premio
                                        ]);
                                }
                            }*/

                
                            notyf()
                                ->duration(0)
                                ->position('x', 'center')
                                ->position('y', 'center')
                                ->dismissible(true)
                                ->addInfo('Ya hay ganadores en el 3er lugar, continuemos para el 2do lugar');
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

                            /*$users_cant_ganador = User::whereHas('cartons_ganador',function(Builder $query){
                                $query->where('sorteo_id', $this->sorteo)
                                        ->where('lugar', 'Segundo');
                            })->get();
        
                            foreach($users_cant_ganador as $user){
                                $cont_s = 0;
        
                                foreach($ganadores_sorteo_2 as $ganas){
                                    if($ganas->user_id == $user->id) $cont_s++;
                                }
        
                                if($cont_s > 1){
                                    $suma_premio =  CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar', 'Segundo')
                                    ->sum('premio');
        
                                    $eliminars= CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar', 'Segundo')
                                    ->take($cont_s - 1)
                                    ->get();
        
                                    foreach ($eliminars as $eliminar){
                                        $carton_eliminar  = $eliminar->carton_id;

                                        CartonSorteo::where('carton_id',$carton_eliminar)
                                            ->where('sorteo_id',$this->sorteo)
                                            ->update([
                                                'status_juego' => 'Sin estado'
                                            ]);

                                        $eliminar->delete();
                                    }
        
                                    CartonGanador::where('sorteo_id',$this->sorteo)
                                        ->where('user_id',$user->id)
                                        ->where('lugar', 'Segundo')
                                        ->first()
                                        ->update([
                                            'premio' => $suma_premio
                                        ]);
                                }
                            }*/

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
                    ->where('lugar','Primero')->get();

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

                       /* $users_cant_ganador = User::whereHas('cartons_ganador',function(Builder $query){
                            $query->where('sorteo_id', $this->sorteo)
                                    ->where('lugar', 'Primero');
                        })->get();


    
                        foreach($users_cant_ganador as $user){
                            $cont_s = 0;
    
                            foreach($ganadores_sorteo_3 as $ganas){
                                if($ganas->user_id == $user->id) $cont_s++;
                            }
    
                            if($cont_s > 1){
                                $suma_premio =  CartonGanador::where('sorteo_id',$this->sorteo)
                                ->where('user_id',$user->id)
                                ->where('lugar', 'Primero')
                                ->sum('premio');
    
                                $eliminars= CartonGanador::where('sorteo_id',$this->sorteo)
                                ->where('user_id',$user->id)
                                ->where('lugar', 'Primero')
                                ->take($cont_s - 1)
                                ->get();
    
                                foreach ($eliminars as $eliminar){
                                    $carton_eliminar  = $eliminar->carton_id;

                                    CartonSorteo::where('carton_id',$carton_eliminar)
                                        ->where('sorteo_id',$this->sorteo)
                                        ->update([
                                            'status_juego' => 'Sin estado'
                                        ]);

                                    $eliminar->delete();
                                }
    
                                CartonGanador::where('sorteo_id',$this->sorteo)
                                    ->where('user_id',$user->id)
                                    ->where('lugar', 'Primero')
                                    ->first()
                                    ->update([
                                        'premio' => $suma_premio
                                    ]);
                            }
                        }*/

                        $this->ganador_3 = 1;
                
                        notyf()
                            ->duration(0)
                            ->position('x', 'center')
                            ->position('y', 'center')
                            ->dismissible(true)
                            ->addInfo('Ya hay ganadores en el 1er lugar, ha finalizado el sorteo');
                    }
                }
            }
        }
    }

    public function numero($numero_n){

        $busqueda = SorteoFicha::where('sorteo_id',$this->sorteo)
            ->where('letra',$this->letra_select)
            ->where('numero',$numero_n)
            ->first();

        if($busqueda){

            notyf()
                ->duration(0)
                ->position('x', 'center')
                ->position('y', 'center')
                ->dismissible(true)
                ->addError('¡Ya ha ingresado esa ficha!, ingrese otra');

        }else{
            SorteoFicha::create([
                'sorteo_id' => $this->sorteo,
                'letra' => $this->letra_select,
                'numero' => $numero_n,
            ]);
    
            $this->letra_select = 0;

        }

        

    }

    public function eliminar_ficha($ficha){

        SorteoFicha::where('id',$ficha)->first()->delete();

    }



    public function render()
    {

        if($this->lugares == 1){

            $ganadores_actuales_primer = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Primero')
            ->first();

            if($ganadores_actuales_primer) $this->ganador_1 = 1;    

        }elseif($this->lugares == 2){
            $ganadores_actuales_primer = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Primero')
            ->first();

            $ganadores_actuales_segundo = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Segundo')
            ->first();

            if($ganadores_actuales_primer) $this->ganador_2 = 1;
            if($ganadores_actuales_segundo) $this->ganador_1 = 1;

        }else{

            $ganadores_actuales_primer = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Primero')
            ->first();

            $ganadores_actuales_segundo = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Segundo')
            ->first();
            $ganadores_actuales_tercer = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Tercero')
            ->first();

            if($ganadores_actuales_tercer) $this->ganador_1 = 1;
            if($ganadores_actuales_segundo) $this->ganador_2 = 1;
            if($ganadores_actuales_primer) $this->ganador_3 = 1;

        }

        $fichas = SorteoFicha::where('sorteo_id',$this->sorteo)->get();

        return view('livewire.admin.sorteo.jugar-sorteo',compact('fichas'));
    }
}
