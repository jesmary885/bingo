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

        
        return view('livewire.add-cart-item');
    }
}
