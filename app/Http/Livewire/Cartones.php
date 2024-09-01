<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use App\Models\CartonSorteo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Cartones extends Component
{

    protected $listeners = ['render' => 'render'];

    public $sorteo, $status_carton='1', $tipo_cartones, $cartones, $search, $ver_todos_act = 0;

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

    public function color($serial_carton){
        $busqueda =  CartonSorteo::where('id', $serial_carton)->first()->status_carton;

        if($busqueda == 'disponible') return 'bg-blue-500';
        elseif($busqueda == 'reservado') return 'bg-yellow-500'; 
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
            'status_carton' => 'reservado',
            'status_pago' => 'en espera de pago',
            'user_id' => auth()->user()->id
        ]);


        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('cartones', 'render');

    }

    public function render()
    {

        if($this->ver_todos_act == 0){
            $this->cartones = CartonSorteo::where('sorteo_id', $this->sorteo)
                ->with('carton')
                ->get();
        }

        else{

            $rules = $this->rules;
            $this->validate($rules);

            $carton_select = Carton::where('serial',$this->search)->first();

            if($carton_select){
                $this->cartones = CartonSorteo::where('sorteo_id', $this->sorteo)
                ->where('carton_id',$carton_select->id)
                ->with('carton')
                ->get();
            }
        }

        return view('livewire.cartones');
    }
}
