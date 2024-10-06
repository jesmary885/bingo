<?php

namespace App\Models;

use App\Events\CambioEstadoSorteo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //Relacion muchos a muchos
    public function cartones(){
        return $this->belongsToMany(Carton::class);
    }

    public function carton_ganadores(){
        return $this->hasMany(CartonGanador::class);
    }

    protected $dispatchesEvents = [
        'updated' => CambioEstadoSorteo::class,
    ];
}
