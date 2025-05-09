<?php

namespace App\Http\Livewire;

use App\Http\Livewire\CartonGanador as LivewireCartonGanador;
use App\Models\Carton;
use App\Models\CartonGanador;
use App\Models\CartonSorteo;
use App\Models\Notification_Sorteo;
use App\Models\Sorteo;
use App\Models\SorteoFicha;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class JugarSorteo extends Component
{
    public $cant_cartones, $cartones_todos, $i, $boton_pulsado, $linea_h = 0, $linea_v = 0, $c_e= 0, $diag_iz = 0, $diag_d= 0, $crup_p = 0, $cruz_g = 0,$visible, $ganadores_primer_lugar, $ganadores_segundo_lugar, $ganadores_tercer_lugar, $sorteo_finalizado = 0,$sorteo_finalizado_nro, $ganador_1 = 0,$ganador_2 = 0,$ganador_3 = 0,$cant_lugares,$cont_ganador,$valor_dolar_hoy, $ganador_user_login, $carton_ganador_1 , $carton_ganador_2, $carton_ganador_3, $hoy, $sorteo, $type_1, $type_2, $type_3, $cont, $sorteo_iniciado = 0, $cartones_sorteo_iniciado;

    public $user;

   protected $listeners = [
        'render' => 'render',
       // 'echo:sorteo_fichas,NewFichaSorteo' => 'emitir_sonido',
       'echo-private:sorteo_fichas,ficha.sorteada' => 'emitir_sonido',
        'echo:ganador,NewGanador' => 'emitir_sonido_ganador',
        'echo:cambio_estado_sorteo,CambioEstadoSorteo' => 'mount' ,
        'finalizar' => 'finalizar',
        'ganador_fin' => 'ganador_fin'
    ];

   public $initialized = false;
   
   public function mount(){

        $this->visible = 0;

        $this->ganador_user_login = 0;

        $this->user = auth()->user();
    
        $this->type_1 = $this->sorteo->type_1;
        $this->type_2 = $this->sorteo->type_2;
        $this->type_3 = $this->sorteo->type_3;

        $this->cartones_todos = CartonSorteo::with('sorteo:id') // Carga solo datos necesarios de la relación
            ->where('sorteo_id', $this->sorteo->id) // Más eficiente que whereHas
            ->where('status_pago', 'Pago recibido')
            ->where('status_juego', 'Sin estado')
            ->select(['id']) // Solo columnas necesarias
            ->get();

            

        $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
        ->where('status_carton','No disponible')
        ->count();

        if(CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Primero')
            ->exists()){ 
                $this->ganador_3 = 1;
            }

        if(CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Segundo')
            ->exists()){ 
                $this->ganador_2 = 1;
            }

        if(CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Tercero')
            ->exists()){ 
                $this->ganador_1 = 1;
            }


        /*$ganadores_actuales_primer =  CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Primero')
            ->exists();
        
        $ganadores_actuales_segundo = CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Segundo')
            ->exists();
        
        $ganadores_actuales_tercer = CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Tercero')
            ->exists();
        
        if($ganadores_actuales_primer)  $this->ganador_3 = 1;
        if($ganadores_actuales_segundo) $this->ganador_2 = 1;
        if($ganadores_actuales_tercer) $this->ganador_1 = 1; */

        if($this->ganador_1 == 0) $this->i = 3;
        if($this->ganador_2 == 0 && $this->ganador_1 == 1) $this->i = 2;
        if($this->ganador_3 == 0 && $this->ganador_2 == 1)  $this->i = 1;

        /*if($this->ganador_1 == 1 && $this->ganador_2 == 0){
        
            $ganadores_sorteo_1 = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('lugar','Tercero')
                ->get();
        
            foreach($ganadores_sorteo_1 as $ganador_yo){
                                        
                if($this->sorteo->type_3 == 'Tradicional'){
                    if($ganador_yo->type == 'Lineal' && $ganador_yo->type_lineal == 'Horizontal') $this->linea_h = 1;
                    if($ganador_yo->type == 'Lineal' && $ganador_yo->type_lineal == 'Vertical') $this->linea_v = 1;
                    if($ganador_yo->type == 'Cuatro esquinas') $this->c_e = 1;
                    if($ganador_yo->type == 'Diagonal' && $ganador_yo->type_lineal == 'Izquierda') $this->diag_iz = 1;
                    if($ganador_yo->type == 'Diagonal' && $ganador_yo->type_lineal == 'Derecha') $this->diag_d = 1;
                    if($ganador_yo->type == 'Cruz G.') $this->cruz_g = 1;
                    if($ganador_yo->type == 'Cruz P.') $this->crup_p = 1;
                }
            }
        }
                        

        if($this->ganador_2 == 1 && $this->ganador_3 == 0){
        
            $ganadores_sorteo_1 = CartonGanador::with('carton')
                ->where('sorteo_id',$this->sorteo->id)
                ->where('lugar','Segundo')
                ->get();
        
            foreach($ganadores_sorteo_1 as $ganador_yo){
                if($this->sorteo->type_2 == 'Tradicional'){
                    if($ganador_yo->type == 'Lineal' && $ganador_yo->type_lineal == 'Horizontal') $this->linea_h = 1;
                    if($ganador_yo->type == 'Lineal' && $ganador_yo->type_lineal == 'Vertical') $this->linea_v = 1;
                    if($ganador_yo->type == 'Cuatro esquinas') $this->c_e = 1;
                    if($ganador_yo->type == 'Diagonal' && $ganador_yo->type_lineal == 'Izquierda') $this->diag_iz = 1;
                    if($ganador_yo->type == 'Diagonal' && $ganador_yo->type_lineal == 'Derecha') $this->diag_d = 1;
                    if($ganador_yo->type == 'Cruz G.') $this->cruz_g = 1;
                    if($ganador_yo->type == 'Cruz P.') $this->crup_p = 1;
                }
            }
        }*/

        $fecha_actual = date("Y-m-d H:i:s");
        $this->hoy= new DateTime($fecha_actual);

    }


    public function emitir_sonido_ganador(){

        $this->emit('emitirSonido_ganador');

        $this->emit('ganador_fin');
    }


    public function emitir_sonido(){

        $this->emit('render');

        $this->emit('emitirSonido');

     
    }

    public function mutear_activar(){

        $this->emit('boton_mute');

    }

    public function ganancia_sorteo_primer(){

        $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
            ->where('status_carton','No disponible')
            ->count();

        $sorteo_s = Sorteo::where('id',$this->sorteo->id)->first();

        return $this->cant_cartones * ($sorteo_s->porcentaje_ganancia * 0.01);
    }

    public function ganancia_sorteo_segundo(){

        $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
            ->where('status_carton','No disponible')
            ->count();

        $sorteo_s = Sorteo::where('id',$this->sorteo->id)->first();

        return $this->cant_cartones * ($sorteo_s->porcentaje_ganancia_2do_lugar * 0.01);

    }

    public function ganancia_sorteo_tercero(){

        $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
            ->where('status_carton','No disponible')
            ->count();

        $sorteo_s = Sorteo::where('id',$this->sorteo->id)->first();

        return $this->cant_cartones * ($sorteo_s->porcentaje_ganancia_3er_lugar * 0.01);

    }



    public function background_ultimo($item){

        $ultimo_sorteo = CartonGanador::latest('id')->first();

        $ficha_nueva = SorteoFicha::where('sorteo_id',  $ultimo_sorteo->sorteo_id)->get();


        foreach ($ficha_nueva as $ficha){

            if($ficha->numero == $item) {
                $this->cont++;
                return 'bg-green-500 animate-pulse animate-fade-right  ';
            }

        }
    }


    public function background($item){
        $ficha_nueva = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();


        foreach ($ficha_nueva as $ficha){

            if($ficha->numero == $item) {
                $this->cont++;
                return 'bg-green-500 animate-pulse animate-fade-right  ';
            }

        }
    }

    public function premio($carton){

        $ultimo_sorteo = CartonGanador::latest('id')->first();

        $premio = CartonGanador::where('sorteo_id',$ultimo_sorteo->sorteo_id )
            ->where('carton_id',$carton)
            ->first()->premio;

        return $premio;


    }

    public function posicion($item,$content,$carton){

        $carton = Carton::where('id',$carton)->first();

        if($content == 1) $content = 'content_1';
        elseif($content == 2) $content = 'content_2';
        elseif($content == 3) $content = 'content_3';
        elseif($content == 4) $content = 'content_4';
        else $content = 'content_5';

        if(json_decode($carton->$content,true)[0] == $item ) return '0';
        elseif(json_decode($carton->$content,true)[1] == $item ) return '1';
        elseif(json_decode($carton->$content,true)[2] == $item ) return '2';
        elseif(json_decode($carton->$content,true)[3] == $item ) return '3';
        elseif(json_decode($carton->$content,true)[4] == $item ) return '4';

    }

    public function diagonal_iz($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();
        $fichas_carton = Carton::where('id',$carton)->first();

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){
            if(json_decode($fichas_carton->content_1,true)[0] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_2,true)[1] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[2] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_4,true)[3] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[4] == $ficha_sorteo->numero )$cont ++;
        }

        if($cont == 5){

            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id', $fichas_carton->id)
                ->first();

            if(!$buscar){


                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Tercero'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Segundo';
                    }

                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0) {
                        $this->carton_ganador_3 = $fichas_carton; 
                        $lugar = 'Primero';
                    }

                $user = CartonSorteo::where('carton_id',$carton)
                    ->where('sorteo_id',$this->sorteo->id)
                    ->first()
                    ->user_id;

                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => $user,
                    'type' => 'Diagonal',
                    'type_lineal' => 'Izquierda',
                    'lugar' => $lugar
                ]);
            }
        }
    }

    public function cruz_pequeña($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();
        $fichas_carton = Carton::where('id',$carton)->first();

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){
            if(json_decode($fichas_carton->content_2,true)[2] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[1] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[2] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[3] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_4,true)[2] == $ficha_sorteo->numero )$cont ++;
        }

        if($cont == 5){

            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id', $fichas_carton->id)
                ->first();

            if(!$buscar){

                if($this->ganador_1 == 0){
                    $this->carton_ganador_1 = $fichas_carton; 
                    $lugar = 'Tercero'; 
                } 

                if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                    $this->carton_ganador_2 = $fichas_carton; 
                    $lugar = 'Segundo';
                }

                if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0) {
                    $this->carton_ganador_3 = $fichas_carton; 
                    $lugar = 'Primero';
                }

                $user = CartonSorteo::where('carton_id',$carton)
                ->where('sorteo_id',$this->sorteo->id)
                ->first()
                ->user_id;

                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => $user,
                    'type' => 'Cruz P.',
                    'lugar' => $lugar
                ]);
            }
        }
    }

    public function cruz_grande($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();
        $fichas_carton = Carton::where('id',$carton)->first();

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){
            if(json_decode($fichas_carton->content_1,true)[2] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[0] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[4] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[2] == $ficha_sorteo->numero )$cont ++;
        }

        if($cont == 4){

            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id', $fichas_carton->id)
                ->first();

            if(!$buscar){

                if($this->ganador_1 == 0){
                    $this->carton_ganador_1 = $fichas_carton; 
                    $lugar = 'Tercero'; 
                } 

                if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                    $this->carton_ganador_2 = $fichas_carton; 
                    $lugar = 'Segundo';
                }

                if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0) {
                    $this->carton_ganador_3 = $fichas_carton; 
                    $lugar = 'Primero';
                }


                $user = CartonSorteo::where('carton_id',$carton)
                ->where('sorteo_id',$this->sorteo->id)
                ->first()
                ->user_id;

                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => $user,
                    'type' => 'Cruz G.',
                    'lugar' => $lugar
                ]);
            }
        }
    }

    public function diagonal_dr($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();
        $fichas_carton = Carton::where('id',$carton)->first();

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){

            if(json_decode($fichas_carton->content_1,true)[4] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_2,true)[3] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[2] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_4,true)[1] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[0] == $ficha_sorteo->numero )$cont ++;

            if($cont == 5){

                $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id',$carton)
                ->first();

                if(!$buscar){

    
                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Tercero'; 
                    } 
    
                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Segundo';
                    }
    
                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0) {
                        $this->carton_ganador_3 = $fichas_carton; 
                        $lugar = 'Primero';
                    }

                    $user = CartonSorteo::where('carton_id',$carton)
                    ->where('sorteo_id',$this->sorteo->id)
                    ->first()
                    ->user_id;
    
                    CartonGanador::create([
                        'sorteo_id' => $this->sorteo->id,
                        'carton_id' => $carton,
                        'user_id' => $user,
                        'type' => 'Diagonal',
                        'type_lineal' => 'Derecha',
                        'lugar' => $lugar
                    ]);
                }
            }
        }
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
            if($cont1 < 5){
                foreach(json_decode($fichas_carton->content_2) as $ficha_2){
                    if($ficha_sorteo->numero == $ficha_2) $cont2++;
                }
                if($cont2 < 5){
    
                    foreach(json_decode($fichas_carton->content_3) as $ficha_3){
                        if($ficha_sorteo->numero == $ficha_3) $cont3++;
                    }
                }
                if($cont3 < 5){
                    foreach(json_decode($fichas_carton->content_4) as $ficha_4){
                        if($ficha_sorteo->numero == $ficha_4) $cont4++;
                    }
                    if($cont4 < 5){
                        foreach(json_decode($fichas_carton->content_5) as $ficha_5){
                            if($ficha_sorteo->numero == $ficha_5) $cont5++;
                        }
                    }
                }
            }
        }

        
        if($cont1 == 5 || $cont2 == 5 || $cont3 == 5 || $cont4 == 5 || $cont5 == 5){
            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id',$carton)
                ->first();

                if($cont1 == 5) $linea = 1;
                if($cont2 == 5) $linea = 2;
                if($cont3 == 5) $linea = 3;
                if($cont4 == 5) $linea = 4;
                if($cont5 == 5) $linea = 5;


            if(!$buscar){



                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = Carton::where('id',$carton)->first(); 
                        $lugar = 'Tercero'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0 && $this->ganador_3 == 0) {
                        $this->carton_ganador_2 = Carton::where('id',$carton)->first(); 
                        $lugar = 'Segundo';
                    }

                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0) {
                        $this->carton_ganador_3 = Carton::where('id',$carton)->first(); 
                        $lugar = 'Primero';
                    }

            

                $user = CartonSorteo::where('carton_id',$carton)
                ->where('sorteo_id',$this->sorteo->id)
                ->first()
                ->user_id;


                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => $user,
                    'type' => 'Lineal',
                    'type_lineal' => 'Horizontal',
                    'type_numero' => $linea,
                    'lugar' => $lugar
                ]);

            }
        }

    }

    public function verifi_linea_vertical($carton){
        $columna1 = 0;
        $columna2 = 0;
        $columna3 = 0;
        $columna4 = 0;
        $columna5 = 0;

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();
        $fichas_carton = Carton::where('id',$carton)->first();

        foreach($fichas_sorteo as $ficha_sorteo ){

            if(json_decode($fichas_carton->content_1,true)[0] == $ficha_sorteo->numero )$columna1 ++;
            if(json_decode($fichas_carton->content_2,true)[0] == $ficha_sorteo->numero )$columna1 ++;
            if(json_decode($fichas_carton->content_3,true)[0] == $ficha_sorteo->numero )$columna1 ++;
            if(json_decode($fichas_carton->content_4,true)[0] == $ficha_sorteo->numero )$columna1 ++;
            if(json_decode($fichas_carton->content_5,true)[0] == $ficha_sorteo->numero )$columna1 ++;

            if(json_decode($fichas_carton->content_1,true)[1] == $ficha_sorteo->numero )$columna2 ++;
            if(json_decode($fichas_carton->content_2,true)[1] == $ficha_sorteo->numero )$columna2 ++;
            if(json_decode($fichas_carton->content_3,true)[1] == $ficha_sorteo->numero )$columna2 ++;
            if(json_decode($fichas_carton->content_4,true)[1] == $ficha_sorteo->numero )$columna2 ++;
            if(json_decode($fichas_carton->content_5,true)[1] == $ficha_sorteo->numero )$columna2 ++;

            if(json_decode($fichas_carton->content_1,true)[2] == $ficha_sorteo->numero )$columna3 ++;
            if(json_decode($fichas_carton->content_2,true)[2] == $ficha_sorteo->numero )$columna3 ++;
            if(json_decode($fichas_carton->content_3,true)[2] == $ficha_sorteo->numero )$columna3 ++;
            if(json_decode($fichas_carton->content_4,true)[2] == $ficha_sorteo->numero )$columna3 ++;
            if(json_decode($fichas_carton->content_5,true)[2] == $ficha_sorteo->numero )$columna3 ++;

            if(json_decode($fichas_carton->content_1,true)[3] == $ficha_sorteo->numero )$columna4 ++;
            if(json_decode($fichas_carton->content_2,true)[3] == $ficha_sorteo->numero )$columna4 ++;
            if(json_decode($fichas_carton->content_3,true)[3] == $ficha_sorteo->numero )$columna4 ++;
            if(json_decode($fichas_carton->content_4,true)[3] == $ficha_sorteo->numero )$columna4 ++;
            if(json_decode($fichas_carton->content_5,true)[3] == $ficha_sorteo->numero )$columna4 ++;

            if(json_decode($fichas_carton->content_1,true)[4] == $ficha_sorteo->numero )$columna5 ++;
            if(json_decode($fichas_carton->content_2,true)[4] == $ficha_sorteo->numero )$columna5 ++;
            if(json_decode($fichas_carton->content_3,true)[4] == $ficha_sorteo->numero )$columna5 ++;
            if(json_decode($fichas_carton->content_4,true)[4] == $ficha_sorteo->numero )$columna5 ++;
            if(json_decode($fichas_carton->content_5,true)[4] == $ficha_sorteo->numero )$columna5 ++;
        }

        if($columna1 == 5 || $columna2 == 5 || $columna3 == 5 || $columna4 == 5 || $columna5 == 5){
            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id',$carton)
                ->first();

                if($columna1 == 5) $linea = 1;
                if($columna2 == 5) $linea = 2;
                if($columna3 == 5) $linea = 3;
                if($columna4 == 5) $linea = 4;
                if($columna5 == 5) $linea = 5;

            if(!$buscar){



                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Tercero'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Segundo';
                    }

                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0) {
                        $this->carton_ganador_3 = $fichas_carton; 
                        $lugar = 'Primero';
                    }


                $user = CartonSorteo::where('carton_id',$carton)
                ->where('sorteo_id',$this->sorteo->id)
                ->first()
                ->user_id;


                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => $user,
                    'type' => 'Lineal',
                    'type_lineal' => 'Vertical',
                    'type_numero' => $linea,
                    'lugar' => $lugar
                ]);
            }
        }
    }

    //optimizada

    public function verifi_cuatro_esquinas($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)
            ->select(['numero'])
            ->get();

        $fichas_carton = Carton::find($carton);

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){
            if(json_decode($fichas_carton->content_1,true)[0] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[0] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_1,true)[4] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[4] == $ficha_sorteo->numero )$cont ++;
        }

        if($cont == 4){


            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id', $carton)
                ->exists();

            if(!$buscar){

                    if($this->ganador_1 == 0){
                     //   $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Tercero'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                     //   $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Segundo';
                    }

                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0) {
                     //   $this->carton_ganador_3 = $fichas_carton; 
                        $lugar = 'Primero';
                    }


                $user = CartonSorteo::where('carton_id', $carton)
                    ->where('sorteo_id', $this->sorteo->id)
                    ->value('user_id'); 


                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => $user,
                    'type' => 'Cuatro esquinas',
                    'lugar' => $lugar
                ]);
            }
        }
    }

    public function verifi_carton_lleno($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();
        $fichas_carton = Carton::where('id',$carton)->first();

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){

            foreach(json_decode($fichas_carton->content_1) as $ficha_1){
                if($ficha_sorteo->numero == $ficha_1) $cont++;
            }

            foreach(json_decode($fichas_carton->content_2) as $ficha_2){
                if($ficha_sorteo->numero == $ficha_2) $cont++;
            }

            foreach(json_decode($fichas_carton->content_3) as $ficha_3){
                if($ficha_sorteo->numero == $ficha_3) $cont++;
            }

            foreach(json_decode($fichas_carton->content_4) as $ficha_4){
                if($ficha_sorteo->numero == $ficha_4) $cont++;
            }

            foreach(json_decode($fichas_carton->content_5) as $ficha_5){
                if($ficha_sorteo->numero == $ficha_5) $cont++;
            }

        }

        if($cont == 25){

            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('carton_id', $fichas_carton->id)
            ->first();

            if(!$buscar){


                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Tercero'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Segundo';
                    }

                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0) {
                        $this->carton_ganador_3 = $fichas_carton; 
                        $lugar = 'Primero';
                    }

                

                $user = CartonSorteo::where('carton_id',$carton)
                ->where('sorteo_id',$this->sorteo->id)
                ->first()
                ->user_id;


                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => $user,
                    'type' => 'Cartón lleno',
                    'lugar' => $lugar
                ]);
            }
        }
    }

    public function precio_dolar(){

        try {
            $client = new Client([
                'base_uri' => 'http://pydolarve.org',
            ]);

            $resultado = $client->request('GET', '/api/v1/dollar?page=bcv');

            if($resultado->getStatusCode() == 200){

                $precio_dolar = json_decode($resultado->getBody(),true);

                return $precio_dolar['monitors']['usd']['price'];
            }

        }
        catch (\GuzzleHttp\Exception\RequestException $e) {

            $error['error'] = $e->getMessage();
            $error['request'] = $e->getRequest();

            if($e->hasResponse()){
                if ($e->getResponse()->getStatusCode() !== '200'){
                    $error['response'] = $e->getResponse(); 
   
                }
            }
        }
    }

    public function visible_todos(){

        if($this->visible == 0) $this->visible = 1;
        else $this->visible = 0;
      

    }

    public function activar_sonido_pulsar(){

        if( $this->boton_pulsado == 0 ) $this->boton_pulsado = 1;
        else $this->boton_pulsado= 0;
    }

    public function nombre($nombre){

        return substr($nombre, 0, 20).''.'...';

    }


    public function ganador_fin(){

        if($this->sorteo){

            $carton_sorteo_activo = CartonSorteo::where('user_id', $this->user->id)
                ->where('status_pago', 'Pago recibido')
                ->where('sorteo_id',$this->sorteo->id)
                ->exists();

            $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                ->where('status_carton','No disponible')
                ->toBase()
                ->count();
        }
        else{

            $this->sorteo = Sorteo::where('status','Finalizado')
                ->latest('updated_at') // Ordenar por fecha de finalización
                ->first();

            $carton_sorteo_activo = CartonSorteo::where('user_id', $this->user->id)
                ->where('status_pago', 'Pago recibido')
                ->where('sorteo_id',$this->sorteo->id)
                ->exists();

            $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                ->where('status_carton','No disponible')
                ->toBase()
                ->count();
        }


        if($carton_sorteo_activo || $this->user->id == 1 ){ //esto se hace si al menos hay un usuario logueado que este jugando en este sorteo o que se loguee el admin
        
                    if($this->ganador_1 == 0){
                
                        $ganadores_sorteo_1 = CartonGanador::where('sorteo_id', $this->sorteo->id)
                            ->where('lugar', 'Tercero')
                            ->where('user_id', $this->user->id) // Filtro directo
                            ->exists(); // Solo verifica existencia
                        
                        $gano_yo = $ganadores_sorteo_1 ? 1 : 0;
                

                        if($gano_yo > 0){
                    
                            $this->ganador_user_login = 1;

                            if(!Notification_Sorteo::where('user_id',$this->user->id)
                                ->where('sorteo_id',$this->sorteo->id)
                                ->where('nro','1')
                                ->exists()){ 
                    
                                
                                notyf()
                                    ->duration(0)
                                    ->position('x', 'center')
                                    ->position('y', 'center')
                                    ->dismissible(true)
                                    ->addInfo('Felicidades ha ganado el tercer lugar en el sorteo Nro '. $this->sorteo->id );
                                                

                                Notification_Sorteo::create([
                                    'user_id' => $this->user->id,
                                    'sorteo_id' => $this->sorteo->id,
                                    'nro' => '1'
                                ]);
                            }
                        }
                        else{
                    
                            if(!Notification_Sorteo::where('user_id',$this->user->id)
                                ->where('sorteo_id',$this->sorteo->id)
                                ->where('nro','1')
                                ->exists()){ 

                                if($this->user->id != 1){

                                    Notification_Sorteo::create([
                                        'user_id' => $this->user->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '1'
                                    ]);
                                        
                                    notyf()
                                        ->duration(0) // 2 seconds
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Ya hay un ganador en el 3er lugar, y su(s) carton(es) NO se encuentra entre los ganadores, tienes oportunidad para el premio del 2do lugar, continuemos ' );
                                }
                            }
                        }

                        $this->ganador_1 = 1;

                        $this->i = 2;

                        SorteoFicha::where('sorteo_id', $this->sorteo->id)->delete();
                    }
        
                    if($this->ganador_1 == 1 && $this->ganador_2 == 0){

                        $ganadores_sorteo_2 = CartonGanador::where('sorteo_id', $this->sorteo->id)
                            ->where('lugar', 'Segundo')
                            ->where('user_id', $this->user->id) // Filtro directo
                            ->exists(); // Solo verifica existencia
                        
                        $gano_yo = $ganadores_sorteo_2 ? 1 : 0;

                        if($gano_yo > 0){
                    
                            $this->ganador_user_login = 1;

                            if(!Notification_Sorteo::where('user_id',$this->user->id)
                                ->where('sorteo_id',$this->sorteo->id)
                                ->where('nro','2')
                                ->exists()){ 

                                notyf()
                                    ->duration(0)
                                    ->position('x', 'center')
                                    ->position('y', 'center')
                                    ->dismissible(true)
                                    ->addInfo('Felicidades ha ganado el segundo lugar en el sorteo Nro '. $this->sorteo->id );
                                                

                                Notification_Sorteo::create([
                                    'user_id' => $this->user->id,
                                    'sorteo_id' => $this->sorteo->id,
                                    'nro' => '2'
                                ]);
                            }
                        }
                        else{
                    
                            if(!Notification_Sorteo::where('user_id',$this->user->id)
                                ->where('sorteo_id',$this->sorteo->id)
                                ->where('nro','2')
                                ->exists()){ 

                                if($this->user->id != 1){

                                    Notification_Sorteo::create([
                                        'user_id' => $this->user->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '2'
                                    ]);
                                        
                                    notyf()
                                        ->duration(0) // 2 seconds
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Ya hay un ganador en el 2do lugar, y su(s) carton(es) NO se encuentra entre los ganadores, tienes oportunidad para el premio del 1er lugar, continuemos ' );
                                }
                            }
                        }

                        $this->ganador_1 = 1;
                        $this->ganador_2 = 1;
                        $this->i = 1;
                    }
        
                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0){

                        $ganadores_sorteo_3 = CartonGanador::where('sorteo_id', $this->sorteo->id)
                            ->where('lugar', 'Primero')
                            ->where('user_id', $this->user->id) // Filtro directo
                            ->exists(); // Solo verifica existencia
                        
                        $gano_yo = $ganadores_sorteo_3 ? 1 : 0;
                
                        if($gano_yo > 0){
                    
                            $this->ganador_user_login = 1;

                            if(!Notification_Sorteo::where('user_id',$this->user->id)
                                ->where('sorteo_id',$this->sorteo->id)
                                ->where('nro','3')
                                ->exists()){ 
                    
                                
                                notyf()
                                    ->duration(0)
                                    ->position('x', 'center')
                                    ->position('y', 'center')
                                    ->dismissible(true)
                                    ->addInfo('Felicidades ha ganado el primer lugar en el sorteo Nro '. $this->sorteo->id );
                                                

                                Notification_Sorteo::create([
                                    'user_id' => $this->user->id,
                                    'sorteo_id' => $this->sorteo->id,
                                    'nro' => '3'
                                ]);
                            }
                        }
                        else{
                    
                            if(!Notification_Sorteo::where('user_id',$this->user->id)
                                ->where('sorteo_id',$this->sorteo->id)
                                ->where('nro','3')
                                ->exists()){ 

                                if($this->user->id != 1){

                                    Notification_Sorteo::create([
                                        'user_id' => $this->user->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '3'
                                    ]);
                                        
                                    notyf()
                                        ->duration(0) // 2 seconds
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Sorteo Nro ' . $this->sorteo->id .' ha finalizado. Puede consultar los cartones ganadores y fichas sorteadas en la cabecera de la página '. '<img class="	far fa-hand-point-up" src="" alt="">');
                                }
                            }
                        }
        
                       
                        
                        $this->ganador_1 = 1;
                        $this->ganador_2 = 1;
                        $this->ganador_3 = 1;


                        if($this->sorteo_finalizado == 1){
                            $this->emit('finalizar');
                        }
                        
                    }

        }

    }


    public function finalizar(){

        $this->sorteo_finalizado = 1;
    
        $this->ganadores_primer_lugar = CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Primero')
            ->get() ?? [];
        
        $this->ganadores_segundo_lugar = CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Segundo')
            ->get() ?? [];
        
        $this->ganadores_tercer_lugar = CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->where('lugar','Tercero')
            ->get() ?? [];

    }


    
    public function render()
    {

       // $fichas = SorteoFicha::where('sorteo_id',$this->sorteo->id)->latest()->get();

       $fichas = SorteoFicha::where('sorteo_id', $this->sorteo->id)
            ->orderBy('created_at', 'DESC')  // Más explícito que latest()
            ->select(['id', 'letra', 'numero'])  // Solo columnas necesarias
            ->get();

        /*$mis_cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
            $query->where('id',$this->sorteo->id);
            })
            ->where('user_id', $this->user->id)
            ->where('status_pago', 'Pago recibido')
            ->where('status_juego', 'Sin estado')
            ->get();*/

        $mis_cartones = CartonSorteo::with('sorteo:id') // Carga solo datos necesarios de la relación
            ->where('sorteo_id', $this->sorteo->id) // Más eficiente que whereHas
            ->where('user_id', $this->user->id)
            ->where('status_pago', 'Pago recibido')
            ->where('status_juego', 'Sin estado')
            ->select(['id']) // Solo columnas necesarias
            ->get();

        

        if($fichas->isEmpty() == false){

            $cartones_ganadores = CartonGanador::where('sorteo_id',$this->sorteo->id)->get(); 
            //$ficha_ultima = SorteoFicha::where('sorteo_id',$this->sorteo->id)->latest()->first()->id;

            $ficha_ultima = SorteoFicha::where('sorteo_id', $this->sorteo->id)
                ->orderBy('created_at', 'DESC')
                ->value('id');

        }

        else{

            $fichas = [];
            $cartones_ganadores = CartonGanador::where('sorteo_id',$this->sorteo->id)->get(); 
            $ficha_ultima = 0;

        }

    
        return view('livewire.jugar-sorteo',compact('cartones_ganadores','ficha_ultima','fichas','mis_cartones'));
    }

   
}
