<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartones extends Controller
{
    public function index(){
        return view('cartones.index');
    }
}
