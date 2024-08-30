<?php

namespace App\Http\Livewire;

use App\Models\MetodoPago;
use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{


    protected $listeners = ['render'];

    public $metodo_select = 0, $dolar_valor;

    public function metodo($metodo_seleccionado){

        if($metodo_seleccionado == 'binance') $this->metodo_select = 1;
        else $this->metodo_select=2;

    }

    public function delete($rowID){
        Cart::remove($rowID);
        $this->emitTo('dropdown-cart', 'render');
    }

   

    public function destroy(){
        Cart::destroy();

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {

        $this->dolar_valor = MetodoPago::where('id','1')->first()->valor;
        return view('livewire.shopping-cart');
    }

    public function volver(){
        $this->emit('volver');
    }
}
