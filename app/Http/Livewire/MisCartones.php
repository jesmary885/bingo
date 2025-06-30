<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class MisCartones extends Component
{


    protected $listeners = [
        'render' => 'render',
        'echo:cambio_cs,.cambio.carton' => 'render',
    ];

    public $sorteo, $status_carton='1', $tipo_cartones;


    public function color($serial_carton){



        $busqueda =  CartonSorteo::where('id', $serial_carton)->first()->status_pago;

        if($busqueda == 'Pago recibido') return 'bg-blue-500';
        elseif($busqueda == 'Premio') return 'bg-blue-500';
        else return 'bg-yellow-500'; 
    

    }

    public function render()
    {

        $mis_cartones = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('status','!=','Finalizado');
            })
            ->where('user_id', auth()->user()->id)
            ->get();


        return view('livewire.mis-cartones',compact('mis_cartones'));
    }
}
