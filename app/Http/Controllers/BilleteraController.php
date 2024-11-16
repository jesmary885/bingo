<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilleteraController extends Controller
{
    public function index(){

        return view('billetera.index');
    }

    public function cuentas(){

        return view('billetera.mis_cuentas');
    }

    public function afiliados(){

        return view('afiliados.mis_afiliados');
    }
}
