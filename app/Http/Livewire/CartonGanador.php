<?php

namespace App\Http\Livewire;

use App\Models\CartonGanador as ModelsCartonGanador;
use App\Models\User;
use Livewire\Component;

class CartonGanador extends Component
{

    public $open = false, $sorteo, $tipo;

    public function mount($sorteo){

        $this->sorteo = $sorteo;

    }

    public function close(){

        $this->open = false;

    }

    public function imagen($gg){

        $carton_s = ModelsCartonGanador::where('id',$gg)->first();
        $us = User::where('id',$carton_s->user_id)->first()->profile_photo_path;

        return $us;

    }

    public function render()
    {

        $ganadores_sorteo = ModelsCartonGanador::with('carton')
            ->where('sorteo_id',$this->sorteo)
            ->get();


        return view('livewire.carton-ganador',compact('ganadores_sorteo'));
    }
}
