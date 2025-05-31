<?php

namespace App\Console\Commands;

use App\Models\MetodoPago;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class CambioMonetario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cambio:monetario';

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

        try {
        $client = new Client([
            'base_uri' => 'https://pydolarve.org',
        ]);

        $resultado = $client->request('GET', '/api/v1/dollar?page=bcv');

        if($resultado->getStatusCode() == 200){

            $precio_dolar = json_decode($resultado->getBody(),true);

            MetodoPago::where('name', 'Pago Movil')
                ->update([
                    'valor' => $precio_dolar['monitors']['usd']['price']
                ]);


            return $precio_dolar['monitors']['usd']['price'];
        }

    }
    catch (\GuzzleHttp\Exception\RequestException $e) {

        $error['error'] = $e->getMessage();
        $error['request'] = $e->getRequest();

        if($e->hasResponse()){
            if ($e->getResponse()->getStatusCode() !== '200'){
                $error['response'] = $e->getResponse(); 

            }
        }
    }
    }
}
