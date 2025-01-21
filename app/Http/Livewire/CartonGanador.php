<?php

namespace App\Http\Livewire;


use App\Models\SorteoFicha;
use App\Models\User;
use App\Models\Carton;
use App\Models\CartonGanador as ModelsCartonGanador;
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

    public function nombre($nombre){

        return substr($nombre, 0, 20).''.'...';

    }

    public function premio($carton){

        $ultimo_sorteo = ModelsCartonGanador::latest('id')->first();

        $premio = ModelsCartonGanador::where('sorteo_id',$ultimo_sorteo->sorteo_id )
            ->where('carton_id',$carton)
            ->first()->premio;

        return $premio;


    }

    public function posicion($item,$content,$carton){

        $carton = Carton::where('id',$carton)->first();

        if($content == 1) $content = 'content_1';
        elseif($content == 2) $content = 'content_2';
        elseif($content == 3) $content = 'content_3';
        elseif($content == 4) $content = 'content_4';
        else $content = 'content_5';

        if(json_decode($carton->$content,true)[0] == $item ) return '0';
        elseif(json_decode($carton->$content,true)[1] == $item ) return '1';
        elseif(json_decode($carton->$content,true)[2] == $item ) return '2';
        elseif(json_decode($carton->$content,true)[3] == $item ) return '3';
        elseif(json_decode($carton->$content,true)[4] == $item ) return '4';

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
