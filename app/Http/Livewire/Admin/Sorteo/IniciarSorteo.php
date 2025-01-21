<?php

namespace App\Http\Livewire\Admin\Sorteo;

use App\Models\Sorteo;
use Livewire\Component;

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


            Sorteo::where('id',$sorteo)->first()
                ->update([
                'status'=>'Iniciado'
            ]);

            return redirect()->route('admin.sorteo_jugar',$sorteo);

        }

    }

    public function render()
    {

        $sorteos = Sorteo::where('status','!=','Finalizado')->get();


        
        return view('livewire.admin.sorteo.iniciar-sorteo',compact('sorteos'));
    }
}
