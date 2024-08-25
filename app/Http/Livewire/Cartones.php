<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use Livewire\Component;

class Cartones extends Component
{
    public function render()
    {

        $cartones = Carton::all(); 
        return view('livewire.cartones',compact('cartones'));
    }
}
