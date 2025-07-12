<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use App\Models\CartonGanador;
use App\Models\CartonSorteo;
use App\Models\Notification_Sorteo;
use App\Models\Sorteo;
use App\Models\SorteoFicha;
use DateTime;
use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class JugarSorteo extends Component
{
    public $fichas = [];
    public $ficha_ultima = 0;
    public $cartones_ganadores = [];
    public $tipo_sorteo_global;
    public $mis_cartones = [], $cant_cartones, $audioIniciado = false, $cartones_todos, $i, $boton_pulsado = 0, $linea_h = 0, $linea_v = 0, $c_e= 0, $diag_iz = 0, $diag_d= 0, $crup_p = 0, $cruz_g = 0,$visible, $ganadores_primer_lugar, $ganadores_segundo_lugar, $ganadores_tercer_lugar, $sorteo_finalizado = 0,$sorteo_finalizado_nro, $ganador_1 = 0,$ganador_2 = 0,$ganador_3 = 0,$cant_lugares,$cont_ganador,$valor_dolar_hoy, $ganador_user_login, $carton_ganador_1 , $carton_ganador_2, $carton_ganador_3, $hoy, $sorteo, $type_1, $type_2, $type_3, $cont, $sorteo_iniciado = 0, $cartones_sorteo_iniciado;

    public $user;

  /* protected $listeners = [
        'render' => 'render',
       // 'echo:sorteo_fichas,NewFichaSorteo' => 'emitir_sonido',
       //'echo:sorteo_fichas,.ficha.sorteada' => 'nuevaFichaRecibida',
       'echo:sorteo.'.$this->getSorteoIdProperty().',ficha.sorteada' => 'nuevaFichaRecibida',
     //  'echo:sorteo_fichas,ficha.sorteada' => 'invalidateCacheFichas',
        'echo:ganador,.ganador.nuevo' => 'emitir_sonido_ganador', // Agregado el punto aquí
        'echo:cambio_estado_sorteo,CambioEstadoSorteo' => 'mount' ,
        'finalizar' => 'finalizar',
        'ganador_fin' => 'ganador_fin',
    //    'fichaAgregada' => 'invalidateCacheFichas',
    //    'fichasReiniciadas' => 'invalidateCacheFichas'
    ];*/

    protected function getListeners()
    {
    return [
        'render' => 'render',
       // 'echo:sorteo_fichas,NewFichaSorteo' => 'emitir_sonido',
       'echo:sorteo_fichas,.ficha.sorteada' => 'nuevaFichaRecibida',
       //'echo:sorteo.'.$this->getSorteoIdProperty().',ficha.sorteada' => 'nuevaFichaRecibida',
     //  'echo:sorteo_fichas,ficha.sorteada' => 'invalidateCacheFichas',
        'echo:ganador,.ganador.nuevo' => 'emitir_sonido_ganador', // Agregado el punto aquí
        'echo:cambio_estado_sorteo,CambioEstadoSorteo' => 'mount' ,
        'finalizar' => 'finalizar',
        'ganador_fin' => 'ganador_fin',
    //    'fichaAgregada' => 'invalidateCacheFichas',
    //    'fichasReiniciadas' => 'invalidateCacheFichas'
    ];
    }


    public function getSorteoIdProperty()
{
    return $this->sorteo->id ?? 0; // Asegura que siempre haya un valor
}

   public $initialized = false;
   
    public function mount(){

        $this->visible = 0;

        $this->fichas = [];

        $this->ganador_user_login = 0;

        $this->user = auth()->user();

        if($this->sorteo->type_sorteo == 'Pago'){

            $this->type_1 = $this->sorteo->type_1;
            $this->type_2 = $this->sorteo->type_2;
            $this->type_3 = $this->sorteo->type_3;
            $this->tipo_sorteo_global ='Pago';

        }else{
            $this->type_1 = $this->sorteo->type_1;
            $this->tipo_sorteo_global = 'Gratis';
        }
    
        

        $this->cargarDatosIniciales();

     $this->cartones_todos = CartonSorteo::where('sorteo_id', $this->sorteo->id) // Más eficiente que whereHas
            ->where(function($query) {
                $query->where('status_pago', 'Pago recibido')
                ->orWhere('status_pago', 'Premio');
            })
            ->where('status_juego', 'Sin estado')
            ->select(['id','sorteo_id','carton_id','user_id','status_carton','status_pago','status_juego'])
            ->get(); // Solo necesitamos los IDs


            

        $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
            ->where('status_carton','No disponible')
            ->toBase()
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

        if($this->sorteo->type_sorteo == 'Pago'){
            if($this->ganador_1 == 0) $this->i = 3;
            if($this->ganador_2 == 0 && $this->ganador_1 == 1) $this->i = 2;
            if($this->ganador_3 == 0 && $this->ganador_2 == 1)  $this->i = 1;
        }else{
            if($this->ganador_1 == 0) $this->i = 3;
        }

        $fecha_actual = date("Y-m-d H:i:s");
        $this->hoy= new DateTime($fecha_actual);

    }

    public function cargarDatosIniciales(){

        try {
            $fichas = $this->getFichasSorteadas();
            $this->fichas = is_array($fichas) ? $fichas : $fichas->toArray();
        } catch (\Exception $e) {
            $this->fichas = []; // Fallback seguro
            \Log::error("Error cargando fichas: " . $e->getMessage());
        }

         // Cargar fichas iniciales
         $this->fichas = $this->getFichasSorteadas();

        $this->actualizarMisCartones();

        $this->actualizarCartonesGanadores();

         $this->ficha_ultima = $this->fichas[0]['id'] ?? 0;

    }

    public function actualizarMisCartones(){

        $safeJsonDecode = function($data) {
            if (is_array($data)) {
                return $data; // Ya es array, no necesita decodificación
            }
            return json_decode($data, true) ?? []; // Decodifica o retorna array vacío si falla
        };

        $cartonesSorteo = CartonSorteo::with(['carton' => function($query) {
            $query->select('id', 'content_1', 'content_2', 'content_3', 'content_4', 'content_5');
        }])
        ->where('sorteo_id', $this->sorteo->id)
        ->where('user_id', $this->user->id)
        ->where(function($query) {
        $query->where('status_pago', 'Pago recibido')
              ->orWhere('status_pago', 'Premio');
        })
        ->where('status_juego', 'Sin estado')
        ->get();

   
     // Cargar cartones del usuario
        $this->mis_cartones = $cartonesSorteo->map(function($cartonSorteo) use ($safeJsonDecode) {
            return [
                'id' => $cartonSorteo->id,
                'sorteo_id' => $cartonSorteo->sorteo_id,
                'carton_id' => $cartonSorteo->carton_id,
                'carton' => [
                    'id' => $cartonSorteo->carton->id,
                    'content_1' => $safeJsonDecode($cartonSorteo->carton->content_1),
                    'content_2' => $safeJsonDecode($cartonSorteo->carton->content_2),
                    'content_3' => $safeJsonDecode($cartonSorteo->carton->content_3),
                    'content_4' => $safeJsonDecode($cartonSorteo->carton->content_4),
                    'content_5' => $safeJsonDecode($cartonSorteo->carton->content_5),
                ],
                'status_pago' => $cartonSorteo->status_pago,
                'status_juego' => $cartonSorteo->status_juego
            ];
        })->toArray();
    }

    public function actualizarCartonesGanadores(){

        $safeJsonDecode = function($data) {
            if (is_array($data)) {
                return $data; // Ya es array, no necesita decodificación
            }
            return json_decode($data, true) ?? []; // Decodifica o retorna array vacío si falla
        };

        $cartonesGanador = CartonGanador::with([
            'carton' => function($query) {
                $query->select('id', 'content_1', 'content_2', 'content_3', 'content_4', 'content_5');
            },
            'user' => function($query) {
                $query->select('id', 'name', 'email'); // Selecciona solo los campos necesarios
            }
            ])
            ->where('sorteo_id', $this->sorteo->id)
            ->get();

            $this->cartones_ganadores = $cartonesGanador ->map(function($cartonesGanador) use ($safeJsonDecode) {
                return [
                    'id' => $cartonesGanador->id,
                    'sorteo_id' => $cartonesGanador->sorteo_id,
                    'carton_id' => $cartonesGanador->carton_id,
                    'type_lineal' => $cartonesGanador->type_lineal,
                    'type_numero' => $cartonesGanador->type_numero,
                    'type' => $cartonesGanador->type,
                    'lugar' => $cartonesGanador->lugar,
                    'premio' => $cartonesGanador->premio,
                    'user_id' => $cartonesGanador->user_id,
                    'user_name' => $cartonesGanador->user->name, // Acceso al nombre del usuario
                    'user_email' => $cartonesGanador->user->email, // Opcional: email del usuario
                    'carton' => [
                        'id' => $cartonesGanador->carton->id,
                        'content_1' => $safeJsonDecode($cartonesGanador->carton->content_1),
                        'content_2' => $safeJsonDecode($cartonesGanador->carton->content_2),
                        'content_3' => $safeJsonDecode($cartonesGanador->carton->content_3),
                        'content_4' => $safeJsonDecode($cartonesGanador->carton->content_4),
                        'content_5' => $safeJsonDecode($cartonesGanador->carton->content_5),
                    ],
                ];
            })->toArray();
        
    }

    public function nuevaFichaRecibida($payload){

         // Asegurarnos que $this->fichas sea un array
     /*   if ($this->fichas instanceof \Illuminate\Support\Collection) {
            $this->fichas = $this->fichas->toArray();
        } elseif (!is_array($this->fichas)) {
            $this->fichas = [];
        }*/

        if (!is_array($this->fichas)) {
            $this->fichas = [];
        }


        if ($payload) {

        // El payload contiene los datos enviados desde el servidor
            $fichaData = [
                'id' => $payload['id'] ?? null, // Asegúrate que tu evento envia el ID
                'letra' => $payload['letra'],
                'numero' => $payload['numero'],
                // Agrega otros campos necesarios
            ];
            
            // Actualizamos el array de fichas
            //array_push($this->fichas, $fichaData);
            //$this->fichas = array_merge($this->fichas, [$fichaData]);
           //array_unshift($this->fichas, $fichaData); // Agrega al inicio en lugar del final
           //$this->fichas = array_unshift($this->fichas, $payload);
           $this->fichas = array_merge([$payload], (array)$this->fichas);
            $this->ficha_ultima = $payload['id'] ;

        }else{
            // Si no viene la ficha, hacer una consulta ligera
            $ultimaFicha = SorteoFicha::where('sorteo_id', $this->sorteo->id)
                ->orderBy('created_at', 'DESC')
                ->first(['id', 'letra', 'numero']);
                
            if ($ultimaFicha) {
                //array_push($this->fichas, $ultimaFicha->toArray());
               // $this->fichas = array_merge($this->fichas, [$ultimaFicha->toArray()]);
                array_unshift($this->fichas, [$ultimaFicha->toArray()]); // Agrega al inicio en lugar del final
                $this->ficha_ultima = $ultimaFicha->id;
            }


        }

        
        // Emitimos el sonido
        $this->emit('emitirSonido');

    }



    protected function getFichasSorteadas()
    {
    
        if (!$this->sorteo || !$this->sorteo->id) {
            return [];
        }

        return SorteoFicha::where('sorteo_id', $this->sorteo->id)
            ->orderByDesc('created_at')
            ->get(['id', 'letra', 'numero'])
            ->toArray(); // Conversión explícita
 
    }




    public function emitir_sonido_ganador(){

        $this->emit('emitirSonido_ganador');

        $this->emit('ganador_fin');
    }


    public function emitir_sonido(){

      //  $this->emit('render');

        $this->emit('emitirSonido');

     
    }

    public function mutear_activar(){

        $this->emit('boton_mute');

    }

    public function activar_sonido_pulsar(){

        if( $this->boton_pulsado == 0 ){
            $this->boton_pulsado = 1;
            $this->audioIniciado = true;
            $this->emit('audioIniciado'); // Usamos "emit" en Livewire 2.x
        } 
        else $this->boton_pulsado= 0;
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

    public function ganancia_sorteo_primer(){

        return $this->cant_cartones * ($this->sorteo->porcentaje_ganancia * 0.01);
    }

    public function ganancia_sorteo_segundo(){

        return $this->cant_cartones * ($this->sorteo->porcentaje_ganancia_2do_lugar * 0.01);

    }

    public function ganancia_sorteo_tercero(){

        return $this->cant_cartones * ($this->sorteo->porcentaje_ganancia_3er_lugar * 0.01);

    }


    public function background($item){
       // $ficha_nueva = SorteoFicha::where('sorteo_id',$this->sorteo->id)->get();

       if (!is_array($this->fichas)) {
            return ''; // Retorna cadena vacía si no es array
        }

        foreach ($this->fichas as $ficha){

            if($ficha['numero'] == $item) {
                $this->cont++;
                return 'bg-green-500 animate-pulse animate-fade-right  ';
            }

        }
    }

    public function posicion($item,$content,$carton){

        $carton = Carton::find($carton);

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

                //$this->actualizarCartonesGanadores();
            }
        }
    }

    public function diagonal_iz($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)
            ->select(['numero'])
            ->get();

        $fichas_carton = Carton::find($carton);

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
                    'type' => 'Diagonal',
                    'type_lineal' => 'Izquierda',
                    'lugar' => $lugar
                ]);

              //  $this->actualizarCartonesGanadores();
            }
        }
    }

    public function cruz_pequeña($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)
            ->select(['numero'])
            ->get();

        $fichas_carton = Carton::find($carton);

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
                    'type' => 'Cruz P.',
                    'lugar' => $lugar
                ]);

              //  $this->actualizarCartonesGanadores();
            }
        }
    }

    public function cruz_grande($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)
            ->select(['numero'])
            ->get();

        $fichas_carton = Carton::find($carton);

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){
            if(json_decode($fichas_carton->content_1,true)[2] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[0] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[4] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[2] == $ficha_sorteo->numero )$cont ++;
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
                    'type' => 'Cruz G.',
                    'lugar' => $lugar
                ]);

             //   $this->actualizarCartonesGanadores();
            }
        }
    }

    public function diagonal_dr($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)
            ->select(['numero'])
            ->get();

        $fichas_carton = Carton::find($carton);

        $cont = 0;

        foreach($fichas_sorteo as $ficha_sorteo ){

            if(json_decode($fichas_carton->content_1,true)[4] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_2,true)[3] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_3,true)[2] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_4,true)[1] == $ficha_sorteo->numero )$cont ++;
            if(json_decode($fichas_carton->content_5,true)[0] == $ficha_sorteo->numero )$cont ++;

            if($cont == 5){

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
                        'type' => 'Diagonal',
                        'type_lineal' => 'Derecha',
                        'lugar' => $lugar
                    ]);

                   // $this->actualizarCartonesGanadores();
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

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)
            ->select(['numero'])
            ->get();

        $fichas_carton = Carton::find($carton);

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
 
                if($cont1 == 5) $linea = 1;
                if($cont2 == 5) $linea = 2;
                if($cont3 == 5) $linea = 3;
                if($cont4 == 5) $linea = 4;
                if($cont5 == 5) $linea = 5;


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
                    'type' => 'Lineal',
                    'type_lineal' => 'Horizontal',
                    'type_numero' => $linea,
                    'lugar' => $lugar
                ]);

               // $this->actualizarCartonesGanadores();

            }
        }

    }

    public function verifi_linea_vertical($carton){
        $columna1 = 0;
        $columna2 = 0;
        $columna3 = 0;
        $columna4 = 0;
        $columna5 = 0;

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)
            ->select(['numero'])
            ->get();

        $fichas_carton = Carton::find($carton);

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
    

                if($columna1 == 5) $linea = 1;
                if($columna2 == 5) $linea = 2;
                if($columna3 == 5) $linea = 3;
                if($columna4 == 5) $linea = 4;
                if($columna5 == 5) $linea = 5;

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
                    'type' => 'Lineal',
                    'type_lineal' => 'Vertical',
                    'type_numero' => $linea,
                    'lugar' => $lugar
                ]);

               // $this->actualizarCartonesGanadores();
            }
        }
    }

  

    public function verifi_carton_lleno($carton){

        $fichas_sorteo = SorteoFicha::where('sorteo_id',$this->sorteo->id)
            ->select(['numero'])
            ->get();

        $fichas_carton = Carton::find($carton);

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
                    'type' => 'Cartón lleno',
                    'lugar' => $lugar
                ]);

                //$this->actualizarCartonesGanadores();
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

    

    public function nombre($nombre){

        return substr($nombre, 0, 20).''.'...';

    }


    public function ganador_fin(){

        if($this->sorteo){

            $carton_sorteo_activo = CartonSorteo::where('user_id', $this->user->id)
                ->where(function($query) {
                    $query->where('status_pago', 'Pago recibido')
                        ->orWhere('status_pago', 'Premio');
                })
                ->where('sorteo_id',$this->sorteo->id)
                ->exists();

            $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                ->where('status_carton','No disponible')
                ->where('status_pago', 'Pago recibido')
                ->toBase()
                ->count();
        }
        else{

            $this->sorteo = Sorteo::where('status','Finalizado')
                ->latest('updated_at') // Ordenar por fecha de finalización
                ->first();

            $carton_sorteo_activo = CartonSorteo::where('user_id', $this->user->id)
                ->where(function($query) {
                    $query->where('status_pago', 'Pago recibido')
                        ->orWhere('status_pago', 'Premio');
                })
                ->where('sorteo_id',$this->sorteo->id)
                ->exists();

            $this->cant_cartones = CartonSorteo::where('sorteo_id',$this->sorteo->id)
                ->where('status_carton','No disponible')
                ->where('status_pago', 'Pago recibido')
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

                                if($this->sorteo->type_sorteo == 'Pago'){
                    
                                
                                    notyf()
                                        ->duration(0)
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Felicidades ha ganado el tercer lugar en el sorteo Nro '. $this->sorteo->id );
                                }else{

                                    notyf()
                                        ->duration(0)
                                        ->position('x', 'center')
                                        ->position('y', 'center')
                                        ->dismissible(true)
                                        ->addInfo('Felicidades ha ganado en nuestro sorteo gratis Nro '. $this->sorteo->id );

                                }
                                                

                                Notification_Sorteo::create([
                                    'user_id' => $this->user->id,
                                    'sorteo_id' => $this->sorteo->id,
                                    'nro' => '1'
                                ]);
                            }

                            $this->actualizarMisCartones();
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

                                    if($this->sorteo->type_sorteo == 'Pago'){
                                        
                                        notyf()
                                            ->duration(0) // 2 seconds
                                            ->position('x', 'center')
                                            ->position('y', 'center')
                                            ->dismissible(true)
                                            ->addInfo('Ya hay un ganador en el 3er lugar, y su(s) carton(es) NO se encuentra entre los ganadores, tienes oportunidad para el premio del 2do lugar, continuemos ' );

                                    }else{

                                        notyf()
                                            ->duration(0) // 2 seconds
                                            ->position('x', 'center')
                                            ->position('y', 'center')
                                            ->dismissible(true)
                                            ->addInfo('Ya hay un ganador en nuestro sorteo gratis. Puede consultar los cartones ganadores y fichas sorteadas en la cabecera de la página '. '<img class="	far fa-hand-point-up" src="" alt="">' );

                                            if($this->sorteo_finalizado == 1){
                                                $this->emit('finalizar');
                                            }
                                    }
                                }
                            }
                        }

                        $this->ganador_1 = 1;

                        $this->actualizarCartonesGanadores();

                        

                        $this->i = 2;

                        
                        //SorteoFicha::where('sorteo_id', $this->sorteo->id)->delete();

                        $this->fichas = [];
                    }
        
                    elseif($this->ganador_1 == 1 && $this->ganador_2 == 0){

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

                            $this->actualizarMisCartones();
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
                        $this->fichas = [];
                        $this->actualizarCartonesGanadores();

                        $this->i = 1;
                    }
        
                    elseif($this->ganador_1 == 1 && $this->ganador_2 == 1 && $this->ganador_3 == 0){

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

                            $this->actualizarMisCartones();
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

                        $this->actualizarCartonesGanadores();


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

    public function premio($carton,$sorteo){

        return CartonGanador::where('sorteo_id', $sorteo)
       ->where('carton_id', $carton)
       ->value('premio'); // Devuelve directamente el valor del campo

    }


    
    public function render()
    {

        return view('livewire.jugar-sorteo',[
            'fichas' => $this->fichas,
            'ficha_ultima' => $this->ficha_ultima,
            'cartones_ganadores' => $this->cartones_ganadores,
            'mis_cartones' => $this->mis_cartones
        ]);
    }
}
