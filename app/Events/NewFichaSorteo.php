<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow; // Cambio clave
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;

class NewFichaSorteo implements ShouldBroadcastNow // Implementa ShouldBroadcastNow
{
    use SerializesModels,Queueable;

    public $ficha;
    public $sorteoId;

    public function __construct($ficha)
    {
       

        // Asegurar que tenemos el sorteo_id disponible
       /* $this->sorteoId = is_array($ficha) ? $ficha['sorteo_id'] : 
        (is_object($ficha) ? $ficha->sorteo_id : null);*/

        
        $this->ficha = $ficha;
        $this->sorteoId = $ficha['sorteo_id'] ?? $ficha->sorteo_id; // Más limpio
    }

    public function broadcastOn()
    {
        return [
            new Channel('sorteo_fichas'), // Canal general
            new Channel('sorteo.'.$this->sorteoId) // Canal específico por sorteo
        ];

       // return new Channel('sorteo.'.$this->ficha->sorteo_id); // Canal específico

    }

    public function broadcastWith()
    {
        return [
            'id' => $this->ficha['id'] ?? $this->ficha->id,
            'numero' => $this->ficha['numero'],
            'letra' => $this->ficha['letra'],
            'sorteo_id' => $this->ficha->sorteo_id, // Añadido para manejo de cache
            'timestamp' => now()->toISOString() // Para medir sincronización
        ];
    }

    public function broadcastAs()
    {
        return 'ficha.sorteada';
    }

    // Nuevo: Configuración de velocidad
  /*  public function broadcastWhen()
    {
        return app()->environment('production') 
            ? true 
            : config('broadcasting.debug', false);
    }*/
}