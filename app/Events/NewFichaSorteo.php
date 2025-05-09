<?php

namespace App\Events;

use App\Models\Sorteo;
use App\Models\SorteoFicha;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewFichaSorteo implements ShouldBroadcast,ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

    public $ficha; // Solo datos necesarios
    public $queue = 'high'; 

    public function __construct($ficha)
    {
        $this->ficha = $ficha; // Recibe array/objeto simple
    }

    public function broadcastOn()
    {
        return new Channel('sorteo_fichas');
    }

    public function broadcastWith() // Optimiza payload
    {
        return [
            'id' => $this->ficha['id'],
            'numero' => $this->ficha['numero'],
            'letra' => $this->ficha['letra']
        ];
    }

    public function broadcastAs() {
        return 'ficha.sorteada';
    }

}
