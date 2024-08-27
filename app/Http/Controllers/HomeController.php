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
 
        return view('home',compact('sorteos'));
 
     }
}
