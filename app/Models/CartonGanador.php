<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartonGanador extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    
    //Relacion uno a muchos inversa
    public function sorteo(){
        return $this->belongsTo(Sorteo::class);
    }

    public function carton(){
        return $this->belongsTo(Carton::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
