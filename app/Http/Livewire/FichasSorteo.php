<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;
use App\Models\SorteoFicha;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class FichasSorteo extends Component
{
    public $open = false, $sorteo, $tipo, $cont;

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
                $this->cont++;
                return 'bg-green-500 animate-pulse animate-fade-right  ';
            }

        }
    }

    
    public function render()
    {

        $fichas = SorteoFicha::where('sorteo_id',$this->sorteo)
            ->get();

        $mis_cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('id',$this->sorteo);
            })
            ->where('user_id', auth()->user()->id)
            ->where('status_pago', 'Pago recibido')
            ->get(); 


        return view('livewire.fichas-sorteo',compact('fichas','mis_cartones'));
    }
}
