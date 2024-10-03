<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaGanancias extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function sorteo(){
        return $this->belongsTo(Sorteo::class);
    }
}
