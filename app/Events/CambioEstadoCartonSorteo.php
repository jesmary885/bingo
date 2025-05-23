<?php

namespace App\Events;

use App\Models\CartonSorteo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Bus\Queueable;


class CambioEstadoCartonSorteo implements ShouldBroadcastNow 
{
    use SerializesModels,Queueable;


     public $carton_sorteo;

    public function __construct(CartonSorteo $carton_sorteo)
    {
        $this->carton_sorteo = $carton_sorteo;
    }

    public function broadcastOn()
    {
        return new Channel('cambio_cs');
    }

    public function broadcastAs()
    {
        return 'cambio.carton';
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->carton_sorteo->id,
            'carton_id' => $this->carton_sorteo->carton_id,
            'sorteo_id' => $this->carton_sorteo->sorteo_id,
            'user_id' => $this->carton_sorteo->user_id,
            'pago_id' => $this->carton_sorteo->pago_id,
            'status_carton' => $this->carton_sorteo->status_carton,
            'status_pago' => $this->carton_sorteo->status_pago,
            'status_juego' => $this->carton_sorteo->status_juego,
        ];
    }

    // Nuevo: Configuración de velocidad
    public function broadcastWhen()
    {
        return app()->environment('production') 
            ? true 
            : config('broadcasting.debug', false);
    }
}
