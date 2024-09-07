<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\Sorteo;
use Livewire\Component;

class IniciarSorteo extends Component
{


    public function sorteo_select($sorteo){

        return redirect()->route('admin.sorteo_jugar',$sorteo);

    }

    public function render()
    {

        $sorteos = Sorteo::where('status','Aperturado')->get();

        return view('livewire.admin.sorteo.iniciar-sorteo',compact('sorteos'));
    }
}
