<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\CartonSorteo as ModelsCartonSorteo;
use Illuminate\Database\Eloquent\Builder;

use Livewire\Component;

class CartonSorteo extends Component
{

    protected $listeners = ['render' => 'render','echo:new_pago,NewPago' => 'render'];
    
    public function render()
    {

        $sorteos = ModelsCartonSorteo::whereHas('sorteo',function(Builder $query){
            $query->where('status','Aperturado');
        })
        ->where('status_carton','Reservado')
        ->where('pago_id',null)
        ->paginate(25);

     
        return view('livewire..admin.sorteo.carton-sorteo',compact('sorteos'));
    }
}
