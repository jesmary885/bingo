<?php

namespace App\Http\Controllers;

use App\Models\Sorteo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        $sorteos = Sorteo::where('status','Aperturado')
            ->get();

        $dolar_hoy = valor_dolar_hoy();
 
        return view('home',compact('sorteos','dolar_hoy'));
 
     }
}
