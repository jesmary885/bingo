<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartonSorteo extends Model
{
    use HasFactory;

    protected $table = "carton_sorteos";

    
    //Relacion uno a muchos inversa
    public function sorteo(){
        return $this->belongsTo(Sorteo::class);
    }

    public function carton(){
        return $this->belongsTo(Carton::class);
    }
}
