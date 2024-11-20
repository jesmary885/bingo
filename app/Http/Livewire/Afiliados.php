<?php

namespace App\Http\Livewire;

use App\Models\referidos;
use Livewire\Component;
use Livewire\WithPagination;

class Afiliados extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }


    public function render()
    {
        $afiliados = referidos::where('user_id',auth()->user()->id)
            ->where('compra','Si')
            ->paginate(15);

        return view('livewire.afiliados',compact('afiliados'));
    }

}
