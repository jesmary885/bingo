<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewFichaSorteo implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $numero;
    public $letra;

    public function __construct($ficha)
    {
        $this->id = $ficha['id'];
        $this->numero = $ficha['numero'];
        $this->letra = $ficha['letra'];
    }

    public function broadcastOn()
    {
        return new Channel('sorteo_fichas');
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->id,
            'numero' => $this->numero,
            'letra' => $this->letra
        ];
    }

    public function broadcastAs()
    {
        return 'ficha.sorteada';
    }
}