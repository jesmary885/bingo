<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Carton;
use App\Models\CartonSorteo;
use App\Models\CuentasUser;
use App\Models\MetodoPago;
use App\Models\Pago;
use App\Models\PagoSorteo;
use App\Models\Sorteo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;

class ShoppingCart extends Component
{

    use WithFileUploads;

    protected $listeners = ['render'];
    public $subtotal,$telefono,$pendiente, $r_i_o, $t_w, $c_u,$opcion_retiro_inmediato = 0, $metodo_select = 0, $dolar_valor, $procesa = 0, $adjunta = 0, $constancia,$referencia;

    protected $rules = [
        'constancia' => 'required',
        'referencia' => 'required',
    ];

    protected $rules_telefono = [
        'telefono' => 'required',

    ];

    public $options = [
        'carton' => null,
        'sorteo' => null,
        'serial' => null,
    ];


    public function metodo($metodo_seleccionado){
        if($metodo_seleccionado == 'binance') $this->metodo_select = 1;
        elseif($metodo_seleccionado == 'pago_movil') $this->metodo_select = 2;
        else $this->metodo_select = 3;
        $this->adjunta = 1;

        $this->emit('scrollIntoView');
    }

    public function opcion_retiro($opcion_seleccionada){

        if($opcion_seleccionada == 'Si') $this->opcion_retiro_inmediato = 1;
        else $this->opcion_retiro_inmediato = 2;

        User::where('id',auth()->user()->id)->first()->update([
            'retiro_inmediato' => $opcion_seleccionada,
        ]);

        $this->emit('scrollIntoView');

    }

    public function delete($registro){

        $delete = Cart::where('id',$registro)->first();

        CartonSorteo::where('sorteo_id',  $delete->sorteo_id)
            ->where('carton_id',$delete->carton_id)
            ->first()
            ->update([
                'status_carton' => 'Disponible',
                'user_id' => null,
                'status_pago' => null
            ]);

        $delete->delete();

    
        $this->emitTo('dropdown-cart', 'render');
    }


    public function procesar(){

        $content = Cart::where('user_id',auth()->user()->id)
            ->where('status','no_pagado')
            ->get();

        $no_pasa = 0;

        foreach($content as $cont){

            $busqueda = Sorteo::where('id',$cont->sorteo_id)->first()->status;

            if($busqueda != 'Aperturado'){

                $no_pasa = 1;
                $sorteo = $cont->sorteo_id;
                
            }

        }

        if($no_pasa == 0){

            $retiro_inmediato_opcion = User::where('id',auth()->user()->id)
            ->first();

            if($retiro_inmediato_opcion->retiro_inmediato == null) $r_i_o = 0;
            else $r_i_o = 1;

            if( $r_i_o == 1){

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
                    elseif($this->metodo_select == 2) $metodo= 'Pago movil';
                    else $metodo= 'Saldo';

                    $registro_carro = Cart::where('user_id',auth()->user()->id)
                        ->where('status','no_pagado')
                        ->get();

                        $subtotal = Cart::where('user_id',auth()->user()->id)
                            ->where('status','no_pagado')
                            ->sum('precio');

                        $cantidad = Cart::where('user_id',auth()->user()->id)
                            ->where('status','no_pagado')
                            ->count();
            
                    if($this->metodo_select == 3){
            
                        $user = User::where('id',auth()->user()->id)->first();
            
                        $saldo_nuevo = $user->saldo - Cart::subtotal();
            
                        $user->update([
                            'saldo' =>  $saldo_nuevo,
                        ]);

            
                        foreach($registro_carro as $item){
            
                            CartonSorteo::where('sorteo_id', $item->sorteo_id)
                                ->where('carton_id',$item->carton_id)
                                ->first()
                                ->update([
                                    'status_carton' => 'No disponible',
                                    'status_pago' => 'Pago recibido',
                                    'user_id' => auth()->user()->id
                                ]);

                                $item->update([
                                    'status' => 'pagado'
                                ]);
                        }

            
                    }
                    else{
                        $pago_proc = Pago::create([
                            'user_id' => auth()->user()->id,
                            'metodo_pago' => $metodo,
                            'monto' => $subtotal,
                            'constancia' => $constancia,
                            'referencia' => $this->referencia,
                            'tipo' => 'Pago de carton',
                            'status' => 'Pendiente',
                            'cantidad' => $cantidad, 
                        ]);

                    
            
                        foreach($registro_carro as $item){
                            CartonSorteo::where('sorteo_id', $item->sorteo_id)
                                ->where('carton_id',$item->carton_id)
                                ->first()
                                ->update([
                                    'pago_id' => $pago_proc->id,
                                    'user_id' => auth()->user()->id
                            ]);

                            $item->update([
                                'status' => 'pagado',
                                'pago_id' => $pago_proc->id
                            ]);

                            PagoSorteo::create([
                                'sorteo_id' => $item->sorteo_id,
                                'pago_id' => $item->pago_id,
                                'status' => 'Pendiente',
                            ]);
                        }
            
                    }

                    
            
                    return redirect()->route('mis-cartones');
                }

                else{
                    notyf()
                    ->duration(9000) // 2 seconds
                    ->addError('Por favor, Registra tu cuenta para continuar');
                }

            }

            else{

                notyf()
                        ->duration(9000) // 2 seconds
                        ->addError('Por favor, selecciona SI O NO en la opción de retiro inmediato para continuar');

            }

        }

        else{

            notyf()
                ->duration(9000) // 2 seconds
                ->addError('¡No se pudo procesar su solicitud!, el sorteo Nro. '.$sorteo . ' ¡ya inició!, comunicate con un administrador');
        }

    }

   
    public function destroy(){

        /*

        foreach(Cart::content() as $item){

            CartonSorteo::where('sorteo_id', $item->options['sorteo'])
                ->where('carton_id',$item->options['carton'])
                ->first()
                ->update([
                    'status_carton' => 'Disponible'
                ]);
        }



        $this->emitTo('dropdown-cart', 'render');*/
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

        $content = Cart::where('user_id',auth()->user()->id)
            ->where('status','no_pagado')
            ->get();

        $this->subtotal = Cart::where('user_id',auth()->user()->id)
            ->where('status','no_pagado')
            ->sum('precio');


        $this->emit('scrollIntoView');

        return view('livewire.shopping-cart',compact('content'));
    }

    public function volver(){
        $this->emit('volver');
    }
}
