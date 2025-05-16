<?php

namespace App\Events;

use App\Models\CartonGanador;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow; // Cambio clave

class NewGanador implements ShouldBroadcastNow // Implementa ShouldBroadcastNow
{
    use Dispatchable, SerializesModels,Queueable;

    public $ganador;

    public function __construct(CartonGanador $ganador )
    {
        $this->ganador = $ganador;
    }

    public function broadcastOn()
    {
        return new Channel('ganador');
    }

    public function broadcastAs()
    {
        return 'ganador.nuevo';
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->ganador->id,
            'carton_id' => $this->ganador->carton_id,
            'sorteo_id' => $this->ganador->sorteo_id,
            'type' => $this->ganador->type,
            'type_lineal' => $this->ganador->type_lineal,
            'type_numero' => $this->ganador->type_numero,
            'lugar' => $this->ganador->lugar,
            'premio' => $this->ganador->premio,
        ];
    }


}
