<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;
use App\Models\MetodoPago;
use App\Models\Pago;
use Livewire\Component;
use Livewire\WithFileUploads;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;

class ShoppingCart extends Component
{

    use WithFileUploads;

    protected $listeners = ['render'];
    public $metodo_select = 0, $dolar_valor, $procesa = 0, $adjunta = 0, $constancia;

    protected $rules = [
        'constancia' => 'required',

    ];

    public function metodo($metodo_seleccionado){
        if($metodo_seleccionado == 'binance') $this->metodo_select = 1;
        else $this->metodo_select=2;
        $this->adjunta = 1;
    }

    public function delete($rowIDm,$sorteo,$carton){

        CartonSorteo::where('sorteo_id', $sorteo)
            ->where('carton_id',$carton)
            ->first()
            ->update([
                'status_carton' => 'Disponible'
            ]);

        Cart::remove($rowIDm);
        $this->emitTo('dropdown-cart', 'render');
    }


    public function procesar(){
         $rules = $this->rules;
        $this->validate($rules);


        $constancia = Storage::put('transacciones', $this->constancia);

        //dd($constancia);

        if($this->metodo_select == 1) $metodo= 'Binance';
        else $metodo= 'Pago movil';

        Pago::create([
            'user_id' => auth()->user()->id,
            'metodo_pago' => $metodo,
            'monto' => Cart::subtotal(),
            'constancia' => $constancia,
            'status' => 'Pendiente',
            'cantidad' => Cart::count(), 
        ]);

        Cart::destroy();

        return redirect()->route('mis-cartones');

    }

   

    public function destroy(){

        foreach(Cart::content() as $item){

            CartonSorteo::where('sorteo_id', $item->options['sorteo'])
                ->where('carton_id',$item->options['carton'])
                ->first()
                ->update([
                    'status_carton' => 'Disponible'
                ]);
        }

        Cart::destroy();

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {

        $this->dolar_valor = MetodoPago::where('id','1')->first()->valor;
        return view('livewire.shopping-cart');
    }

    public function volver(){
        $this->emit('volver');
    }
}
