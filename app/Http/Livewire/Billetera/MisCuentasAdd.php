<?php

namespace App\Http\Livewire\Billetera;

use App\Models\CuentasUser;
use Livewire\Component;

class MisCuentasAdd extends Component
{

    public $tipo,$metodo, $banco, $cedula, $telefono, $correo_codigo,$cuenta;

    protected $listeners = ['render'];

    protected $rules_binance = [
        'correo_codigo' => 'required',

    ];

    public function mount(){
        if($this->tipo == 'editar'){

            $cuenta_editar = CuentasUser::where('id',$this->cuenta)->first();

            $this->metodo = $cuenta_editar->metodo_pago;
            $this->banco = $cuenta_editar->banco;
            $this->cedula = $cuenta_editar->cedula;
            $this->telefono = $cuenta_editar->telefono;
            $this->correo_codigo = $cuenta_editar->correo_id;

        }
    }

    protected $rules_pago_movil = [
        'banco' => 'required',
        'cedula' => 'required',
        'telefono' => 'required',
    ];

    public $open = false;

    public function close(){

        $this->open = false;

    }

  /*  public function mount(){
        $this->tipo = $tipo;
        $this->cuenta = $cuenta;
    }*/

    public function render()
    {

        
        return view('livewire.billetera.mis-cuentas-add');
    }

    public function procesar(){

        if($this->metodo == 'PAGO MOVIL'){

            $rules = $this->rules_pago_movil;
            $this->validate($rules);
        }
        else{

            $rules = $this->rules_binance;
            $this->validate($rules);
        }

        if($this->tipo == 'agregar' || $this->tipo == 'agregar_carrito' ){

            if($this->metodo == 'PAGO MOVIL'){

                CuentasUser::create([
                    'user_id' => auth()->user()->id,
                    'metodo_pago' => 'PAGO MOVIL',
                    'banco' => $this->banco,
                    'cedula' => $this->cedula,
                    'telefono' => $this->telefono,
                    'identificativo' => $this->banco .' '. $this->telefono .' '. $this->cedula]);

                    $this->reset(['metodo','banco','cedula','telefono','open']);

            }
            else{

                CuentasUser::create([
                    'user_id' => auth()->user()->id,
                    'metodo_pago' => 'BINANCE(USDT)',
                    'correo_id' => $this->correo_codigo,
                    'identificativo' => $this->correo_codigo]);

                    $this->reset(['metodo','correo_codigo','open']);
            }

            if($this->tipo != 'agregar_carrito'){

                $this->emitTo('billetera.mis-cuentas-index','render');

                notyf()
                    ->duration(9000) // 2 seconds
                    ->addSuccess('Su solicitud ha sido procesada con éxito');
            }
            else{
                notyf()
                    ->duration(9000) // 2 seconds
                    ->addSuccess('Su cuenta ha sido registrada');

            }

            
           

        }else{


            $cuenta_modf = CuentasUser::where('id',$this->cuenta)->first();

            if($this->metodo == 'PAGO MOVIL'){

                $cuenta_modf->update([
                    'banco' => $this->banco,
                    'cedula' => $this->cedula,
                    'telefono' => $this->telefono,
                    'identificativo' => $this->banco .''. $this->telefono .''. $this->cedula
                ]);
            }
            else{

                $cuenta_modf->update([
                    'correo_id' => $this->correo_codigo,
                    'identificativo' => 'Binance'.' '.$this->correo_codigo,
                ]);

            }

            $this->reset(['open']);


            $this->emitTo('billetera.mis-cuentas-index','render');

            notyf()
                ->duration(9000) // 2 seconds
                ->addSuccess('Su solicitud ha sido procesada con éxito');
          

        }

    }
}
