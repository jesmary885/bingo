<?php

namespace App\Console\Commands;

use App\Http\Livewire\Admin\Configuracion;
use App\Models\cartones_pendientes_referidos;
use App\Models\configuracion as ModelsConfiguracion;
use App\Models\referidos;
use App\Models\User;
use Illuminate\Console\Command;

class ReferidosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'referidos:pendientes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $configuracion = ModelsConfiguracion::first()->cant_referidos;

        $users = User::all();

        foreach($users as $user){

            $referido = referidos::where('status','Pendiente')
                ->where('refer_id',$user->id)
                ->count();

            if($referido >= $configuracion){

                $referido_modificar = referidos::where('status','Pendiente')
                ->where('refer_id',$user->id)
                ->latest('id')
                ->take($configuracion)
                ->get();

                foreach ($referido_modificar as $r){

                    referidos::where('id',$r->id)->first()
                        ->update([
                        'status' => 'Procesado'
                    ]);
                }

                cartones_pendientes_referidos::create([
                    'user_id' => $user->id,
                    'status' => 'Pendiente'
                ]);
            }
        }
    }
}
