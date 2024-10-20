<?php

namespace App\Http\Livewire\Admin\Referidos;

use App\Models\cartones_pendientes_referidos;
use Livewire\Component;
use Livewire\WithPagination;

class PremiarIndex extends Component
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
        $usuarios = cartones_pendientes_referidos::where('status','Pendiente')
            ->paginate(15);

        return view('livewire.admin.referidos.premiar-index',compact('usuarios'));
    }
}
