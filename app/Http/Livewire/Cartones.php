<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use App\Models\CartonSorteo;
use Livewire\Component;

class Cartones extends Component
{

    public $sorteo, $tipo_cartones='DISPONIBLES';

    



    public function color($carton){
        $busqueda = CartonSorteo::where('sorteo_id',$this->sorteo)
            ->where('carton_id',$carton)
            ->first()
            ->status;

        if($busqueda == 'disponible') return 'green';
        elseif($busqueda == 'no disponible') return 'red';
        else return 'blue';
    }

    public function type($tipo){

        if($tipo == 'disponibles') $this->tipo_cartones='DISPONIBLES';
        if($tipo == 'reservados') $this->tipo_cartones='RESERVADOS';
        if($tipo == 'no_disponibles') $this->tipo_cartones='NO DISPONIBLES';

        $this->resetPage();
    }

    public function render()
    {

        if($this->tipo_cartones=='DISPONIBLES'){
            
        }

        $cartones = Carton::all(); 
        return view('livewire.cartones',compact('cartones'));
    }
}
