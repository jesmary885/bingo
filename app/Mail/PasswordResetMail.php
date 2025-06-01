<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;  // ¡Esta línea es crucial!

class PasswordResetMail extends Mailable
{
      use Queueable, SerializesModels;

    public $user;
    public $resetUrl;

    public function __construct($user)
    {
        $this->user = $user;
        
        // Genera el token de reseteo usando el sistema de Laravel
        $token = Password::createToken($user);
        
        // Genera la URL correctamente
        $this->resetUrl = URL::route('password.reset', [
            'token' => $token,
            'email' => $user->email
        ]);
    }

    public function build()
    {
        return $this->markdown('emails.password_reset')
                   ->subject('Restablecer tu contraseña');
    }
}
