<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItem extends Component
{

    public $carton;
    
    public function render()
    {


        Cart::add([ 'id' => $this->carton, 
        'name' => 'carton', 
        'qty' => '1', 
        'price' => '1', 
        'weight' => 550,
    ]);

   

        $this->emitTo('dropdown-cart', 'render');

        
        return view('livewire.add-cart-item');
    }
}
