<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilleteraController extends Controller
{
    public function index(){

        return view('billetera.index');
    }
}
