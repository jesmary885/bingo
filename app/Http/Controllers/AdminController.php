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

    public function iniciar_sorteo(){

        return view('admin.iniciar_sorteo');
    }

    public function sorteo_jugar($sorteo){

        return view('admin.sorteo_jugar',compact('sorteo'));
    }

}
