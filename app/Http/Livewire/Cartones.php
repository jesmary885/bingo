<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use App\Models\CartonSorteo;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Cartones extends Component
{

    protected $listeners = ['render' => 'render','echo:cambio_cs,CambioEstadoCartonSorteo' => 'refrescar_pag','refrescar_pag' => 'refrescar_pag'];

    public $sorteo, $status_carton='1', $tipo_cartones, $search, $ver_todos_act = 0, $cambiando = 0, $cant_cartones_disponibles, $cant_cartones_no_disponibles, $cant_cartones_reservados;

    protected $rules = [
        'search' => 'required',
    ];

    public $options = [
        'carton' => null,
        'sorteo' => null,
        'serial' => null,
    ];

    public function search_(){
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


         $this->emit('refrescar');
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
            ->first();

        $this->options['carton'] = $carton_comprar;
        $this->options['sorteo'] = $this->sorteo;
        $this->options['serial'] = Carton::where('id',$carton_comprar)
            ->first()
            ->serial;


        Cart::add([ 'id' => $carton_comprar, 
            'name' => 'name', 
            'qty' => '1', 
            'price' => '1', 
            'weight' => 550,
            'options' => $this->options
        ]);

        

        $carton_sorteo_update->update([
            'status_carton' => 'Reservado',
            'status_pago' => 'En espera de pago',
            'user_id' => auth()->user()->id
        ]);


        $this->emitTo('dropdown-cart', 'render');
        $this->cambiando =1;

    }

    public function render()
    {
        
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
                ->Paginate(20);
        }

        else{

            $rules = $this->rules;
            $this->validate($rules);

            $carton_select = Carton::where('id',$this->search)->first();

            if($carton_select){
                $cartones = CartonSorteo::where('sorteo_id', $this->sorteo)
                ->where('carton_id',$carton_select->id)
                ->with('carton')
                ->Paginate(20);
            }

            else{
                $cartones = [];

                notyf()
                ->duration(9000) // 2 seconds
                ->addError('El número de cartón ingresado no existe');
            }

        }


        return view('livewire.cartones',compact('cartones'));
    }
}
