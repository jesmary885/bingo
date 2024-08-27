<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carton extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //Relacion muchos a muchos
    public function sorteos(){
        return $this->belongsToMany(Sorteo::class)->withPivot('status', 'id');
    }


}
