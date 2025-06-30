<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\Cart;
use App\Models\Carton;
use App\Models\CartonRepetido;
use App\Models\CartonSorteo;
use App\Models\Modificaciones;
use App\Models\Sorteo;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class UserSorteoCreate extends Component
{
    
    public $isopen = false;

    public $usuarios, $user_id, $carton_id, $sorteos, $sorteo_id, $comentario, $sorteo,$motivo;

    protected $rules = [
        'user_id' => 'required',
        'comentario' => 'required',
        'motivo' => 'required',

    ];

    public function mount($sorteo,$carton){

        $this->usuarios = User::all();

        $this->sorteo_id = Sorteo::where('id',$sorteo)->first()->id;

        $this->carton_id = Carton::where('id',$carton)->first()->id;


    }

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }


    public function render()
    {
        return view('livewire.admin.sorteo.user-sorteo-create');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        $carts = Cart::where('sorteo_id',$this->sorteo_id)
            ->where('user_id',$this->user_id)
            ->get();

        foreach($carts as $cart){

            $cartones_sorteo = CartonSorteo::where('sorteo_id',$this->sorteo_id)
                ->where('user_id',$this->user_id)
                ->where('carton_id',$cart->carton_id)
                ->first();

            if(!$cartones_sorteo){
                $cart->delete();
            }

        }

        if($this->motivo == 'pago') $motivo = 'Pago recibido';
        else $motivo = 'Premio';

        
        CartonSorteo::where('sorteo_id',$this->sorteo_id)
            ->where('carton_id',$this->carton_id)
            ->update([
                'sorteo_id' => $this->sorteo_id,
                'user_id' => $this->user_id,
                'carton_id' => $this->carton_id,
                'status_carton' => 'No disponible',
                'status_juego' => 'Sin estado',
                'status_pago' => $motivo
            ]);

        Modificaciones::create([
            'user_id'=> auth()->user()->id,
            'modificacion' => $this->comentario
        ]);


        $cart_user = Cart::where('sorteo_id',$this->sorteo_id)
        ->where('user_id',$this->user_id)
        ->where('carton_id',$this->carton_id)
        ->first();

        if(!$cart_user){
            Cart::create([
                'sorteo_id' => $this->sorteo_id,
                'user_id' => $this->user_id,
                'carton_id' => $this->carton_id,
                'precio' => '1',
                'status' => 'pagado',
             ]);
        }

        $this->emit('alert','Datos registrados correctamente');
        $this->emitTo('admin.sorteo.user-sorteo','render');
        $this->isopen = false;  


    }
}
