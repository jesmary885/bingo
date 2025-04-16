<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalidadesController extends Controller
{


    public function condiciones_sin_log(){



        return view('legalidades.condiciones');

    }

    public function condiciones_log(){



        return view('legalidades.condiciones_log');

    }



}
