<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\Cart;
use App\Models\CartonRepetido;
use App\Models\CartonSorteo;
use App\Models\PagoSorteo;
use App\Models\Sorteo;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class IniciarSorteo extends Component
{


    public function sorteo_select($sorteo){



        $sorteo_select = Sorteo::where('status','Iniciado')->first();


        if($sorteo_select){

            if($sorteo != $sorteo_select->id){
                notyf()
                    ->duration(0)
                    ->position('x', 'center')
                    ->position('y', 'center')
                    ->dismissible(true)
                    ->addError('El Sorteo Nro '.  $sorteo_select->id. ' esta en proceso, debes finanlizarlo para poder inciar otro sorteo');

            }
            else return redirect()->route('admin.sorteo_jugar',$sorteo);

        }

        else{

            $usuario_pendiente = PagoSorteo::where('sorteo_id',$sorteo)
            ->where('status','Pendiente')
            ->first();

            if($usuario_pendiente){

                notyf()
                    ->duration(0)
                    ->position('x', 'center')
                    ->position('y', 'center')
                    ->dismissible(true)
                    ->addError('Aún tiene un pago pendiente por verificar');

            }
            else{

                Sorteo::where('id',$sorteo)->first()
                ->update([
                'status'=>'Iniciado'
                ]);

                return redirect()->route('admin.sorteo_jugar',$sorteo);
                
            }


            

        }

    }

    public function cartones_vendidos($sorteo){

        return CartonSorteo::where('sorteo_id',$sorteo)
            ->where('status_carton','No disponible')
            ->count();

    }

    public function cartones_no_vendidos($sorteo){

        return CartonSorteo::where('sorteo_id',$sorteo)
            ->where('status_carton','Disponible')
            ->count();

    }

    public function verificar(){

        $report = 0;

        $busqueda_sorteo = Sorteo::where('status','Aperturado')->get();

        foreach($busqueda_sorteo as $sorteo){

            $busqueda_cart = Cart::where('sorteo_id',$sorteo->id)->get();

            foreach($busqueda_cart as $cart){
                $busqueda_cart_carton = Cart::where('carton_id',$cart->carton_id)
                    ->where('sorteo_id',$cart->sorteo_id)
                    ->count();

                if($busqueda_cart_carton > 1){

                    $report ++;

                    CartonRepetido::create([
                        'sorteo_id' => $sorteo->id,
                        'carton_id' => $cart->carton_id,
                        'user_id' => $cart->user_id,
                    ]);
                }
            }

        }

        if($report >= 1){

            notyf()
            ->position('x', 'center')
            ->position('y', 'center')
            ->dismissible(true)
            ->addError('Hay cartones con usuarios duplicados');
        }else{

            notyf()
            ->position('x', 'center')
            ->position('y', 'center')
            ->dismissible(true)
            ->addInfo('NO hay cartones duplicados');
        }
  
    }

    public function render()
    {

        $sorteos = Sorteo::where('status','!=','Finalizado')->get();


        
        return view('livewire.admin.sorteo.iniciar-sorteo',compact('sorteos'));
    }
}
