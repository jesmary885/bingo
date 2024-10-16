<?php

namespace App\Http\Livewire;

use App\Models\CartonSorteo;
use App\Models\CuentasUser;
use App\Models\MetodoPago;
use App\Models\Pago;
use App\Models\User;
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
    public $telefono,$pendiente, $r_i_o, $t_w, $c_u,$opcion_retiro_inmediato = 0, $metodo_select = 0, $dolar_valor, $procesa = 0, $adjunta = 0, $constancia,$referencia;

    protected $rules = [
        'constancia' => 'required',

    ];

    protected $rules_telefono = [
        'telefono' => 'required',

    ];


    public function metodo($metodo_seleccionado){
        if($metodo_seleccionado == 'binance') $this->metodo_select = 1;
        elseif($metodo_seleccionado == 'pago_movil') $this->metodo_select = 2;
        else $this->metodo_select = 3;
        $this->adjunta = 1;
    }

    public function opcion_retiro($opcion_seleccionada){

        if($opcion_seleccionada == 'si') $this->opcion_retiro_inmediato = 1;
        else $this->opcion_retiro_inmediato = 2;

        User::where('id',auth()->user()->id)->first()->update([
            'retiro_inmediato' => $opcion_seleccionada,
        ]);

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

        

        if($this->t_w == 0){

            $rules_telefono = $this->rules_telefono;
            $this->validate($rules_telefono);

            User::where('id',auth()->user()->id)->first()->update([
                'telefono_whatsapp' => $this->telefono
            ]);



        }

        $retiro_i = User::where('id',auth()->user()->id)->first()->retiro_inmediato;

        $cuentas_usuario_l = CuentasUser::where('user_id',auth()->user()->id)
            ->get();
        
        if($cuentas_usuario_l->isEmpty() == false && $cuentas_usuario_l) $this->c_u = 1;

        if($this->c_u == 1){
            if($this->metodo_select != 3){
                $rules = $this->rules;
                $this->validate($rules);
    
                $constancia = Storage::put('transacciones', $this->constancia);
    
            }
    
            if($this->metodo_select == 1) $metodo= 'Binance';
            if($this->metodo_select == 2) $metodo= 'Pago movil';
            else $metodo= 'Saldo';
    
            if($this->metodo_select == 3){
    
                $user = User::where('id',auth()->user()->id)->first();
    
                $saldo_nuevo = $user->saldo - Cart::subtotal();
    
                $user->update([
                    'saldo' =>  $saldo_nuevo,
                ]);
    
                foreach(Cart::content() as $item){
    
                    CartonSorteo::where('sorteo_id', $item->options['sorteo'])
                        ->where('carton_id',$item->options['carton'])
                        ->first()
                        ->update([
                            'status_carton' => 'No disponible',
                            'status_pago' => 'Pago recibido',
                            'user_id' => auth()->user()->id
                        ]);
                }
    
            }
            else{
                $pago_proc = Pago::create([
                    'user_id' => auth()->user()->id,
                    'metodo_pago' => $metodo,
                    'monto' => Cart::subtotal(),
                    'constancia' => $constancia,
                    'referencia' => $this->referencia,
                    'tipo' => 'Pago de carton',
                    'status' => 'Pendiente',
                    'cantidad' => Cart::count(), 
                ]);
    
                foreach(Cart::content() as $item){
                    CartonSorteo::where('sorteo_id', $item->options['sorteo'])
                        ->where('carton_id',$item->options['carton'])
                        ->first()
                        ->update([
                            'pago_id' => $pago_proc->id,
                            'user_id' => auth()->user()->id
                    ]);
                }
    
            }
    
            Cart::destroy();
    
            return redirect()->route('mis-cartones');

        }

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

    public function mount(){

        $retiro_inmediato_opcion = User::where('id',auth()->user()->id)
            ->first();

        if($retiro_inmediato_opcion->retiro_inmediato == null) $this->r_i_o = 0;
        else $this->r_i_o = 1;

        if($retiro_inmediato_opcion->telefono_whatsapp == null) $this->t_w = 0;
        else $this->t_w = 1;

        $cuentas_usuario = CuentasUser::where('user_id',auth()->user()->id)
            ->get();

        if($cuentas_usuario->isEmpty() == false) $this->c_u = 1;
        else $this->c_u = 0;

        if($this->r_i_o == 0 || $this->t_w == 0 || $this->c_u == 0) $this->pendiente = 1;
        else $this->pendiente = 0;



    }

    public function render()
    {



        $this->dolar_valor = valor_dolar_hoy();
        return view('livewire.shopping-cart');
    }

    public function volver(){
        $this->emit('volver');
    }
}
