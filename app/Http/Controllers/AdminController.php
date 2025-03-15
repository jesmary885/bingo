<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');

    }

    public function users(){

        return view('admin.users');
    }

    public function configuracion(){

        return view('admin.configuracion');
    }

    public function usuarios_referidos(){

        return view('admin.usuarios_referidos');
    }

    public function premiar(){

        return view('admin.premiar');
    }

    public function pagos(){

        return view('admin.pagos');
    }

    public function reporte_pagos_ganadores(){

        return view('admin.reporte_pago_ganadores');
    }

    public function sorteo_crear(){

        return view('admin.sorteos_crear');
    }

    public function sorteo_resultados(){

        return view('admin.sorteos_resultados');
    }

    public function sorteo_carton_user(){

        return view('admin.sorteos_carton_user');

    }


    public function iniciar_sorteo(){

        return view('admin.iniciar_sorteo');
    }

    public function sorteo_jugar($sorteo){

        return view('admin.sorteo_jugar',compact('sorteo'));
    }

    public function sorteo_carton(){

        return view('admin.sorteos_carton');
    }

}
