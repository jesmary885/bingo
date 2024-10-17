<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referidos extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //Relacion uno a muchos inversa
    public function user(){ //usuario que me refirio
        return $this->belongsTo(User::class, 'refer_id');
    }
    

    public function refer(){ 
        return $this->belongsTo(User::class, 'user_id');
    }
}
