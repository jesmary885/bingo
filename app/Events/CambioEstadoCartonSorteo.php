<?php

namespace App\Events;

use App\Models\CartonSorteo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CambioEstadoCartonSorteo implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


     public $carton_sorteo;
    public function __construct(CartonSorteo $carton_sorteo)
    {
        $this->carton_sorteo = $carton_sorteo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('cambio_cs');
    }
}
