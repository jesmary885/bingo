<?php

namespace App\Http\Livewire;

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

        
        return view('livewire.dropdown-cart');
    }
}
