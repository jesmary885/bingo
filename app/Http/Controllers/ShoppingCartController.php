<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index(){
        return view('carrito.index');
    }

    public function cartones(){
        return view('carrito.cartones');
    }
}
