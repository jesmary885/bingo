<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class MisCartones extends Component
{

    protected $listeners = ['render' => 'render'];

    public $sorteo, $status_carton='1', $tipo_cartones;


    public function color($serial_carton){

        $busqueda =  CartonSorteo::where('id', $serial_carton)->first()->status_pago;

        if($busqueda == 'pago recibido') return 'bg-blue-500';
        else return 'bg-yellow-500'; 
    

    }

    public function render()
    {

        $mis_cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('status','Aperturado');
            })
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('livewire.mis-cartones',compact('mis_cartones'));
    }
}