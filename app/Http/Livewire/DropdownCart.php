<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DropdownCart extends Component
{
    public $user;
    protected $listeners = ['render'];

    public function mount(){

        $this->user = auth()->user()->id;
    }
    
    public function render()
    {

        $cart_count = Cart::where('user_id',auth()->user()->id)
            ->where('status','no_pagado')
            ->count();

        $content_cart = Cart::where('user_id',auth()->user()->id)
            ->where('status','no_pagado')
            ->get();

        $subtotal = Cart::where('user_id',auth()->user()->id)
            ->where('status','no_pagado')
            ->sum('precio');
        
        return view('livewire.dropdown-cart',compact('cart_count','content_cart','subtotal'));
    }
}
