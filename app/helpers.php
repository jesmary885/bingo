<?php

use GuzzleHttp\Client;

function valor_dolar_hoy(){

    try {
        $client = new Client([
            'base_uri' => 'http://pydolarve.org',
        ]);

        $resultado = $client->request('GET', '/api/v1/dollar?monitor=enparalelovzla');

        if($resultado->getStatusCode() == 200){

            $precio_dolar = json_decode($resultado->getBody(),true);

            return $precio_dolar['price'];
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