<?php

namespace App\Models;

use App\Events\NewFichaSorteo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SorteoFicha extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    
    //Relacion uno a muchos inversa
    public function sorteo(){
        return $this->belongsTo(Sorteo::class);
    }
    
    protected $dispatchesEvents = [
        'created' => NewFichaSorteo::class,
    ];
}
