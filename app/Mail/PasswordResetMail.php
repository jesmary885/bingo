<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
     use Queueable, SerializesModels;

    public $user;  // Datos del usuario
    public $resetUrl;  // URL para restablecer contraseña

    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->resetUrl = URL::temporarySignedRoute(
            'password.reset',
            now()->addMinutes(30),  // Enlace válido por 30 minutos
            ['token' => $user->password_reset_token]  // Ajusta según tu lógica
        );
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Restablece tu contraseña en ' . config('app.name'))
                   ->markdown('emails.password_reset');  // Usa markdown para diseño responsive
    }
}
