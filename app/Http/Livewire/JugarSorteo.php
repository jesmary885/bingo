<?php

namespace App\Http\Livewire;

use App\Http\Livewire\CartonGanador as LivewireCartonGanador;
use App\Models\Carton;
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
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Flasher\Toastr\Prime\ToastrInterface;

class JugarSorteo extends Component
{
    public $boton_pulsado, $linea_h = 0, $linea_v = 0, $c_e= 0, $diag_iz = 0, $diag_d= 0, $crup_p = 0, $cruz_g = 0,$visible,$no_hay_sorteos = 0, $ganadores_primer_lugar, $ganadores_segundo_lugar, $ganadores_tercer_lugar, $sorteo_finalizado = 0,$sorteo_finalizado_nro, $ganador_1 = 0,$ganador_2 = 0,$ganador_3 = 0,$cant_lugares,$cont_ganador,$valor_dolar_hoy, $ganador_user_login, $carton_ganador_1 , $carton_ganador_2, $carton_ganador_3, $hoy, $sorteo, $type_1, $type_2, $type_3, $cont, $sorteo_iniciado = 0, $cartones_sorteo_iniciado;

   protected $listeners = ['render' => 'render','echo:sorteo_fichas,NewFichaSorteo' => 'emitir_sonido', 'echo:ganador,NewGanador' => 'emitir_sonido_ganador','echo:cambio_estado_sorteo,CambioEstadoSorteo' => 'mount' , 'finalizar' => 'finalizar', 'ganador_fin' => 'ganador_fin'];

   public $initialized = false;
   
   public function mount(){

    //QUITAS ESTO PARA QUE SE ELIMINE EL BOTON AL REFRESCAR LA PAGINA
        Session::forget('metodo_ejecutado');

            if (session()->has('metodo_ejecutado')) {
                $this->boton_pulsado = 1;
            }
            else{
                $this->boton_pulsado = 0;
                Session::put('metodo_ejecutado', true);

            }
    

            $this->cont_ganador = 0;

            $this->visible = 0;
    
                $this->sorteo = Sorteo::where('status','Iniciado')->first();
                $this->ganador_user_login = 0;
            
                if($this->sorteo){
    
                    $this->sorteo_iniciado = 1;
    
                    if($this->sorteo->type_2 == null) $this->cant_lugares = 1;
                    elseif($this->sorteo->type_2 != null && $this->sorteo->type_3 == null) $this->cant_lugares = 2;
                    elseif($this->sorteo->type_2 != null && $this->sorteo->type_3 != null) $this->cant_lugares = 3; 
    
                    $cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                        $query->where('id',$this->sorteo->id);
                    })
                    ->where('user_id', auth()->user()->id)
                    ->where('status_pago', 'Pago recibido')
                    ->where('status_juego', 'Sin estado')
                    ->count(); 
    
                    if($cartones >= 1) $this->cartones_sorteo_iniciado = 1;
    
                    if($this->cant_lugares == 1) $this->type_1 = $this->sorteo->type_1;
                    elseif($this->cant_lugares == 2){
                        $this->type_1 = $this->sorteo->type_1;
                        $this->type_2 = $this->sorteo->type_2;
                    }
                    else{
                        $this->type_1 = $this->sorteo->type_1;
                        $this->type_2 = $this->sorteo->type_2;
                        $this->type_3 = $this->sorteo->type_3;
    
                    }
    
                    $ganadores_actuales_primer = CartonGanador::where('sorteo_id',$this->sorteo->id)
                        ->where('lugar','Primero')
                        ->first();
    
                    $ganadores_actuales_segundo = CartonGanador::where('sorteo_id',$this->sorteo->id)
                        ->where('lugar','Segundo')
                        ->first();
    
                    $ganadores_actuales_tercer = CartonGanador::where('sorteo_id',$this->sorteo->id)
                        ->where('lugar','Tercero')
                        ->first();
    
                    if($ganadores_actuales_primer) $this->ganador_3 = 1;
                    if($ganadores_actuales_segundo) $this->ganador_2 = 1;
                    if($ganadores_actuales_tercer) $this->ganador_1 = 1; 
    
