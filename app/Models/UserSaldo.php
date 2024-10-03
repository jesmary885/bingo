<?php

namespace App\Models;

use App\Events\NewSaldoUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSaldo extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $dispatchesEvents = [
        'updated' => NewSaldoUser::class,
    ];
    
}
