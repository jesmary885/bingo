<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Http\Livewire\FichasSorteo;
use App\Models\Cart;
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

    public $sorteo_finalizado = 0; 
    public $sorteo_j;
    public $letra_select = 'B'; // Valor por defecto (B)
    public $numero_select = 0;
    public $sorteo;
    public $iniciar;
    public $ganador_1 = 0;
    public $ganador_2 = 0;
    public $ganador_3 = 0;
    public $finalizo = 0;
    public $user;
    public $ganadores_actuales_primer;
    public $ganadores_actuales_segundo;
    public $ganadores_actuales_tercer;
    public $numeros_seleccionados = []; 

    protected $listeners = [
        'render' => 'render', 
        'echo:ganador,NewGanador' => 'ganad' , 
    ];


    public function iniciar_sorteo(){
        $this->iniciar = 1;

        Sorteo::where('id', $this->sorteo)->update(['status' => 'Iniciado']);
    }

    public function cambio_color($ficha_select){

        $ficha = SorteoFicha::where('sorteo_id',$this->sorteo)
            ->where('numero',$ficha_select)
            ->first();

        if($ficha) return "bg-blue-500 text-white  ";


    }

        // Carga todos los números seleccionados UNA SOLA VEZ
    public function cargarNumerosSeleccionados()
    {
        $this->numeros_seleccionados = SorteoFicha::where('sorteo_id', $this->sorteo)
            ->pluck('numero')
            ->toArray();
    }


    public function mount(){


        $this->sorteo_j =  Sorteo::find($this->sorteo);

        if($this->sorteo_j){

            $this->iniciar = 1;

            $this->cargarNumerosSeleccionados();

            $this->user = auth()->user();

            if(CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Primero')
            ->exists()){ 
                $this->ganador_3 = 1;
            }

            if(CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Segundo')
                ->exists()){ 
                    $this->ganador_2 = 1;
                }

            if(CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Tercero')
                ->exists()){ 
                    $this->ganador_1 = 1;
                }

        }

        else $this->iniciar = 0;
    }

    public function letra($letra)
    {
        $this->letra_select = $letra;
    }

    public function ganad(){

        $this->ganadores_actuales_primer = CartonGanador::where('sorteo_id',$this->sorteo)
        ->where('lugar','Primero')
        ->get();

        $this->ganadores_actuales_segundo = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Segundo')
            ->get();

        $this->ganadores_actuales_tercer = CartonGanador::where('sorteo_id',$this->sorteo)
            ->where('lugar','Tercero')
            ->get();

        if($this->ganador_1 == 0 && $this->ganadores_actuales_tercer->isEmpty() == false){

            $this->ganador_1 = 1;

            foreach($this->ganadores_actuales_tercer as $ganador_primero){

                $cant_ganador_carton_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('carton_id',$ganador_primero->carton_id)
                    ->count();

                if($cant_ganador_carton_sorteo_3 > 1){

                    for($i = 1 ; $i <$cant_ganador_carton_sorteo_3; $i++){
                        CartonGanador::where('sorteo_id',$this->sorteo)
                            ->where('carton_id',$ganador_primero->carton_id)
                            ->first()
                            ->delete();
                    }
                }


                CartonSorteo::where('carton_id',$ganador_primero->carton_id)
                    ->where('sorteo_id',$this->sorteo)
                    ->first()
                    ->update([
                        'status_juego' => 'Gano'
                    ]);
            }

            $buscar_notificacion = Notification_Sorteo::where('user_id',$this->user->id)
                ->where('sorteo_id',$this->sorteo)
                ->where('nro','1')
                ->first();

            if(!$buscar_notificacion){ 

                Notification_Sorteo::create([
                    'user_id' => $this->user->id,
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
        
        elseif($this->ganador_1 == 1 && $this->ganador_2 == 0 && $this->ganadores_actuales_segundo->isEmpty() == false){

            $this->ganador_2 = 1;

            $buscar_notificacion = Notification_Sorteo::where('user_id',$this->user->id)
                ->where('sorteo_id',$this->sorteo)
                ->where('nro','2')
                ->first();

            foreach($this->ganadores_actuales_segundo as $ganador_segundo){

                $cant_ganador_carton_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('carton_id',$ganador_segundo->carton_id)
                    ->count();

                if($cant_ganador_carton_sorteo_2 > 1){

                    for($i = 1 ; $i <$cant_ganador_carton_sorteo_2; $i++){
                        CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                            ->where('carton_id',$ganador_segundo->carton_id)->first()->delete();
                    }
                }

                CartonSorteo::where('carton_id',$ganador_segundo->carton_id)
                    ->where('sorteo_id',$this->sorteo)
                    ->first()
                    ->update([
                        'status_juego' => 'Gano'
                    ]);
            }

            if(!$buscar_notificacion){ 

                Notification_Sorteo::create([
                    'user_id' => $this->user->id,
                    'sorteo_id' => $this->sorteo,
                    'nro' => '2'
                ]);

                notyf()
                    ->duration(0)
                    ->position('x', 'center')
                    ->position('y', 'center')
                    ->dismissible(true)
                    ->addInfo('Ya hay ganadores en el 2do lugar, continuemos para el 1er lugar');
            }
        }

        elseif($this->ganador_2 == 1 && $this->ganador_3 == 0 && $this->ganadores_actuales_primer->isEmpty() == false){

            $this->ganador_3 = 1;

            foreach($this->ganadores_actuales_primer as $ganador_primer){

                $cant_ganador_carton_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                    ->where('carton_id',$ganador_primer->carton_id)
                    ->count();

                if($cant_ganador_carton_sorteo_1 > 1){

                    for($i = 1 ; $i <$cant_ganador_carton_sorteo_1; $i++){
                        CartonGanador::where('sorteo_id',$this->sorteo_j->id)
                            ->where('carton_id',$ganador_primer->carton_id)->first()->delete();
                    }
                }

                CartonSorteo::where('carton_id',$ganador_primer->carton_id)
                    ->where('sorteo_id',$this->sorteo)
                    ->first()
                    ->update([
                        'status_juego' => 'Gano'
                    ]);
            }
                    
            $buscar_notificacion = Notification_Sorteo::where('user_id',$this->user->id)
                ->where('sorteo_id',$this->sorteo)
                ->where('nro','3')
                ->first();

            if(!$buscar_notificacion){ 
                Notification_Sorteo::create([
                    'user_id' => $this->user->id,
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

    public function finalizar(){

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo)
        ->where('status_carton','No disponible')
        ->count();

        foreach($this->ganadores_actuales_tercer as $ganador_tercer){

            $cant_ganadores_sorteo_3 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Tercero')
                ->count();

            $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia_3er_lugar) / 100 ) / $cant_ganadores_sorteo_3;

            $ganador_tercer->update([
                'premio' => $ganancia_dolares,
            ]);

            $user_ganador_3 = User::find($ganador_tercer->user_id);

            $buqueda_user_sorteo_ganador_3 = UserGanadorSorteo::where('user_id',$ganador_tercer->user_id)
                ->where('sorteo_id',$this->sorteo)
                ->first();

            if(!$buqueda_user_sorteo_ganador_3){
                    UserGanadorSorteo::create([
                        'user_id' => $ganador_tercer->user_id,
                        'sorteo_id' => $this->sorteo
                    ]);
            }

            $saldoUser = UserSaldo::where('user_id',$ganador_tercer->user_id)->first();

            $saldo = $saldoUser->saldo + $ganancia_dolares;

            $saldoUser->update([
                'saldo' => $saldo,
            ]);


            if($user_ganador_3->retiro_inmediato == 'Si'){
                UserGanancias::create([
                    'user_id' => $ganador_tercer->user_id,
                    'ganancia' => $ganancia_dolares,
                    'sorteo_id' => $this->sorteo,
                    'status' => 'no_procesado']);
            }
        }

        foreach($this->ganadores_actuales_segundo as $ganador_segundo){

            $cant_ganadores_sorteo_2 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Segundo')
                ->count();

            $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia_2do_lugar) / 100 ) / $cant_ganadores_sorteo_2;

            $ganador_segundo->update([
                'premio' => $ganancia_dolares,
            ]);

            $user_ganador_2 = User::find($ganador_segundo->user_id);

            $buqueda_user_sorteo_ganador_2 = UserGanadorSorteo::where('user_id',$ganador_segundo->user_id)
                ->where('sorteo_id',$this->sorteo)
                ->first();

            if(!$buqueda_user_sorteo_ganador_2){
                    UserGanadorSorteo::create([
                        'user_id' => $ganador_segundo->user_id,
                        'sorteo_id' => $this->sorteo
                    ]);
            }

            $saldoUser = UserSaldo::where('user_id',$ganador_segundo->user_id)->first();

            $saldo = $saldoUser->saldo + $ganancia_dolares;

            $saldoUser->update([
                'saldo' => $saldo,
            ]);


            if($user_ganador_2->retiro_inmediato == 'Si'){
                UserGanancias::create([
                    'user_id' => $ganador_segundo->user_id,
                    'ganancia' => $ganancia_dolares,
                    'sorteo_id' => $this->sorteo,
                    'status' => 'no_procesado']);
            }
        }

        foreach($this->ganadores_actuales_primer as $ganador_primer){

            $cant_ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo)
                ->where('lugar','Primero')
                ->count();

            $ganancia_dolares = ((($cant_cartones * $this->sorteo_j->precio_carton_dolar) * $this->sorteo_j->porcentaje_ganancia) / 100 ) / $cant_ganadores_sorteo_1;

            $ganador_primer->update([
                'premio' => $ganancia_dolares,
            ]);

            $user_ganador_1 = User::find($ganador_primer->user_id);

            $buqueda_user_sorteo_ganador_1 = UserGanadorSorteo::where('user_id',$ganador_primer->user_id)
                ->where('sorteo_id',$this->sorteo)
                ->first();

            if(!$buqueda_user_sorteo_ganador_1){
                    UserGanadorSorteo::create([
                        'user_id' => $ganador_primer->user_id,
                        'sorteo_id' => $this->sorteo
                    ]);
            }

            $saldoUser = UserSaldo::where('user_id',$ganador_primer->user_id)->first();

            $saldo = $saldoUser->saldo + $ganancia_dolares;

            $saldoUser->update([
                'saldo' => $saldo,
            ]);


            if($user_ganador_1->retiro_inmediato == 'Si'){
                UserGanancias::create([
                    'user_id' => $ganador_primer->user_id,
                    'ganancia' => $ganancia_dolares,
                    'sorteo_id' => $this->sorteo,
                    'status' => 'no_procesado']);
            }
        }


        $cart_sorteo = Cart::where('sorteo_id',$this->sorteo)
            ->where('status','no_pagado')
            ->get();

        foreach($cart_sorteo as $cart_){

            $cart_->delete();
        }

        $this->sorteo_j->update([
            'status' => 'Finalizado'
        ]);


        ///////////////////Ganancia de empresa

        $cantidad_ganancia_porcentaje_jugadores = $this->sorteo_j->porcentaje_ganancia_3er_lugar + $this->sorteo_j->porcentaje_ganancia_2do_lugar + $this->sorteo_j->porcentaje_ganancia;

        $porcentaje_empresa = 100 - $cantidad_ganancia_porcentaje_jugadores;
        $ganancia_empresa = (($cant_cartones * $this->sorteo_j->precio_carton_dolar) * ($porcentaje_empresa)) / 100;

        EmpresaGanancias::create([
            'sorteo_id' => $this->sorteo,
            'ganancia' => $ganancia_empresa,
        ]);

        //////////////////Generando retiros inmediatos de ganadores

    
        $ganadores_sorteo_general = UserGanadorSorteo::where('sorteo_id',$this->sorteo)
        ->get();

        foreach($ganadores_sorteo_general  as $ganadorS){

            $usuario_g = User::find($ganadorS->user_id);

            if($usuario_g->retiro_inmediato == 'Si'){

                $cuenta = CuentasUser::where('user_id',$usuario_g->id)
                    ->first();

                $ganancia_d = UserGanancias::where('user_id',$usuario_g->id)
                    ->where('sorteo_id',$this->sorteo)
                    ->where('status','no_procesado')
                    ->sum('ganancia');

                $ganancias_user_mod = UserGanancias::where('user_id',$usuario_g->id)
                    ->where('sorteo_id',$this->sorteo)
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

    public function numero($numero_n){

        $busqueda = SorteoFicha::where('sorteo_id',$this->sorteo)
            ->where('numero',$numero_n)
            ->exists();

        if(!$busqueda){

            SorteoFicha::create([
                'sorteo_id' => $this->sorteo,
                'letra' => $this->letra_select,
                'numero' => $numero_n,
            ]);

            $this->numeros_seleccionados[] = $numero_n;

         

        }else{

            notyf()
                ->duration(0)
                ->position('x', 'center')
                ->position('y', 'center')
                ->dismissible(true)
                ->addError('¡Ya ha ingresado esa ficha!, ingrese otra');
            
        }

    }



    public function render()
    {

       //$fichas = SorteoFicha::where('sorteo_id',$this->sorteo)->get();

        return view('livewire.admin.sorteo.jugar-sorteo');
    }
}
