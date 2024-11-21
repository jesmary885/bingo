<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\SessionManager;

class LoginController extends Controller
{
    public function index(){

        if (Auth::check()) {
	
	        // Si está logado le mostramos la vista de logados
	        return route("home");
	    }

        return view('auth.login');


    }

    public function login(Request $request,  SessionManager $sessionManager){

        $credentials =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){

            $sessionManager->flash('mensaje', '¡Bienvenido, mucha suerte en los sorteos de hoy!');

            return redirect(route("home"));

        }else{

            $sessionManager->flash('mensaje', 'Email o contraseña incorrecta');

            return view('auth.login');


        }


    }
}
