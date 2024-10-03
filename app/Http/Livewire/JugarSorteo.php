<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use App\Models\CartonGanador;
use App\Models\CartonSorteo;
use App\Models\Sorteo;
use App\Models\SorteoFicha;
use App\Models\User;
use App\Models\UserSaldo;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Flasher\Toastr\Prime\ToastrInterface;

class JugarSorteo extends Component
{
    public $ganador,$cont_ganador,$valor_dolar_hoy, $ganador_user_login, $carton_ganador, $hoy, $sorteo, $type_1, $type_2, $cont, $sorteo_iniciado = 0, $cartones_sorteo_iniciado;

   protected $listeners = ['render' => 'render','echo:sorteo_fichas,NewFichaSorteo' => 'render', 'echo:ganador,NewGanador' => 'ganador_fin','echo:cambio_estado_sorteo,CambioEstadoSorteo' => 'mount' ];

    public function mount(){

        $this->cont_ganador = 0;

        $this->sorteo = Sorteo::where('status','Iniciado')->first();
        $this->ganador_user_login = 0;
    
        if($this->sorteo){

            $this->sorteo_iniciado = 1;

            $cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('id',$this->sorteo->id);
            })
            ->where('user_id', auth()->user()->id)
            ->where('status_pago', 'Pago recibido')
            ->count(); 

            if($cartones >= 1) $this->cartones_sorteo_iniciado = 1;