                    if($this->ganador_1 == 1 && $this->ganador_2 == 0){
    
                        $ganadores_sorteo_1 = CartonGanador::with('carton')
                            ->where('sorteo_id',$this->sorteo->id)
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
                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0){
    
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
                    }
                } 
                else{
                    $this->sorteo_iniciado = 0;
                }
    
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

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
            ->where('status_carton','No disponible')
            ->count();

        $sorteo_s = Sorteo::where('id',$this->sorteo->id)->first();

        return $cant_cartones * ($sorteo_s->porcentaje_ganancia * 0.01);
    }

    public function ganancia_sorteo_segundo(){

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
            ->where('status_carton','No disponible')
            ->count();

        $sorteo_s = Sorteo::where('id',$this->sorteo->id)->first();

        return $cant_cartones * ($sorteo_s->porcentaje_ganancia_2do_lugar * 0.01);

    }

    public function ganancia_sorteo_tercero(){

        $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
            ->where('status_carton','No disponible')
            ->count();

        $sorteo_s = Sorteo::where('id',$this->sorteo->id)->first();

        return $cant_cartones * ($sorteo_s->porcentaje_ganancia_3er_lugar * 0.01);

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

                if($this->cant_lugares == 1){
                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Primero'; 
                    } 
                }

                elseif($this->cant_lugares == 2){



                    if($this->ganador_1 == 0){

                  
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Segundo'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Primero';
                    }
                }

                else{

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

                if($this->cant_lugares == 1){
                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Primero'; 
                    } 
                }

                elseif($this->cant_lugares == 2){



                    if($this->ganador_1 == 0){

                  
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Segundo'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Primero';
                    }
                }

                else{

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

                if($this->cant_lugares == 1){
                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Primero'; 
                    } 
                }

                elseif($this->cant_lugares == 2){



                    if($this->ganador_1 == 0){

                  
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Segundo'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Primero';
                    }
                }

                else{

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

                    if($this->cant_lugares == 1){
                        if($this->ganador_1 == 0){
                            $this->carton_ganador_1 = $fichas_carton; 
                            $lugar = 'Primero'; 
                        } 
                    }
    
                    elseif($this->cant_lugares == 2){
    
    
    
                        if($this->ganador_1 == 0){
    
                      
                            $this->carton_ganador_1 = $fichas_carton; 
                            $lugar = 'Segundo'; 
                        } 
    
                        if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                            $this->carton_ganador_2 = $fichas_carton; 
                            $lugar = 'Primero';
                        }
                    }
    
                    else{
    
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

                if($this->cant_lugares == 1){
                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = Carton::where('id',$carton)->first(); 
                        $lugar = 'Primero'; 
                    } 
                }

                elseif($this->cant_lugares == 2){

                    if($this->ganador_1 == 0){

                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Segundo'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Primero';
                    }
                }

                else{

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

                if($this->cant_lugares == 1){
                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Primero'; 
                    } 
                }

                elseif($this->cant_lugares == 2){



                    if($this->ganador_1 == 0){

                  
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Segundo'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Primero';
                    }
                }

                else{

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

    public function verifi_cuatro_esquinas($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();
        $fichas_carton = Carton::where('id',$carton)->first();

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){
            if(json_decode($fichas_carton->content_1,true)[0] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[0] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_1,true)[4] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[4] == $ficha_sorteo->numero )$cont ++;
        }

        if($cont == 4){

            $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id', $fichas_carton->id)
                ->first();

            if(!$buscar){

                if($this->cant_lugares == 1){
                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Primero'; 
                    } 
                }

                elseif($this->cant_lugares == 2){



                    if($this->ganador_1 == 0){

                  
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Segundo'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Primero';
                    }
                }

                else{

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

                }

                $user = CartonSorteo::where('carton_id',$carton)
                ->where('sorteo_id',$this->sorteo->id)
                ->first()
                ->user_id;


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

                if($this->cant_lugares == 1){
                    if($this->ganador_1 == 0){
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Primero'; 
                    } 
                }

                elseif($this->cant_lugares == 2){



                    if($this->ganador_1 == 0){

                  
                        $this->carton_ganador_1 = $fichas_carton; 
                        $lugar = 'Segundo'; 
                    } 

                    if($this->ganador_1 == 1 && $this->ganador_2 == 0) {
                        $this->carton_ganador_2 = $fichas_carton; 
                        $lugar = 'Primero';
                    }
                }

                else{

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

      //  $this->boton_pulsado = 1;

     
        if( $this->boton_pulsado == 0 ) $this->boton_pulsado = 1;
        else $this->boton_pulsado= 0;
    }

    public function nombre($nombre){

        return substr($nombre, 0, 20).''.'...';

    }


    public function ganador_fin(){

        if($this->sorteo_finalizado == 1){
            $this->Sorteo::where('status','Finalizado')
            ->latest()
            ->first();
        }

            $carton_sorteo_activo = CartonSorteo::where('user_id', auth()->user()->id)
            ->where('status_pago', 'Pago recibido')
            ->where('sorteo_id',$this->sorteo->id)
            ->first();

            $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                ->where('status_carton','No disponible')
                ->count();

            if($carton_sorteo_activo || auth()->user()->id == 1 ){ //esto se hace si al menos hay un usuario logueado que este jugando en este sorteo o que se loguee el admin
                if($this->cant_lugares == 1){

                /* $ganadores_sorteo_1 = CartonGanador::with('carton')
                    ->where('sorteo_id',$this->sorteo->id)
                    ->where('lugar','Primero')
                    ->get();
        
                // $this->cont_ganador=0;
                
                    $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo->id)
                        ->where('lugar','Primero')
                        ->count();
                
                    if($ganadores_sorteo_1->isEmpty() == false){
                        $gano_yo = 0;
        
                
                        foreach($ganadores_sorteo_1 as $ganador_yo){
                            if($ganador_yo->user_id == auth()->user()->id) $gano_yo++;
        
                            CartonSorteo::where('carton_id',$ganador_yo->carton_id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->first()
                                    ->update([
                                        'status_juego' => 'Gano'
                                    ]);
        
                                    $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                                    ->where('status_carton','No disponible')
                                    ->count();
                                        
                                    $sorteo = Sorteo::where('id',$this->sorteo)->first();
                                        
                                    $ganancia_dolares = ($cant_cartones * ($this->sorteo->porcentaje_ganancia * 0.01)) / $cant_ganadores_sorteo;
        
                                    $ganadores_sorteo_usuario_log = CartonGanador::where('sorteo_id',$this->sorteo->id)
                                        ->where('user_id',$ganador_yo->user->id)
                                        ->where('lugar','Primero')
                                        ->get();
        
                                    foreach($ganadores_sorteo_usuario_log as $gsul){
                                        $gsul->update([
                                            'premio' => $ganancia_dolares,
                                        ]);
                                    }
        
                                    $user_ganador = User::where('id',$ganador_yo->user->id)->first();
        
                                    $saldo= (UserSaldo::where('user_id',$ganador_yo->user->id)->first()->saldo) + $ganancia_dolares;
        
                                    if($user_ganador->retiro_inmediato == 'Si'){
        
                                        $cuenta = CuentasUser::where('user_id',$ganador_yo->user->id)
                                            ->first();
            
                                        Pago::create([
                                            'user_id' => $ganador_yo->user->id,
                                            'monto' => $ganancia_dolares,
                                            'tipo' => 'Retiro',
                                            'status' => 'Pendiente',
                                            'cuenta_id' => $cuenta->id]);
                                    }
        
                                    UserSaldo::where('user_id',$ganador_yo->user->id)->first()->update([
                                        'saldo' => $saldo,
                                    ]);
                        }
        
                        if($gano_yo > 0){
                
                            $this->ganador_user_login = 1;
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','1')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    $ganadores_sorteo_1_notificacion = CartonGanador::with('carton')
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('lugar','Primero')
                                    ->where('user_id',auth()->user()->id)
                                    ->first();
        
                    
        
                                        notyf()
                                        ->duration(0)
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Felicidades su cartón Nro ' . $ganadores_sorteo_1_notificacion->carton_id . ', ha ganado el primer lugar en el sorteo Nro '. $this->sorteo->id  );
                                    
        
                                
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '1'
                                    ]);
                                }
                        }
                        else{
        
                            $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','1')
                                    ->first();
        
                            if(!$buscar_notificacion){
        
                                Notification_Sorteo::create([
                                    'user_id' => auth()->user()->id,
                                    'sorteo_id' => $this->sorteo->id,
                                    'nro' => '1'
                                ]);
        
                                notyf()
                                    ->duration(0) // 2 seconds
                                    ->position('x', 'center')
                                    ->position('y', 'center')
                                    ->dismissible(true)
                                    ->addInfo('Sorteo Nro ' . $this->sorteo->id .' ha finalizado. Puede consultar los cartones ganadores y fichas sorteadas en la cabecera de la página '. '<img class="	far fa-hand-point-up" src="" alt="">' );
                            }
                        }
                        $this->ganador_1 = 1;

                        ///////////////////Ganancia de empresa

                        $cantidad_ganancia_porcentaje_jugadores = $this->sorteo->porcentaje_ganancia;

                        $porcentaje_empresa = 100 - $cantidad_ganancia_porcentaje_jugadores;
                        $ganancia_empresa = (($cant_cartones * $this->sorteo->precio_carton_dolar) * ($porcentaje_empresa)) / 0.1;

                        EmpresaGanancias::create([
                            'sorteo_id' => $this->sorteo->id,
                            'ganancia' => $ganancia_empresa,
                        ]);

                        ///////////////////////////////////////

        
                        Sorteo::where('id',$this->sorteo->id)->first()->update([
                            'status' => 'Finalizado'
                        ]);

                        $busqueda_sorteo_carton = CartonSorteo::where('sorte_id',$this->sorteo->id)
                            ->where('status_carton','reservado')
                            ->where('status_pago','En espera_pago')
                            ->get();

                        if($busqueda_sorteo_carton){
                            foreach($busqueda_sorteo_carton as $busqueda_s_c){
                                CartonSorteo::where('id',$busqueda_s_c->id)->update(
                                    [
                                        'status_carton' => 'Disponible',
                                        'user_id' => null,
                                        'status_pago' => null
                                    ]
                                );
                            }
                        }
        
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
        
                        
                    }*/
                }
        
                elseif($this->cant_lugares == 2){
        
                    /*if($this->ganador_1 == 0){
        
                        $ganadores_sorteo_1 = CartonGanador::with('carton')
                            ->where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Segundo')
                            ->get();
                
                        $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Segundo')
                            ->count();
                
                        if($ganadores_sorteo_1->isEmpty() == false){
                            $gano_yo = 0;
        
                    
                            foreach($ganadores_sorteo_1 as $ganador_yo){
                                
                                if($ganador_yo->user_id == auth()->user()->id) $gano_yo++;
        
                                CartonSorteo::where('carton_id',$ganador_yo->carton_id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->first()
                                    ->update([
                                        'status_juego' => 'Gano'
                                    ]);
        
                                    $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                                    ->where('status_carton','No disponible')
                                    ->count();
                                        
                                    $sorteo = Sorteo::where('id',$this->sorteo)->first();
        
                                    $ganancia_dolares = ($cant_cartones * ($this->sorteo->porcentaje_ganancia_2do_lugar * 0.01)) / $cant_ganadores_sorteo;
        
                                    $ganadores_sorteo_usuario_log = CartonGanador::where('sorteo_id',$this->sorteo->id)
                                        ->where('user_id',$ganador_yo->user->id)
                                        ->where('lugar','Segundo')
                                        ->get();
        
                                    foreach($ganadores_sorteo_usuario_log as $gsul){
                                        $gsul->update([
                                            'premio' => $ganancia_dolares,
                                        ]);
                                    }
        
                                    $user_ganador = User::where('id',$ganador_yo->user->id)->first();
        
                                    $saldo= (UserSaldo::where('user_id',$ganador_yo->user->id)->first()->saldo) + $ganancia_dolares;
        
                                    if($user_ganador->retiro_inmediato == 'Si'){
        
                                        $cuenta = CuentasUser::where('user_id',$ganador_yo->user->id)
                                            ->first();
            
                                        Pago::create([
                                            'user_id' => $ganador_yo->user->id,
                                            'monto' => $ganancia_dolares,
                                            'tipo' => 'Retiro',
                                            'status' => 'Pendiente',
                                            'cuenta_id' => $cuenta->id]);
                                    }
        
                                    UserSaldo::where('user_id',$ganador_yo->user->id)->first()->update([
                                        'saldo' => $saldo,
                                    ]);
        
        
                            }
                    
                            if($gano_yo > 0){
                    
                                $this->ganador_user_login = 1;
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','1')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                        $ganadores_sorteo_1_notificacion = CartonGanador::with('carton')
                                        ->where('sorteo_id',$this->sorteo->id)
                                        ->where('lugar','Segundo')
                                        ->where('user_id',auth()->user()->id)
                                        ->first();
        
                                    
        
                                            notyf()
                                            ->duration(0)
                                            ->position('x', 'center')
                                            ->position('y', 'center')
                                            ->dismissible(true)
                                            ->addInfo('Felicidades su cartón Nro ' . $ganadores_sorteo_1_notificacion->carton_id . ', ha ganado el segundo lugar en el sorteo Nro '. $this->sorteo->id  );
                                        
        
                                    notyf()
                                        ->duration(0)
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Felicidades su cartón Nro ' . $this->carton_ganador_1->id . ', ha ganado el segundo lugar en el sorteo Nro '. $this->sorteo->id );
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '1'
                                    ]);
                                }
                        
                            }
                            else{
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','1')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '1'
                                    ]);
        
                        
                                    notyf()
                                        ->duration(0) // 2 seconds
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Ya hay un ganador en el 2do lugar, y su(s) carton(es) NO se encuentra entre los ganadores, tienes oportunidad para el premio del 1er lugar, continuemos ' );
                                }
                            }
                            $this->ganador_1 = 1;
        
        
                        }
        
                    }
        
                    else{
        
                        $ganadores_sorteo_2 = CartonGanador::with('carton')
                            ->where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Primero')
                            ->get();
                
                        $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Primero')
                            ->count();
                
                        if($ganadores_sorteo_2->isEmpty() == false){
                            $gano_yo = 0;
        
                    
                            foreach($ganadores_sorteo_2 as $ganador_yo){
                                if($ganador_yo->user_id == auth()->user()->id) $gano_yo++;
        
                                CartonSorteo::where('carton_id',$ganador_yo->carton_id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->first()
                                    ->update([
                                        'status_juego' => 'Gano'
                                    ]);
        
                                    $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                                    ->where('status_carton','No disponible')
                                    ->count();
                                        
                                    $sorteo = Sorteo::where('id',$this->sorteo)->first();
                                        
                                    $ganancia_dolares = ($cant_cartones * ($this->sorteo->porcentaje_ganancia * 0.01)) / $cant_ganadores_sorteo;
        
                                    $ganadores_sorteo_usuario_log = CartonGanador::where('sorteo_id',$this->sorteo->id)
                                        ->where('user_id',$ganador_yo->user->id)
                                        ->where('lugar','Primero')
                                        ->get();
        
                                    foreach($ganadores_sorteo_usuario_log as $gsul){
                                        $gsul->update([
                                            'premio' => $ganancia_dolares,
                                        ]);
                                    }
        
                                    $user_ganador = User::where('id',$ganador_yo->user->id)->first();
        
                                    $saldo= (UserSaldo::where('user_id',$ganador_yo->user->id)->first()->saldo) + $ganancia_dolares;
        
                                    if($user_ganador->retiro_inmediato == 'Si'){
        
                                        $cuenta = CuentasUser::where('user_id',$ganador_yo->user->id)
                                            ->first();
            
                                        Pago::create([
                                            'user_id' => $ganador_yo->user->id,
                                            'monto' => $ganancia_dolares,
                                            'tipo' => 'Retiro',
                                            'status' => 'Pendiente',
                                            'cuenta_id' => $cuenta->id]);
                                    }
        
                                    UserSaldo::where('user_id',$ganador_yo->user->id)->first()->update([
                                        'saldo' => $saldo,
                                    ]);
                            }
                    
                            if($gano_yo > 0){
                    
                                $this->ganador_user_login = 1;
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','2')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    $ganadores_sorteo_1_notificacion = CartonGanador::with('carton')
                                        ->where('sorteo_id',$this->sorteo->id)
                                        ->where('lugar','Primero')
                                        ->where('user_id',auth()->user()->id)
                                        ->first();
        
        
                                            notyf()
                                            ->duration(0)
                                            ->position('x', 'center')
                                            ->position('y', 'center')
                                            ->dismissible(true)
                                            ->addInfo('Felicidades su cartón Nro ' . $ganadores_sorteo_1_notificacion->carton_id . ', ha ganado el primer lugar en el sorteo Nro '. $this->sorteo->id  );
                                        
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '2'
                                    ]);
                                }
                            
                            }
                            else{
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','2')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    notyf()
                                        ->duration(0) // 2 seconds
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Sorteo Nro ' . $this->sorteo->id .' ha finalizado. Puede consultar los cartones ganadores y fichas sorteadas en la cabecera de la página '. '<img class="	far fa-hand-point-up" src="" alt="">');
                                
                                    $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                        ->where('sorteo_id',$this->sorteo->id)
                                        ->where('nro','2')
                                        ->first();
                                }
        
                            }
                            $this->ganador_2 = 1;

                            ///////////////////Ganancia de empresa

                            $cantidad_ganancia_porcentaje_jugadores = $this->sorteo->porcentaje_ganancia_2do_lugar + $this->sorteo->porcentaje_ganancia;

                            $porcentaje_empresa = 100 - $cantidad_ganancia_porcentaje_jugadores;
                            $ganancia_empresa = (($cant_cartones * $this->sorteo->precio_carton_dolar) * ($porcentaje_empresa)) / 0.1;

                            EmpresaGanancias::create([
                                'sorteo_id' => $this->sorteo->id,
                                'ganancia' => $ganancia_empresa,
                            ]);

                            ///////////////////////////////////////
        
                            Sorteo::where('id',$this->sorteo->id)->first()->update([
                                'status' => 'Finalizado'
                            ]);

                            /*$busqueda_sorteo_carton = CartonSorteo::where('sorte_id',$this->sorteo->id)
                            ->where('status_carton','reservado')
                            ->where('status_pago','En espera_pago')
                            ->get();

                            if($busqueda_sorteo_carton){
                                foreach($busqueda_sorteo_carton as $busqueda_s_c){
                                    CartonSorteo::where('id',$busqueda_s_c->id)->update(
                                        [
                                            'status_carton' => 'Disponible',
                                            'user_id' => null,
                                            'status_pago' => null
                                        ]
                                    );
                                }
                            }*/
        
                        /* $this->sorteo_finalizado = 1;
        
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
                    }*/
                }
        
                else{
        
                    if($this->ganador_1 == 0){
        
                        $ganadores_sorteo_1 = CartonGanador::with('carton')
                            ->where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Tercero')
                            ->get();
                
                        $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Tercero')
                            ->count();
                
                        if($ganadores_sorteo_1->isEmpty() == false){

                            $gano_yo = 0;
        
                            foreach($ganadores_sorteo_1 as $ganador_yo){
                                
                                if($ganador_yo->user_id == auth()->user()->id) $gano_yo++;

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

                    
                            if($gano_yo > 0){
        
            
                    
                                $this->ganador_user_login = 1;
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','1')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    $ganadores_sorteo_1_notificacion = CartonGanador::with('carton')
                                        ->where('sorteo_id',$this->sorteo->id)
                                        ->where('lugar','Tercero')
                                        ->where('user_id',auth()->user()->id)
                                        ->first();
        
                    
                                        notyf()
                                        ->duration(0)
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Felicidades su cartón Nro ' . $ganadores_sorteo_1_notificacion->carton_id . ', ha ganado el tercer lugar en el sorteo Nro '. $this->sorteo->id );
                                    
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '1'
                                    ]);
                                }
                        
                            }
                            else{
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','1')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
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
                            $this->ganador_1 = 1;
        
                        }
        
                    }
        
                    if($this->ganador_1 == 1 && $this->ganador_2 == 0){
        
                        $ganadores_sorteo_2 = CartonGanador::with('carton')
                            ->where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Segundo')
                            ->get();
                
                        $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Segundo')
                            ->count();
                
                        if($ganadores_sorteo_2->isEmpty() == false){


                            $gano_yo = 0;
        
                    
                            foreach($ganadores_sorteo_2 as $ganador_yo){

                                if($ganador_yo->user_id == auth()->user()->id) $gano_yo++;

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
                    
                            if($gano_yo > 0){
                    
                                $this->ganador_user_login = 1;
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','2')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    $ganadores_sorteo_1_notificacion = CartonGanador::with('carton')
                                        ->where('sorteo_id',$this->sorteo->id)
                                        ->where('lugar','Segundo')
                                        ->where('user_id',auth()->user()->id)
                                        ->first();
        
        
                                        notyf()
                                        ->duration(0)
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Felicidades su cartón Nro ' . $ganadores_sorteo_1_notificacion->carton_id . ', ha ganado el segundo lugar en el sorteo Nro '. $this->sorteo->id  );
                                    
        
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '2'
                                    ]);
                                }
                        
                            }
                            else{
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','2')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
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
                            $this->ganador_1 = 1;
                            $this->ganador_2 = 1;

        
        
                        }
                    }
        
                    if($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0){
        
                        $ganadores_sorteo_3 = CartonGanador::with('carton')
                            ->where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Primero')
                            ->get();
                
                        $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo->id)
                            ->where('lugar','Primero')
                            ->count();
                
                        if($ganadores_sorteo_3->isEmpty() == false){
                            
                            $ganancia_dolares = ((($cant_cartones * $this->sorteo->precio_carton_dolar) * $this->sorteo->porcentaje_ganancia) / 100 ) / $cant_ganadores_sorteo;

                            $gano_yo = 0;
        

                            foreach($ganadores_sorteo_3 as $ganador_yo){
                                
                                if($ganador_yo->user_id == auth()->user()->id) $gano_yo++;             

                            }
                    
                            if($gano_yo > 0){
                    
                                $this->ganador_user_login = 1;
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','3')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    $ganadores_sorteo_1_notificacion = CartonGanador::with('carton')
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('lugar','Primero')
                                    ->where('user_id',auth()->user()->id)
                                    ->first();
        
        
        
                                        notyf()
                                        ->duration(0)
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Felicidades su cartón Nro ' . $ganadores_sorteo_1_notificacion->carton_id . ', ha ganado el primer lugar en el sorteo Nro '. $this->sorteo->id  );
                                    
        
        
                                    Notification_Sorteo::create([
                                        'user_id' => auth()->user()->id,
                                        'sorteo_id' => $this->sorteo->id,
                                        'nro' => '3'
                                    ]);
                                }
                            
                            }
        
                            else{
        
                                $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                    ->where('sorteo_id',$this->sorteo->id)
                                    ->where('nro','3')
                                    ->first();
        
                                if(!$buscar_notificacion){ 
        
                                    notyf()
                                        ->duration(0) // 2 seconds
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Sorteo Nro ' . $this->sorteo->id .' ha finalizado. Puede consultar los cartones ganadores y fichas sorteadas en la cabecera de la página '. '<img class="	far fa-hand-point-up" src="" alt="">');
                                
                                    $buscar_notificacion = Notification_Sorteo::where('user_id',auth()->user()->id)
                                        ->where('sorteo_id',$this->sorteo->id)
                                        ->where('nro','3')
                                        ->first();
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

       Session::forget('metodo_ejecutado');

    }


    
    public function render()
    {

        if($this->sorteo_iniciado == 1){
      
            if($this->cartones_sorteo_iniciado == 1 || auth()->user()->id == 1){
/*
                if (session()->has('metodo_ejecutado')) {
                    $this->boton_pulsado = 1;
                }
                else{
                    $this->boton_pulsado = 0;
                    Session::put('metodo_ejecutado', true);
    
                }*/


                $fichas = SorteoFicha::where('sorteo_id',$this->sorteo->id)->latest()->get();

                $mis_cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                    $query->where('id',$this->sorteo->id);
                })
                ->where('user_id', auth()->user()->id)
                ->where('status_pago', 'Pago recibido')
                ->where('status_juego', 'Sin estado')
                ->get(); 


                if($fichas->isEmpty() == false){

                 

                    $cartones_todos = CartonSorteo::whereHas('sorteo',function(Builder $query){
                        $query->where('id',$this->sorteo->id);
                    })
                    ->where('status_pago', 'Pago recibido')
                    ->where('status_juego', 'Sin estado')
                    ->get(); 


                    $cartones_ganadores = CartonGanador::where('sorteo_id',$this->sorteo->id)
                        ->get(); 


                    $ficha_ultima = SorteoFicha::where('sorteo_id',$this->sorteo->id)->latest()->first()->id;

                    $sorteo_nro = $this->sorteo->id;

                

                    $mes_restantes = 0;
                    $dias_restantes = 0;
                    $horas_restantes = 0;
                    $minutos_restantes = 0;
                    $ano_restantes = 0;
                }

                else{

         

            
            

                    $fichas = [];
                    $ficha_ultima = 0;
                    $mes_restantes = 0;
                    $dias_restantes = 0;
                    $horas_restantes = 0;
                    $minutos_restantes = 0;
                    $ano_restantes = 0;

                    $cartones_ganadores = [];
        
                    $cartones_ganadores = [];

                    $cartones_todos = CartonSorteo::whereHas('sorteo',function(Builder $query){
                        $query->where('id',$this->sorteo->id);
                    })
                    ->where('status_pago', 'Pago recibido')
                    ->where('status_juego', 'Sin estado')
                    ->get(); 

                    $mis_cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                        $query->where('id',$this->sorteo->id);
                    })
                    ->where('user_id', auth()->user()->id)
                    ->where('status_pago', 'Pago recibido')
                    ->where('status_juego', 'Sin estado')
                    ->get(); 

                    //$ganador=0;
                    $sorteo_nro = $this->sorteo->id;

          
                }

                
            }
            else{

                $cartones_user = CartonSorteo::whereHas('sorteo',function(Builder $query){
                    $query->where('status','Aperturado');
                })
                    ->where('user_id', auth()->user()->id)
                    ->where('status_pago', 'Pago recibido')
                    ->first(); 

                if($cartones_user){



             

                    $fichas = [];

                    $sorteo_user_last = Sorteo::where('id',$cartones_user->sorteo_id)->first();

                    $proxima_fecha = strtotime($sorteo_user_last->fecha_ejecucion);

                    $mes_restantes = date("m",$proxima_fecha);
                    $dias_restantes = date("d",$proxima_fecha);
                    $horas_restantes = date("H",$proxima_fecha);
                    $minutos_restantes = date("I",$proxima_fecha);
                    $ano_restantes = date("Y",$proxima_fecha);

                    $mis_cartones = [];

                    $cartones_ganadores = [];

                    $cartones_todos = CartonSorteo::whereHas('sorteo',function(Builder $query){
                        $query->where('id',$this->sorteo->id);
                    })
                    ->where('status_pago', 'Pago recibido')
                    ->where('status_juego', 'Sin estado')
                    ->get(); 

                    $sorteo_nro = $sorteo_user_last->id;

                    $ficha_ultima  = 0;

                }

                else{


            
                    $fichas = [];

                    $cartones_user = Sorteo::where('status','Aperturado')->first(); 

                    if($cartones_user){ $proxima_fecha = strtotime($cartones_user->fecha_ejecucion);

                    $mes_restantes = date("m",$proxima_fecha);
                    $dias_restantes = date("d",$proxima_fecha);
                    $horas_restantes = date("H",$proxima_fecha);
                    $minutos_restantes = date("I",$proxima_fecha);
                    $ano_restantes = date("Y",$proxima_fecha);

                    $sorteo_nro = $cartones_user->id;

                    $cartones_ganadores = [];
                    $cartones_todos = [];
                    }
                    else{
                        $mes_restantes = 0;
                        $dias_restantes = 0;
                        $horas_restantes = 0;
                        $minutos_restantes = 0;
                        $ano_restantes = 0;

                        $fichas = [];
                        $mis_cartones = [];

                        $cartones_todos = [];

                        $cartones_ganadores = [];
                        $sorteo_nro = 0;
                    }

                    $mis_cartones = [];
                    $ganador = 0; 

                    $ficha_ultima  = 0;
                }

                
            }

        }

        else{


            $cartones_user = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('status','Aperturado');
            })
                ->where('user_id', auth()->user()->id)
                ->where('status_pago', 'Pago recibido')
                ->first(); 

            $ultimo_sorteo = CartonGanador::latest('id')->first();


            if($ultimo_sorteo){

                $cartones_ganadores = CartonGanador::where('sorteo_id',$ultimo_sorteo->sorteo_id)
                ->get(); 

            }
            else{
                $cartones_ganadores = [];
            }


            $fichas = [];
            $mis_cartones = [];

            $cartones_todos = [];

 


            if($cartones_user){


                $sorteo_user_last = Sorteo::where('id',$cartones_user->sorteo_id)->first();


                $proxima_fecha = strtotime($sorteo_user_last->fecha_ejecucion);

                $mes_restantes = date("m",$proxima_fecha);
                $dias_restantes = date("d",$proxima_fecha);
                $horas_restantes = date("H",$proxima_fecha);
                $minutos_restantes = date("I",$proxima_fecha);
                $ano_restantes = date("Y",$proxima_fecha);

                $mis_cartones = [];
                $ganador = 0;

                $sorteo_nro = $sorteo_user_last->id;

                $ficha_ultima  = 0;
            }
            else{

                $fichas = [];

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

                    $ultimo_sorteo = CartonGanador::latest('id')->first();

                    if($ultimo_sorteo){

                        $cartones_ganadores = CartonGanador::where('sorteo_id',$ultimo_sorteo->sorteo_id)
                        ->get(); 

                    }
                    else{
                        $cartones_ganadores = [];
                    }

                    

                    

                    $sorteo_nro = 0;
                }



                $mis_cartones = [];

                $cartones_todos = [];

                $ultimo_sorteo = CartonGanador::latest('id')->first();

                    if($ultimo_sorteo){

                        $cartones_ganadores = CartonGanador::where('sorteo_id',$ultimo_sorteo->sorteo_id)
                        ->get(); 

                    }
                    else{
                        $cartones_ganadores = [];
                    }


                $ganador = 0; 

                $ficha_ultima  = 0;
            }
        }

    
        return view('livewire.jugar-sorteo',compact('cartones_ganadores','cartones_todos','ficha_ultima','fichas','sorteo_nro','mis_cartones','ano_restantes','minutos_restantes','mes_restantes','dias_restantes','horas_restantes'));
    }

   
}
