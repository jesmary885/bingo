<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use GuzzleHttp\Client;

use App\Models\Sorteo;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    protected $client;

    

    public function index()
    {

        $sorteos = Sorteo::where('status','Aperturado')
            ->get();
            
        $dolar_hoy = MetodoPago::where('name', 'Pago Movil')
           ->value('valor');

        return view('home',compact('sorteos','dolar_hoy'));
 
     }

     public function cuentanos()
     {
   
         return view('cuentanos');
  
      }
}
