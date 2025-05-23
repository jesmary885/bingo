<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Carton;
use App\Models\CartonSorteo;
use App\Models\Sorteo;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Cartones extends Component
{

    protected $listeners = ['render' => 'render',
    'echo:cambio_cs,.cambio.carton' => 'render',
    'refrescar_pag' => 'refrescar_pag'];

    public $user, $sorteo, $cartones = [], $status_carton='1', $tipo_cartones, $search, $ver_todos_act = 0, $cambiando = 0, $cant_cartones_disponibles, $cant_cartones_no_disponibles, $cant_cartones_reservados;

    public $disponiblesIndexados = []; // [carton_id => key] solo los disponibles

    protected $rules = [
        'search' => 'required',
    ];

    public $options = [
        'carton' => null,
        'sorteo' => null,
        'serial' => null,
    ];

    public function mount(){

        $this->cartones = [];

        $this->user = auth()->user()->id;
        $this->loadInitialData();
    }

    public function verCartones(){

        $safeJsonDecode = function($data) {
            if (is_array($data)) {
                return $data; // Ya es array, no necesita decodificación
            }
            return json_decode($data, true) ?? []; // Decodifica o retorna array vacío si falla
        };


            $cartonesSorteo = CartonSorteo::with(['carton' => function($query) {
                $query->select('id', 'content_1', 'content_2', 'content_3', 'content_4', 'content_5');
            }])
            ->where('sorteo_id', $this->sorteo)
            ->get();
    
       
         // Cargar cartones del usuario
            $this->cartones = $cartonesSorteo->map(function($cartonSorteo) use ($safeJsonDecode) {
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
                    'status_juego' => $cartonSorteo->status_juego,
                    'status_carton' => $cartonSorteo->status_carton 
                ];
            })->toArray();

        foreach ($cartonesSorteo as $carton) {
            
            if ($carton['status_carton'] === 'Disponible') {
                $this->disponiblesIndexados[$carton['carton_id']] = true;
            }
        }

    }



    protected function loadInitialData(){
        
        $this->verCartones();
        $this->updateCounts();
    }

    // Actualiza los contadores
    protected function updateCounts()
    {
        $counts = [
            'Disponible' => 0,
            'No disponible' => 0,
            'Reservado' => 0
        ];

        foreach ($this->cartones as $carton) {
            $counts[$carton['status_carton']]++;
        }

        $this->cant_cartones_disponibles = $counts['Disponible'];
        $this->cant_cartones_no_disponibles = $counts['No disponible'];
        $this->cant_cartones_reservados = $counts['Reservado'];
    }



    public function search_busqueda(){
        $this->ver_todos_act = 1;
    }

    public function ver_todos(){
        $this->ver_todos_act = 0;
    }

    /*public function refrescar_pag(){


        $conteos = CartonSorteo::where('sorteo_id', $this->sorteo)
            ->select('status_carton', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('status_carton')
            ->pluck('cantidad', 'status_carton');

        $this->cant_cartones_disponibles = $conteos->get('Disponible', 0);
        $this->cant_cartones_no_disponibles = $conteos->get('No disponible', 0);
        $this->cant_cartones_reservados = $conteos->get('Reservado', 0);

        $this->emitTo('dropdown-cart', 'render');

    }*/

    public function color($serial_carton){


        $status = CartonSorteo::where('id', $serial_carton)
        ->value('status_carton') ?? 'No disponible'; 

        return match($status) {
            'Disponible' => 'bg-blue-500',
            'Reservado'  => 'bg-yellow-500',
            'No disponible'     => 'bg-red-500'
        };

    }

    public function add_cart($carton_comprar){

         // 1. Verificación RÁPIDA en memoria (filtro inicial)
        if (!isset($this->disponiblesIndexados[$carton_comprar])) {
            notyf()->addError('Cartón no disponible');
            return;
        }

        DB::transaction(function () use ($carton_comprar) {

            $carton = CartonSorteo::where('sorteo_id', $this->sorteo)
                ->where('carton_id', $carton_comprar)
                ->where('status_carton', 'Disponible')
                ->lockForUpdate() // ⚠️ Bloquea la fila
                ->first();
    
            if (!$carton) {
                notyf()->addError('El cartón fue reservado por otro usuario');
                return;
            }

            
            $precio = Sorteo::where('id',$this->sorteo)->value('precio_carton_dolar');

            Cart::create([
                'carton_id' => $carton_comprar,
                'sorteo_id' => $this->sorteo,
                'user_id' => $this->user,
                'precio' => $precio,
                'status' => 'no_pagado'
            ]);

            $carton->update([
                'status_carton' => 'Reservado',
                'status_pago' => 'En espera de pago',
                'user_id' => $this->user
            ]);

            $this->cambiando =1;

            unset($this->disponiblesIndexados[$carton_comprar]);
            $this->cartones[$carton_comprar]['status_carton'] = 'Reservado';
        });

        notyf()
            ->duration(2000) // 2 seconds
            ->position('x', 'center')
            ->position('y', 'center')
            ->dismissible(true)
            ->addSuccess('Haz clic en el carro de compra para pagar tu(s carton(es))');

    }

    /*public function add_cart($carton_comprar){


        $carton_sorteo_update = CartonSorteo::where('sorteo_id', $this->sorteo)
            ->where('carton_id',$carton_comprar)
            ->where('status_carton','Disponible')
            ->lockForUpdate() // Bloquea la fila
            ->first();

        if($carton_sorteo_update){

            

            Cart::create([
                'carton_id' => $carton_comprar,
                'sorteo_id' => $this->sorteo,
                'user_id' => $this->user,
                'precio' => $precio,
                'status' => 'no_pagado'
            ]);

            $carton_sorteo_update->update([
                'status_carton' => 'Reservado',
                'status_pago' => 'En espera de pago',
                'user_id' => $this->user
            ]);


            $this->cambiando =1;

            $this->emitTo('dropdown-cart', 'render');


                notyf()
                    ->duration(2000) // 2 seconds
                    >position('x', 'center')
                    ->position('y', 'center')
                    ->dismissible(true)
                    ->addSuccess('Haz clic en el carro de compra para pagar tu(s carton(es))');

        }
        else{

           notyf()
            ->duration(0)
            ->position('x', 'center')
            ->position('y', 'center')
            ->dismissible(true)
            ->addError('El cartón seleccionado acaba de ser reservado por otro usuario');
        }

        

    }*/



    public function render()
    {

        /*$cart_count = Cart::where('user_id',auth()->user()->id)
            ->where('status','no_pagado')
            ->count();*/

        $cart_count=  Cart::where('user_id',$this->user)
            ->where('status','no_pagado')
            ->toBase()
            ->count();
   

        if($this->cambiando == 1) {
            $this->skipRender();
        } 

        if($this->ver_todos_act == 0){
            $this->verCartones();
        }

        else{

            $rules = $this->rules;
            $this->validate($rules);

            $carton_select =  Carton::find($this->search) ;

            if($carton_select){

                $this->cartones = CartonSorteo::where('sorteo_id', $this->sorteo)
                    ->with('carton')
                    ->where('carton_id',$this->search)
                    ->get()
                    ->toArray();
            }

            else{
                $this->cartones = [];

                notyf()
                ->duration(9000) // 2 seconds
                ->addError('El número de cartón ingresado no existe');
            }

        }

        $this->cambiando = 0;


        return view('livewire.cartones',compact('cart_count'));


        



    }
}
