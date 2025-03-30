<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ThrottlesLogins; // Agrega esta línea

use Illuminate\Session\SessionManager;

class LoginController extends Controller
{

    use ThrottlesLogins; // Agrega este trait

     // Número máximo de intentos de login
     protected $maxAttempts = 5;
     // Tiempo de bloqueo en minutos
     protected $decayMinutes = 15;

    public function index(){

      /*  if (Auth::check()) {
	
	        // Si está logado le mostramos la vista de logados
	        return route("home");
	    }

        return view('auth.login');*/

    // Redirección más eficiente para usuarios autenticados
         return Auth::check() ? redirect()->route('home') : view('auth.login');


    }

    public function login(Request $request,  SessionManager $sessionManager){

        $credentials =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Verificación de intentos con throttle
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }


        if (Auth::attempt($credentials)){

            $user = Auth::user();

            // Verificar si el usuario está activo
            if (!$user->is_active) {
                Auth::logout();
                return back()->with('mensaje', 'Tu cuenta está desactivada');
            }

         /*   $previous_session = Auth::User()->session_id;

            if ($previous_session) {
            
                Session::getHandler()->destroy($previous_session);
            }*/
    
          /*  $user = User::where('id',auth()->user()->id)->first();
    
            $user->session_id = Session::getId();
            $user->save();

            $sessionManager->flash('mensaje', '¡Bienvenido, mucha suerte en los sorteos de hoy!');

            return redirect(route("home"));*/

             // Manejo de sesión anterior más eficiente
             $this->clearPreviousSession($user);

             // Actualización más segura del session_id
             $user->update(['session_id' => Session::getId()]);
 
             $sessionManager->flash('mensaje', '¡Bienvenido, mucha suerte en los sorteos de hoy!');
 
             return redirect()->intended(route('home'));

        }

        // Registrar intento fallido
        $this->incrementLoginAttempts($request);

        return back()->with('mensaje', 'Email o contraseña incorrecta');


    }

    protected function clearPreviousSession(User $user)
    {
        if ($user->session_id && Session::getHandler()->read($user->session_id)) {
            Session::getHandler()->destroy($user->session_id);
        }
    }
}
