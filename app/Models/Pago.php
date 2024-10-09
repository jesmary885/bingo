<?php

namespace App\Models;

use App\Events\NewPago;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cuenta(){
        return $this->belongsTo(CuentasUser::class);
    }


    public function metodo_pago(){
        return $this->belongsTo(MetodoPago::class);
    }

    protected $dispatchesEvents = [
        'created' => NewPago::class,
    ];
}
