<?php

namespace App\Http\Livewire\Admin\Referidos;

use App\Models\cartones_pendientes_referidos;
use App\Models\CartonSorteo;
use App\Models\Sorteo;
use App\Models\User;
use Livewire\Component;

class PremiarAdd extends Component
{

    public $isopen = false;

    protected $listeners = ['render'];

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public $user,$sorteos,$registro,$sorteo_id,$cartones = [],$carton_id = "";

    public function mount(){
        $this->sorteos = Sorteo::where('status','Aperturado')
        ->get();

        $registro = cartones_pendientes_referidos::where('id',$this->registro)->first();

        $this->user = User::where('id',$registro->user_id)->first();

       


    }

    public function updatedSorteoId($value)
    {

        $sorteo_select = Sorteo::find($value);

        $this->cartones = CartonSorteo::where('sorteo_id', $sorteo_select->id)
            ->where('status_carton','Disponible')
            ->get();

    }

    public function render()
    {

     

        return view('livewire.admin.referidos.premiar-add');
    }

    public function procesar(){


        cartones_pendientes_referidos::where('id',$this->registro)->first()
            ->update([
                'status' => 'Procesado'
        ]);


        $c = CartonSorteo::where('sorteo_id',$this->sorteo_id)
            ->where('carton_id',$this->carton_id)
            ->first();



        $c->update([
                'status_carton' => 'No disponible',
                'user_id' => $this->user->id,
                'status_pago' => 'Premio',
            ]);

        $this->emit('alert','Datos registrados correctamente');
        $this->emitTo('admin.referidos.premiar-index','render');
        $this->isopen = false;  

        





    }
}
