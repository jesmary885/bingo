@component('mail::message')
# ¡Hola, {{ $user->name }}!

Has solicitado restablecer tu contraseña en **{{ config('app.name') }}**. Haz clic en el botón para continuar:

@component('mail::button', ['url' => $resetUrl])
Restablecer contraseña
@endcomponent

**¿No solicitaste esto?** Ignora este correo o contacta al soporte.

Gracias,  
El equipo de {{ config('app.name') }}
@endcomponent