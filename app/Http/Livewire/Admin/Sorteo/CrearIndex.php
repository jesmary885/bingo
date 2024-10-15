<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Livewire\Component;
use Livewire\WithPagination;

class CrearIndex extends Component
{

    protected $listeners = ['render' => 'render'];

    use WithPagination;

    public $sorteo_select;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $sorteos = Sorteo::latest('id')
            ->paginate(20);

        return view('livewire.admin.sorteo.crear-index',compact('sorteos'));
    }

    public function Eliminar($sorteo){

        $this->sorteo_select = $sorteo;

        $this->emit('confirm', '¿Esta seguro de eliminar el sorteo?, confirme','admin.sorteo.crear-index','confirm_eliminar','Sorteo eliminado');

    }

    public function cant_premios($sorteo){

        $sorte_2= Sorteo::where('id',$sorteo)->first()->type_2;
        $sorte_3= Sorteo::where('id',$sorteo)->first()->type_3;

        if($sorte_3 == null && $sorte_2 == null) return 'Un premio';
        if($sorte_3 == null && $sorte_2 != null) return 'Dos premios';
        if($sorte_3 != null && $sorte_2 != null)  return 'Tres premios';
    }

    public function confirm_eliminar(){

        Sorteo::where('id',$this->sorteo_select)->first()->delete();

        $sorteos_ganador = CartonSorteo::where('sorteo_id',$this->sorteo_select)
            ->get();

        foreach($sorteos_ganador as $sorteo_g){
            CartonSorteo::where('id',$sorteo_g->id)->first()->delete();
        }

    }
}
