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

    protected $listeners = ['render' => 'render','echo:cambio_cs,CambioEstadoCartonSorteo' => 'render','refrescar_pag' => 'refrescar_pag'];

    //protected $listeners = ['render' => 'render','echo:cambio_cs,CambioEstadoCartonSorteo' => 'render'];

    public $sorteo, $status_carton='1', $tipo_cartones, $search, $ver_todos_act = 0, $cambiando = 0, $cant_cartones_disponibles, $cant_cartones_no_disponibles, $cant_cartones_reservados;

    protected $rules = [
        'search' => 'required',
    ];

    public $options = [
        'carton' => null,
        'sorteo' => null,
        'serial' => null,
    ];

    public function search_busqueda(){
        $this->ver_todos_act = 1;
    }

    public function ver_todos(){
        $this->ver_todos_act = 0;
    }

    public function refrescar_pag(){

       
        $total_cartones_disponibles = DB::select('SELECT COUNT(*) as cantidad from carton_sorteos cs
            where cs.sorteo_id = :sorteo_id AND cs.status_carton = "Disponible"',array('sorteo_id' => $this->sorteo));

        $total_cartones_no_disponibles = DB::select('SELECT COUNT(*) as cantidad from carton_sorteos cs
            where cs.sorteo_id = :sorteo_id AND cs.status_carton = "No disponible"',array('sorteo_id' => $this->sorteo));

        $total_cartones_reservados = DB::select('SELECT COUNT(*) as cantidad from carton_sorteos cs
            where cs.sorteo_id = :sorteo_id AND cs.status_carton = "Reservado"',array('sorteo_id' => $this->sorteo));

        $json = json_encode($total_cartones_disponibles);
        $cantidad = json_decode($json);
        $this->cant_cartones_disponibles = $cantidad[0]->cantidad;

        $json_2 = json_encode($total_cartones_no_disponibles);
        $cantidad_2 = json_decode($json_2);
        $this->cant_cartones_no_disponibles = $cantidad_2[0]->cantidad;

        $json_3 = json_encode($total_cartones_reservados);
        $cantidad_3 = json_decode($json_3);
        $this->cant_cartones_reservados= $cantidad_3[0]->cantidad;

        $this->emitTo('dropdown-cart', 'render');


         //$this->emit('refrescar');
    }

    public function color($serial_carton){
        $busqueda =  CartonSorteo::where('id', $serial_carton)->first()->status_carton;

        if($busqueda == 'Disponible') return 'bg-blue-500';
        elseif($busqueda == 'Reservado') return 'bg-yellow-500'; 
        else return 'bg-red-500';

    }

    public function add_cart($carton_comprar){


        $carton_sorteo_update = CartonSorteo::where('sorteo_id', $this->sorteo)
            ->where('carton_id',$carton_comprar)
            ->where('status_carton','Disponible')
            ->first();

        if($carton_sorteo_update){

            $precio = Sorteo::where('id',$this->sorteo)->first()->precio_carton_dolar;

            Cart::create([
                'carton_id' => $carton_comprar,
                'sorteo_id' => $this->sorteo,
                'user_id' => auth()->user()->id,
                'precio' => $precio,
                'status' => 'no_pagado'
            ]);

            $carton_sorteo_update->update([
                'status_carton' => 'Reservado',
                'status_pago' => 'En espera de pago',
                'user_id' => auth()->user()->id
            ]);


            $this->cambiando =1;

            $this->emitTo('dropdown-cart', 'render');


                notyf()
                    ->duration(5000) // 2 seconds
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

        

    }

    public function render()
    {

        $cart_count = Cart::where('user_id',auth()->user()->id)
            ->where('status','no_pagado')
            ->count();
        
        $total_cartones_disponibles = DB::select('SELECT COUNT(*) as cantidad from carton_sorteos cs
            where cs.sorteo_id = :sorteo_id AND cs.status_carton = "Disponible"',array('sorteo_id' => $this->sorteo));

        $total_cartones_no_disponibles = DB::select('SELECT COUNT(*) as cantidad from carton_sorteos cs
            where cs.sorteo_id = :sorteo_id AND cs.status_carton = "No disponible"',array('sorteo_id' => $this->sorteo));

        $total_cartones_reservados = DB::select('SELECT COUNT(*) as cantidad from carton_sorteos cs
            where cs.sorteo_id = :sorteo_id AND cs.status_carton = "Reservado"',array('sorteo_id' => $this->sorteo));

        $json = json_encode($total_cartones_disponibles);
        $cantidad = json_decode($json);
        $this->cant_cartones_disponibles = $cantidad[0]->cantidad;

        $json_2 = json_encode($total_cartones_no_disponibles);
        $cantidad_2 = json_decode($json_2);
        $this->cant_cartones_no_disponibles = $cantidad_2[0]->cantidad;

        $json_3 = json_encode($total_cartones_reservados);
        $cantidad_3 = json_decode($json_3);
        $this->cant_cartones_reservados= $cantidad_3[0]->cantidad;


        if($this->cambiando == 1) {
            $this->skipRender();
        } 

 
        if($this->ver_todos_act == 0){
            $cartones = CartonSorteo::where('sorteo_id', $this->sorteo)
                ->with('carton')
                ->get();
        }

        else{

            $rules = $this->rules;
            $this->validate($rules);

            $carton_select = Carton::where('id',$this->search)->first();

            if($carton_select){
                $cartones = CartonSorteo::where('sorteo_id', $this->sorteo)
                ->where('carton_id',$carton_select->id)
                ->with('carton')
                ->get();
            }

            else{
                $cartones = [];

                notyf()
                ->duration(9000) // 2 seconds
                ->addError('El número de cartón ingresado no existe');
            }

        }

        $this->cambiando = 0;


        return view('livewire.cartones',compact('cartones','cart_count'));
    }
}
