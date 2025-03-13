<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\Cart;
use App\Models\Carton;
use App\Models\CartonSorteo;
use App\Models\Sorteo;
use App\Models\User;
use Livewire\Component;

class UserSorteoCreate extends Component
{
    
    public $isopen = false;

    public $usuarios, $user_id, $cartones, $carton_id, $sorteos, $sorteo_id, $comentario, $sorteo;

    protected $rules = [
        'carton_id' => 'required',
        'user_id' => 'required',
    ];

    public function mount($sorteo){

        $this->usuarios = User::all();

        $this->sorteos = Sorteo::where('status','Aperturado')
            ->get();

        $this->cartones = [];

        $this->sorteo = CartonSorteo::where('id',$sorteo)->first();


    }

    public function updatedSoteoId($value)
    {
        $cartones_select = CartonSorteo::find($value);
        $this->cartones = $cartones_select->carton;
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

        CartonSorteo::create([
            'sorteo_id' => $this->sorteo_id,
            'user_id' => $this->user_id,
            'carton_id' => $this->carton_id,
            'status_carton' => 'No disponible',
            'status_juego' => 'Sin estado',
            'status_pago' => 'Pago recibido'
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


    }
}
