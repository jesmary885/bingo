<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartones extends Controller
{
    public function index($sorteo){
        return view('cartones.index',compact('sorteo'));
    }
}