            $this->type_1 = $this->sorteo->type_1;
            $this->type_2 = $this->sorteo->type_2;

        } 

        $fecha_actual = date("Y-m-d H:i:s");
        $this->hoy= new DateTime($fecha_actual);
    }

    public function background($item){
        $ficha_nueva = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();


        foreach ($ficha_nueva as $ficha){

            if($ficha->numero == $item) {
                $this->cont++;
                return 'bg-green-500';
            }

        }
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

            if($cont == 5){

                $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id',$carton)
                ->first();

                if(!$buscar){
                    CartonGanador::create([
                        'sorteo_id' => $this->sorteo->id,
                        'carton_id' => $carton,
                        'user_id' => auth()->user()->id,
                        'type' => 'Diagonal'
                    ]);
                }

                $this->carton_ganador = $fichas_carton; 
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
                    CartonGanador::create([
                        'sorteo_id' => $this->sorteo->id,
                        'carton_id' => $carton,
                        'user_id' => auth()->user()->id,
                        'type' => 'Diagonal'
                    ]);
                }

                $this->carton_ganador = $fichas_carton; 
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

            if(!$buscar){
                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => auth()->user()->id,
                    'type' => 'Lineal'
                ]);

            $this->carton_ganador = $fichas_carton; 

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

            if(!$buscar){
                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => auth()->user()->id,
                    'type' => 'Lineal'
                ]);

                $this->carton_ganador = $fichas_carton; 
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

            if($cont == 4){

                $buscar = CartonGanador::where('sorteo_id',$this->sorteo->id)
                ->where('carton_id',$carton)
                ->first();

                if(!$buscar){
                    CartonGanador::create([
                        'sorteo_id' => $this->sorteo->id,
                        'carton_id' => $carton,
                        'user_id' => auth()->user()->id,
                        'type' => 'Cuatro esquinas'
                    ]);
                }

                $this->carton_ganador = $fichas_carton; 
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
            ->where('carton_id',$carton)
            ->first();

            if(!$buscar){


                CartonGanador::create([
                    'sorteo_id' => $this->sorteo->id,
                    'carton_id' => $carton,
                    'user_id' => auth()->user()->id,
                    'type' => 'Carton lleno'
                ]);
            }

            $this->carton_ganador = $fichas_carton; 
        }



    }

    public function precio_dolar(){

        try {
            $client = new Client([
                'base_uri' => 'http://pydolarve.org',
            ]);

            $resultado = $client->request('GET', '/api/v1/dollar?monitor=enparalelovzla');

            if($resultado->getStatusCode() == 200){

                $precio_dolar = json_decode($resultado->getBody(),true);

                return $precio_dolar['price'];
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


    public function ganador_fin(){
        $ganadores_sorteo = CartonGanador::with('carton')
            ->where('sorteo_id',$this->sorteo->id)
            ->get();
        
        $cant_ganadores_sorteo = CartonGanador::where('sorteo_id',$this->sorteo->id)
            ->count();
        
        if($ganadores_sorteo->isEmpty() == false){
            $gano_yo = 0;

            $this->cont_ganador++;
    
            foreach($ganadores_sorteo as $ganador_yo){
                if($ganador_yo->user_id == auth()->user()->id) $gano_yo++;
            }
    
            if($gano_yo > 0){
    
                $this->ganador_user_login = 1;

                if($this->cont_ganador == 1){

                    notyf()
                    ->duration(0)
                    ->position('x', 'center')
                    ->position('y', 'center')
                    ->dismissible(true)
                    ->addInfo('Felicidades su carton con serial Nro ' . $this->carton_ganador->serial . ', ha ganado en el sorteo Nro '. $this->sorteo->id .' . Puede consultar los cartones ganadores y fichas sorteadas en la cabecera de la página '. '<img class="	far fa-hand-point-up" src="" alt="">');

                    $cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                    ->where('status_carton','No disponible')
                    ->count();
                        
                    $sorteo = Sorteo::where('id',$this->sorteo)->first();
                        
                    $ganancia_dolares = ($cant_cartones * ($this->sorteo->porcentaje_ganancia * 0.01)) / $cant_ganadores_sorteo;

                    $saldo= (UserSaldo::where('user_id',auth()->user()->id)->first()->saldo) + $ganancia_dolares;

                    UserSaldo::where('user_id',auth()->user()->id)->first()->update([
                        'saldo' => $saldo,
                    ]);
                }                            
            }
            else{

                if($this->cont_ganador == 1){
                     notyf()
                        ->duration(0) // 2 seconds
                        ->position('x', 'center')
                        ->position('y', 'center')
                        ->dismissible(true)
                        ->addInfo('Sorteo Nro ' . $this->sorteo->id .' ha finalizado, usted No se encuentra dentro de los ganadores. Puede consultar los cartones ganadores y fichas sorteadas en la cabecera de la página '. '<img class="	far fa-hand-point-up" src="" alt="">' );
                }
            }
            $this->ganador = 1;
        }
    }


    
    public function render()
    {

        

        if($this->sorteo_iniciado == 1){
            if($this->cartones_sorteo_iniciado == 1){

     

                $fichas = SorteoFicha::where('sorteo_id',$this->sorteo->id)->latest()->get();

                $mis_cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                    $query->where('id',$this->sorteo->id);
                })
                ->where('user_id', auth()->user()->id)
                ->where('status_pago', 'Pago recibido')
                ->get(); 

               
               if($fichas->isEmpty() == false){

                    $ficha_ultima = SorteoFicha::where('sorteo_id',$this->sorteo->id)->latest()->first()->id;

    
                    $sorteo_nro = $this->sorteo->id;

                    $ganadores_sorteo = CartonGanador::with('carton')
                    ->where('sorteo_id',$this->sorteo->id)
                    ->get();

                    if($ganadores_sorteo->isEmpty() == false){
                        $this->ganador = 1;

                    }
                    
    
                       /* $ganadores_sorteo = CartonGanador::with('carton')
                            ->where('sorteo_id',$this->sorteo->id)
                            ->get();
        
                       if($ganadores_sorteo->isEmpty() == false){
                            $gano_yo = 0;

                            $this->cont_ganador++;
    
                            foreach($ganadores_sorteo as $ganador_yo){
                                if($ganador_yo->user_id == auth()->user()->id) $gano_yo++;
                            }
    
                            if($gano_yo > 0){
    
                                $this->ganador_user_login = 1;

                             

                                    notyf()
                                    ->duration(0)
                                    ->position('x', 'center')
                                    ->position('y', 'center')
                                    ->dismissible(true)
                                    ->addInfo('Felicidades su carton con serial Nro ' . '' . ', ha ganado en el sorteo Nro '. $this->sorteo->id);

                          
    
                               
                            
                            }
                            else{

                                if($this->cont_ganador == 1){
                                    notyf()
                                        ->duration(0) // 2 seconds
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Sorteo Nro ' . $this->sorteo->id .'ha finalizado, ya puede consultar los cartones ganadores y fichas sorteadas');
                                }
                            }
                            $ganador = 1;
                        }*/
    
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

                $fichas = [];

                $sorteo_user_last = Sorteo::where('id',$cartones_user->sorteo_id)->first();

                $proxima_fecha = strtotime($sorteo_user_last->fecha_ejecucion);

                $mes_restantes = date("m",$proxima_fecha);
                $dias_restantes = date("d",$proxima_fecha);
                $horas_restantes = date("H",$proxima_fecha);
                $minutos_restantes = date("I",$proxima_fecha);
                $ano_restantes = date("Y",$proxima_fecha);

                $mis_cartones = [];
                //$ganador = 0; 

                //$sorteo_user_last = $cartones_user->id;

                $sorteo_nro = $sorteo_user_last->id;

                $ficha_ultima  = 0;
            }
        }

        else{


            $cartones_user = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('status','Aperturado');
            })
            ->where('user_id', auth()->user()->id)
            ->where('status_pago', 'Pago recibido')
            ->first(); 

            $fichas = [];

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

                //$sorteo_user_last = $cartones_user->id;

                $sorteo_nro = $sorteo_user_last->id;

                $ficha_ultima  = 0;
            }
            else{

                $fichas = [];

                $cartones_user = Sorteo::where('status','Aperturado')->first(); 

                $proxima_fecha = strtotime($cartones_user->fecha_ejecucion);

                $mes_restantes = date("m",$proxima_fecha);
                $dias_restantes = date("d",$proxima_fecha);
                $horas_restantes = date("H",$proxima_fecha);
                $minutos_restantes = date("I",$proxima_fecha);
                $ano_restantes = date("Y",$proxima_fecha);

                $sorteo_nro = $cartones_user->id;

                $mis_cartones = [];
                $ganador = 0; 

                $ficha_ultima  = 0;
            }
        }

        return view('livewire.jugar-sorteo',compact('ficha_ultima','fichas','sorteo_nro','mis_cartones','ano_restantes','minutos_restantes','mes_restantes','dias_restantes','horas_restantes'));
    }

   
}
