<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Http\Livewire\FichasSorteo;
use App\Models\CartonGanador;
use App\Models\CartonSorteo;
use App\Models\CuentasUser;
use App\Models\EmpresaGanancias;
use App\Models\Notification_Sorteo;
use App\Models\Pago;
use App\Models\Sorteo;
use App\Models\SorteoFicha;
use App\Models\User;
use App\Models\UserGanadorSorteo;
use App\Models\UserGanancias;
use App\Models\UserSaldo;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class JugarSorteo extends Component
{

    public $sorteo_finalizado = 0, $sorteo_j, $letra_select = 0, $numero_select = 0, $sorteo, $iniciar, $ganador_1 = 0, $lugares, $ganador_2 = 0, $ganador_3 = 0, $finalizo = 0;

   protected $listeners = ['render' => 'render', 'echo:ganador,NewGanador' => 'ganand_1' , 'verificar' => 'verific' ];

  // protected $listeners = ['render' => 'render', 'verificar' => 'verific' ];

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

    public function ganand_1(){
        $this->emit('miEvento');
    }


    public function letra($letra_s){

        if($letra_s == 'B') $this->letra_select = 'B';
        elseif($letra_s == 'I') $this->letra_select = 'I';
        elseif($letra_s == 'N') $this->letra_select = 'N';
        elseif($letra_s == 'G') $this->letra_select = 'G';
        else $this->letra_select = 'O';

    }

    public function ganad(){

        $this->sorteo_j = Sorteo::where('id',$this->sorteo)->first();

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo_j->id)
        ->where('status_carton','No disponible')
        ->count();

        $ganadores_actuales_primer = CartonGanador::where('sorteo_id',$this->sorteo)
        ->where('lugar','Primero')
        ->first();

        $ganadores_actuales_segundo = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Segundo')
            ->first();

        $ganadores_actuales_tercer = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Tercero')
            ->first();

        
 
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

            if($this->ganador_1 == 0 && $ganadores_actuales_tercer){

                    $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                    ->where('lugar','Tercero')->get();

                    if($ganadores_sorteo_1->isEmpty() == false){

                        $this->ganador_1 = 1;


                        $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                        ->where('sorteo_id',$this->sorteo)
                        ->where('nro','1')
                        ->first();

                        foreach($ganadores_sorteo_1 as $ganador_yo){

                            $cant_ganador_carton_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                                ->where('carton_id',$ganador_yo->carton_id)
                                ->count();

                            if($cant_ganador_carton_sorteo_3 > 1){

                                for($i = 1 ; $i <$cant_ganador_carton_sorteo_3; $i++){
                                    CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                                        ->where('carton_id',$ganador_yo->carton_id)->first()->delete();
                                }
                            }


                            CartonSorteo::where('carton_id',$ganador_yo->carton_id)
                                ->where('sorteo_id',$this->sorteo_j->id)
                                ->first()
                                ->update([
                                    'status_juego' => 'Gano'
                                ]);

                            
                        }

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
                                ->addInfo('Ya hay ganadores en el 3er lugar, continuemos para el 2do lugar');
                        }
                    }

            }
            elseif($this->ganador_1 == 1 && $this->ganador_2 == 0 && $ganadores_actuales_segundo){


                    $ganadores_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Segundo')->get();



                    if($ganadores_sorteo_2->isEmpty() == false){

                        $this->ganador_2 = 1;

                        $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                        ->where('sorteo_id',$this->sorteo)
                        ->where('nro','2')
                        ->first();

                      

                        foreach($ganadores_sorteo_2 as $ganador_yo){

                            $cant_ganador_carton_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                                ->where('carton_id',$ganador_yo->carton_id)
                                ->count();

                            if($cant_ganador_carton_sorteo_2 > 1){

                                for($i = 1 ; $i <$cant_ganador_carton_sorteo_2; $i++){
                                    CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                                        ->where('carton_id',$ganador_yo->carton_id)->first()->delete();
                                }
                            }



                            CartonSorteo::where('carton_id',$ganador_yo->carton_id)
                                ->where('sorteo_id',$this->sorteo_j->id)
                                ->first()
                                ->update([
                                    'status_juego' => 'Gano'
                                ]);

                        }

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
                                ->addInfo('Ya hay ganadores en el 2do lugar, continuemos para el 3er lugar');
                        }
                    }

        
            }
            elseif($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0 && $ganadores_actuales_primer){

                $ganadores_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('lugar','Primero')->get();

                if($ganadores_sorteo_3->isEmpty() == false){

                    $this->ganador_3 = 1;

                    foreach($ganadores_sorteo_3 as $ganador_yo){

                        $cant_ganador_carton_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                            ->where('carton_id',$ganador_yo->carton_id)
                            ->count();

                        if($cant_ganador_carton_sorteo_1 > 1){

                            for($i = 1 ; $i <$cant_ganador_carton_sorteo_1; $i++){
                                CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                                    ->where('carton_id',$ganador_yo->carton_id)->first()->delete();
                            }
                        }

                        CartonSorteo::where('carton_id',$ganador_yo->carton_id)
                            ->where('sorteo_id',$this->sorteo_j->id)
                            ->first()
                            ->update([
                                'status_juego' => 'Gano'
                            ]);
                    }
                    
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

                
                        notyf()
                            ->duration(0)
                            ->position('x', 'center')
                            ->position('y', 'center')
                            ->dismissible(true)
                            ->addInfo('Ya hay ganadores en el 1er lugar, ha finalizado el sorteo');
                    }

                    $this->finalizo = 1;

                    
                }

    
            }

        }
    }

    public function finalizar(){

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo_j->id)
        ->where('status_carton','No disponible')
        ->count();


        $ganadores_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
            ->where('lugar','Tercero')->get();

        $ganadores_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
            ->where('lugar','Segundo')->get();

        $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
            ->where('lugar','Primero')->get();

        foreach($ganadores_sorteo_3 as $ganador){

            $cant_ganadores_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                ->where('lugar','Tercero')
                ->count();

            $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia_3er_lugar) / 100 ) / $cant_ganadores_sorteo_3;

            $ganador->update([
                'premio' => $ganancia_dolares,
            ]);

            $user_ganador_3 = User::where('id',$ganador->user_id)->first();

            $buqueda_user_sorteo_ganador_3 = UserGanadorSorteo::where('user_id',$ganador->user_id)
                ->where('sorteo_id',$this->sorteo_j->id)
                ->first();

            if(!$buqueda_user_sorteo_ganador_3){
                    UserGanadorSorteo::create([
                        'user_id' => $ganador->user_id,
                        'sorteo_id' => $this->sorteo_j->id
                    ]);
            }

            $saldo= (UserSaldo::where('user_id',$ganador->user_id)->first()->saldo) + $ganancia_dolares;

            UserSaldo::where('user_id',$ganador->user_id)->first()->update([
                    'saldo' => $saldo,
            ]);


            if($user_ganador_3->retiro_inmediato == 'Si'){
                UserGanancias::create([
                    'user_id' => $ganador->user_id,
                    'ganancia' => $ganancia_dolares,
                    'sorteo_id' => $this->sorteo_j->id,
                    'status' => 'no_procesado']);
            }
        }

        foreach($ganadores_sorteo_2 as $ganador){

            

            $cant_ganadores_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                ->where('lugar','Segundo')
                ->count();

            $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia_2do_lugar) / 100 ) / $cant_ganadores_sorteo_2;

            $ganador->update([
                'premio' => $ganancia_dolares,
            ]);

            $user_ganador_2 = User::where('id',$ganador->user_id)->first();

            $buqueda_user_sorteo_ganador_2 = UserGanadorSorteo::where('user_id',$ganador->user_id)
                ->where('sorteo_id',$this->sorteo_j->id)
                ->first();

            if(!$buqueda_user_sorteo_ganador_2){
                    UserGanadorSorteo::create([
                        'user_id' => $ganador->user_id,
                        'sorteo_id' => $this->sorteo_j->id
                    ]);
            }

            $saldo= (UserSaldo::where('user_id',$ganador->user_id)->first()->saldo) + $ganancia_dolares;

            UserSaldo::where('user_id',$ganador->user_id)->first()->update([
                    'saldo' => $saldo,
            ]);


            if($user_ganador_2->retiro_inmediato == 'Si'){
                UserGanancias::create([
                    'user_id' => $ganador->user_id,
                    'ganancia' => $ganancia_dolares,
                    'sorteo_id' => $this->sorteo_j->id,
                    'status' => 'no_procesado']);
            }
        }

        foreach($ganadores_sorteo_1 as $ganador){


            $cant_ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                ->where('lugar','Primero')
                ->count();

            $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia) / 100 ) / $cant_ganadores_sorteo_1;

            $ganador->update([
                'premio' => $ganancia_dolares,
            ]);

            $user_ganador_1 = User::where('id',$ganador->user_id)->first();

            $buqueda_user_sorteo_ganador_1 = UserGanadorSorteo::where('user_id',$ganador->user_id)
                ->where('sorteo_id',$this->sorteo_j->id)
                ->first();

            if(!$buqueda_user_sorteo_ganador_1){
                    UserGanadorSorteo::create([
                        'user_id' => $ganador->user_id,
                        'sorteo_id' => $this->sorteo_j->id
                    ]);
            }

            $saldo= (UserSaldo::where('user_id',$ganador->user_id)->first()->saldo) + $ganancia_dolares;

            UserSaldo::where('user_id',$ganador->user_id)->first()->update([
                    'saldo' => $saldo,
            ]);


            if($user_ganador_1->retiro_inmediato == 'Si'){
                UserGanancias::create([
                    'user_id' => $ganador->user_id,
                    'ganancia' => $ganancia_dolares,
                    'sorteo_id' => $this->sorteo_j->id,
                    'status' => 'no_procesado']);
            }
        }

        Sorteo::where('id',$this->sorteo_j->id)->first()->update([
            'status' => 'Finalizado'
        ]);


        ///////////////////Ganancia de empresa

        $cantidad_ganancia_porcentaje_jugadores = $this->sorteo_j->porcentaje_ganancia_3er_lugar + $this->sorteo_j->porcentaje_ganancia_2do_lugar + $this->sorteo_j->porcentaje_ganancia;

        $porcentaje_empresa = 100 - $cantidad_ganancia_porcentaje_jugadores;
        $ganancia_empresa = (($cant_cartones * $this->sorteo_j->precio_carton_dolar) * ($porcentaje_empresa)) / 100;

        EmpresaGanancias::create([
            'sorteo_id' => $this->sorteo_j->id,
            'ganancia' => $ganancia_empresa,
        ]);

        //////////////////Generando retiros inmediatos de ganadores

    
        $ganadores_sorteo_general = UserGanadorSorteo::where('sorteo_id',$this->sorteo_j->id)
        ->get();

        foreach($ganadores_sorteo_general  as $ganador){

            $usuario_g = User::where('id',$ganador->user_id)->first();

            if($usuario_g->retiro_inmediato == 'Si'){

                $cuenta = CuentasUser::where('user_id',$usuario_g->id)
                    ->first();

                $ganancia_d = UserGanancias::where('user_id',$usuario_g->id)
                    ->where('sorteo_id',$this->sorteo_j->id)
                    ->where('status','no_procesado')
                    ->sum('ganancia');

                $ganancias_user_mod = UserGanancias::where('user_id',$usuario_g->id)
                    ->where('sorteo_id',$this->sorteo_j->id)
                    ->where('status','no_procesado')
                    ->get();

                Pago::create([
                    'user_id' => $usuario_g->id,
                    'monto' => $ganancia_d,
                    'tipo' => 'Retiro',
                    'status' => 'Pendiente',
                    'cuenta_id' => $cuenta->id]);

                foreach($ganancias_user_mod as $g_u_m){
                    $g_u_m->update([
                        'status','procesado'
                    ]);
                }
            }

        }

        notyf()
        ->duration(0)
        ->position('x', 'center')
        ->position('y', 'center')
        ->dismissible(true)
        ->addInfo('Ha finalizado correctamente el sorteo');


        /////////////////////////////////////////////////////////////////////////////////////////////////

        $this->emitTo('jugar-sorteo', 'finalizar');

    }


    public function verific(){

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo_j->id)
        ->where('status_carton','No disponible')
        ->count();

     /*   $ganadores_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
        ->where('lugar','Tercero')->get();

        $ganadores_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
            ->where('lugar','Segundo')->get();

        $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
            ->where('lugar','Primero')->get();*/

    

        if($this->ganador_1 == 0 && $ganadores_actuales_tercer){

            $this->ganador_1 = 1;

            $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                    ->where('lugar','Tercero')->get();

            foreach($ganadores_sorteo_1 as $ganador_yo){

                $cant_ganador_carton_sorteo = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                    ->where('carton_id',$ganador_yo->carton_id)
                    ->count();

                if($cant_ganador_carton_sorteo > 1){


                    for($i = 1 ; $i <$cant_ganador_carton_sorteo; $i++){
                        CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                            ->where('carton_id',$ganador_yo->carton_id)->first()->delete();
                    }
                }

                $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                        ->where('lugar','Tercero')
                        ->count();

                $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia_3er_lugar) / 100 ) / $cant_ganadores_sorteo;

                $ganador_yo->update([
                    'premio' => $ganancia_dolares,
                ]);

                $user_ganador = User::where('id',$ganador_yo->user_id)->first();

                $buqueda_user_sorteo_ganador = UserGanadorSorteo::where('user_id',$ganador_yo->user_id)
                    ->where('sorteo_id',$this->sorteo_j->id)
                    ->first();

                if(!$buqueda_user_sorteo_ganador){

                    UserGanadorSorteo::create([
                        'user_id' => $ganador_yo->user_id,
                        'sorteo_id' => $this->sorteo_j->id
                    ]);

                }

                $saldo= (UserSaldo::where('user_id',$ganador_yo->user_id)->first()->saldo) + $ganancia_dolares;

                UserSaldo::where('user_id',$ganador_yo->user_id)->first()->update([
                    'saldo' => $saldo,
                ]);


                if($user_ganador->retiro_inmediato == 'Si'){
                    UserGanancias::create([
                        'user_id' => $ganador_yo->user_id,
                        'ganancia' => $ganancia_dolares,
                        'sorteo_id' => $this->sorteo_j->id,
                        'status' => 'no_procesado']);
                }
            }
        }
        elseif($this->ganador_1 == 1 && $this->ganador_2 == 0 && $ganadores_actuales_segundo){

            $this->ganador_2 = 1;

            $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                    ->where('lugar','Segundo')->get();

            foreach($ganadores_sorteo_1 as $ganador_yo){

                $cant_ganador_carton_sorteo = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                    ->where('carton_id',$ganador_yo->carton_id)
                    ->count();

                if($cant_ganador_carton_sorteo > 1){


                    for($i = 1 ; $i <$cant_ganador_carton_sorteo; $i++){
                        CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                            ->where('carton_id',$ganador_yo->carton_id)->first()->delete();
                    }
                }

                $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                        ->where('lugar','Segundo')
                        ->count();

                $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia_2do_lugar) / 100 ) / $cant_ganadores_sorteo;

                $ganador_yo->update([
                    'premio' => $ganancia_dolares,
                ]);

                $user_ganador = User::where('id',$ganador_yo->user_id)->first();

                $buqueda_user_sorteo_ganador = UserGanadorSorteo::where('user_id',$ganador_yo->user_id)
                    ->where('sorteo_id',$this->sorteo_j->id)
                    ->first();

                if(!$buqueda_user_sorteo_ganador){

                    UserGanadorSorteo::create([
                        'user_id' => $ganador_yo->user_id,
                        'sorteo_id' => $this->sorteo_j->id
                    ]);

                }

                $saldo= (UserSaldo::where('user_id',$ganador_yo->user_id)->first()->saldo) + $ganancia_dolares;

                UserSaldo::where('user_id',$ganador_yo->user_id)->first()->update([
                    'saldo' => $saldo,
                ]);


                if($user_ganador->retiro_inmediato == 'Si'){
                    UserGanancias::create([
                        'user_id' => $ganador_yo->user_id,
                        'ganancia' => $ganancia_dolares,
                        'sorteo_id' => $this->sorteo_j->id,
                        'status' => 'no_procesado']);
                }
            }

           

        }

        elseif($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0 && $ganadores_actuales_primer){

            $this->ganador_3 = 1;

            $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                    ->where('lugar','Primero')->get();

            foreach($ganadores_sorteo_1 as $ganador_yo){

                $cant_ganador_carton_sorteo = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                    ->where('carton_id',$ganador_yo->carton_id)
                    ->count();

                if($cant_ganador_carton_sorteo > 1){


                    for($i = 1 ; $i <$cant_ganador_carton_sorteo; $i++){
                        CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                            ->where('carton_id',$ganador_yo->carton_id)->first()->delete();
                    }
                }

                $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                        ->where('lugar','Primero')
                        ->count();

                $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia) / 100 ) / $cant_ganadores_sorteo;

                $ganador_yo->update([
                    'premio' => $ganancia_dolares,
                ]);

                $user_ganador = User::where('id',$ganador_yo->user_id)->first();

                $buqueda_user_sorteo_ganador = UserGanadorSorteo::where('user_id',$ganador_yo->user_id)
                    ->where('sorteo_id',$this->sorteo_j->id)
                    ->first();

                if(!$buqueda_user_sorteo_ganador){

                    UserGanadorSorteo::create([
                        'user_id' => $ganador_yo->user_id,
                        'sorteo_id' => $this->sorteo_j->id
                    ]);

                }

                $saldo= (UserSaldo::where('user_id',$ganador_yo->user_id)->first()->saldo) + $ganancia_dolares;

                UserSaldo::where('user_id',$ganador_yo->user_id)->first()->update([
                    'saldo' => $saldo,
                ]);


                if($user_ganador->retiro_inmediato == 'Si'){
                    UserGanancias::create([
                        'user_id' => $ganador_yo->user_id,
                        'ganancia' => $ganancia_dolares,
                        'sorteo_id' => $this->sorteo_j->id,
                        'status' => 'no_procesado']);
                }
            }

             ///////////////////Ganancia de empresa

             $cantidad_ganancia_porcentaje_jugadores = $this->sorteo_j->porcentaje_ganancia_3er_lugar + $this->sorteo_j->porcentaje_ganancia_2do_lugar + $this->sorteo_j->porcentaje_ganancia;

             $porcentaje_empresa = 100 - $cantidad_ganancia_porcentaje_jugadores;
             $ganancia_empresa = (($cant_cartones * $this->sorteo_j->precio_carton_dolar) * ($porcentaje_empresa)) / 100;

             EmpresaGanancias::create([
                 'sorteo_id' => $this->sorteo_j->id,
                 'ganancia' => $ganancia_empresa,
             ]);

             //////////////////Generando retiros inmediatos de ganadores

         
             $ganadores_sorteo_general = UserGanadorSorteo::where('sorteo_id',$this->sorteo_j->id)
             ->get();

             foreach($ganadores_sorteo_general  as $ganador){

                 $usuario_g = User::where('id',$ganador->user_id)->first();

                 if($usuario_g->retiro_inmediato == 'Si'){

                     $cuenta = CuentasUser::where('user_id',$usuario_g->id)
                         ->first();

                     $ganancia_d = UserGanancias::where('user_id',$usuario_g->id)
                         ->where('sorteo_id',$this->sorteo_j->id)
                         ->where('status','no_procesado')
                         ->sum('ganancia');

                     $ganancias_user_mod = UserGanancias::where('user_id',$usuario_g->id)
                         ->where('sorteo_id',$this->sorteo_j->id)
                         ->where('status','no_procesado')
                         ->get();

                     Pago::create([
                         'user_id' => $usuario_g->id,
                         'monto' => $ganancia_d,
                         'tipo' => 'Retiro',
                         'status' => 'Pendiente',
                         'cuenta_id' => $cuenta->id]);

                     foreach($ganancias_user_mod as $g_u_m){
                         $g_u_m->update([
                             'status','procesado'
                         ]);
                     }
                 }

             }

                
            Sorteo::where('id',$this->sorteo_j->id)->first()->update([
                'status' => 'Finalizado'
            ]);

           // $this->emitUp('jugar-sorteo');
        }

        $this->emitUp('jugar-sorteo');
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

          /*  $ganadores_actuales_primer = CartonGanador::where('sorteo_id',$this->sorteo)
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
            if($ganadores_actuales_primer) $this->ganador_3 = 1;*/

        }

        $fichas = SorteoFicha::where('sorteo_id',$this->sorteo)->get();

        return view('livewire.admin.sorteo.jugar-sorteo',compact('fichas'));
    }
}
