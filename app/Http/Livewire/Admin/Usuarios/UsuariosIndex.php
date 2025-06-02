<?php

namespace App\Http\Livewire\Admin\Usuarios;

use App\Models\CartonSorteo;
use App\Models\Sorteo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

use function PHPUnit\Framework\isNull;

class UsuariosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function sorteos_jugados($user){

        $cont = 0;

        $sorteos = Sorteo::all();

        foreach($sorteos as $s){

            $carton_sorteo = CartonSorteo::where('sorteo_id',$s)
                ->where('user_id',$user)
                ->first();

            if($carton_sorteo) $cont++;

        }

        return $cont;

    }

    public function render()
    {
        $users = User::where('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(20);

        return view('livewire.admin.usuarios.usuarios-index',compact('users'));
    }

}
