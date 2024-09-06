<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JugarController extends Controller
{
    public function jugar(){

        return view('jugar.index');
    }
}
