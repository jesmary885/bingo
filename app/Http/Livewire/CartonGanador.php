<?php

namespace App\Http\Livewire;

use App\Models\CartonGanador as ModelsCartonGanador;
use App\Models\SorteoFicha;
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

    public function background($item){
        $ficha_nueva = SorteoFicha::where('sorteo_id',$this->sorteo)->get();


        foreach ($ficha_nueva as $ficha){

            if($ficha->numero == $item) {
                return 'bg-green-500';
            }

        }
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

            $dolar_hoy = valor_dolar_hoy();


        return view('livewire.carton-ganador',compact('ganadores_sorteo','dolar_hoy'));
    }
}
