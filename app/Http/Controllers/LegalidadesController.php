<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalidadesController extends Controller
{
    public function privacidad(){


        return view('legalidades.privacidad');

    }

    public function condiciones(){

        return view('legalidades.condiciones');

    }


}
