<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\CartonRepetido;
use App\Models\CartonSorteo;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use Livewire\WithPagination;

class UserSorteo extends Component
{

    protected $listeners = ['render' => 'render'];

    use WithPagination;

    public $sorteo_select;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete($sorteo){

        CartonRepetido::where('id',$sorteo)
            ->delete();

  /*  foreach($duplicados as $duplicado){
        $duplicado->delete();
    }*/
    }

    public function adjudicacion($sorteo){

        $carton_tipo = CartonSorteo::where('id',$sorteo)->first()->status_pago;

        if($carton_tipo == 'Pago recibido') return 'Carton vendido';
        elseif($carton_tipo == 'Premio') return 'Carton premiado';
        else return 'Carton disponible';

    }

    public function render()
    {

            $sorteos = CartonSorteo::whereHas('sorteo',function(Builder $query){
                $query->where('status','Aperturado');
            })
            ->paginate(25);

            $sorteos_d = CartonRepetido::all();


        return view('livewire.admin.sorteo.user-sorteo',compact('sorteos','sorteos_d'));
    }
}
