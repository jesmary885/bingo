<?php

namespace App\Console\Commands;

use App\Models\Cart;
use App\Models\CartonSorteo;
use App\Models\Sorteo;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CartonesReservados extends Command
{

    protected $signature = 'verif:cartones';

    protected $description = 'Command description';

    public function handle()
    {
        //$sorteos = Sorteo::where('status','Aperturado')->get(); vas a crear dis comandos uno para todos los sorteos
        //y otro para los aperturados

        $sorteos = Sorteo::where('status','Aperturado')->get();

        foreach($sorteos as $sorteo){

            $cartones = CartonSorteo::where('sorteo_id',$sorteo->id)
                ->where('status_carton','Reservado')
                ->where('pago_id', null)
                ->get();

            if($cartones->isEmpty() == false){

                foreach($cartones as $carton){

                    $dateDiff = Carbon::now()->diffInMinutes($carton->updated_at);

                    if($dateDiff >= 30){

                        $cart = Cart::where('carton_id',$carton->carton_id)
                            ->where('user_id',$carton->user_id)
                            ->where('sorteo_id',$sorteo->id)
                            ->first();

                        if($cart){
                            $cart->delete();
                        }

                       $carton->update([
                            'status_carton' => 'Disponible',
                            'user_id' => null,
                            'status_pago' => null
                        ]);
                    }
                }
            }
        }
    }
}
