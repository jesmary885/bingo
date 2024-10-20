<?php

namespace App\Http\Livewire\Admin\Referidos;

use App\Models\referidos;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosReferidos extends Component
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

        $usuarios = referidos::paginate(15);

        return view('livewire.admin.referidos.usuarios-referidos',compact('usuarios'));
    }
}
