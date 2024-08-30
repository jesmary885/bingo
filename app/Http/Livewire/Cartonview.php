<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use Livewire\Component;

class Cartonview extends Component
{

    public $carton;

    public function render()
    {

        $carton_s = Carton::where('id',$this->carton)->first();

 

        return view('livewire.cartonview',compact('carton_s'));
    }
}
