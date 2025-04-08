<?php

namespace App\Http\Controllers;

use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class JugarController extends Controller
{



    public function jugar(){

        $sorteo = Sorteo::where('status','Iniciado')->first();

        if($sorteo){

            $cartones = CartonSorteo::whereHas('sorteo',function(Builder $query) use ($sorteo){
                $query->where('id',$sorteo->id);
            })
            ->where('user_id', auth()->user()->id)
            ->where('status_pago', 'Pago recibido')
            ->where('status_juego', 'Sin estado')
            ->count(); 

            if($cartones >= 1 || auth()->user()->id == 1){

                return view('jugar.index',compact('sorteo'));

            }

            else{
                return view('jugar.index_no_inicia');
                
            }
        }
        else{

            return view('jugar.index_no_inicia');

        }
    }

    public function resultados(){

        return view('jugar.resultados');
    }
}
