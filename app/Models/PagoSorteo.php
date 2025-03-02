<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoSorteo extends Model
{
    use HasFactory;

    protected $table = "pago_sorteos";

    //Relacion uno a muchos inversa

    public function pago(){
        return $this->belongsTo(Pago::class);
    }

    public function sorteo(){
        return $this->belongsTo(Sorteo::class);
    }
}
