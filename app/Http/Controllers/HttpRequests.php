<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class HttpRequests extends Controller
{
    //
    public function adonisCreateUser(Request $request)
    {


        $client = new Client(['base_url'=>'http://localhost:3333','timeout' => 10.0,
            'verify' => false]);
        try {


            $response = $client->request('POST', 'http://localhost:3333/register', [
                'json'=> ['username'=>$request->username,'password'=>$request->password]
            ]);

            $datos = json_decode($response->getBody());

            return response()->json(['message'=>'Exito','adonis_response'=>$datos],200);

        }
        catch (RequestException $e)
        {
            return response()->json(['message'=>'Error','error'=>$e],401);
        }

    }

    public function protocols(Request $request)
    {
        $client = new Client(['base_url'=>'http://localhost:3333','timeout' => 5.0,
            'verify' => false]);
        try {


            $response = $client->request('GET', 'http://localhost:3333/protocols', [
                'headers'=> [
                    'Authorization' => 'Bearer '.$request->user()->getJwtToken(),
                    'shodan_token' => $request->user()->getShodanToken()
                ]
            ]);

            $datos = json_decode($response->getBody());

            return response()->json(['message'=>'Exito','adonis_response'=>$datos],200);

        }
        catch (RequestException $e)
        {
            return response()->json(['message'=>'Error','error'=>$e],401);
        }
    }

    public function ports(Request $request)
    {


        $client = new Client(['base_url'=>'http://localhost:3333','timeout' => 5.0,
            'verify' => false]);
        try {

            $response = $client->request('GET', 'http://localhost:3333/ports', [
                'headers'=> [
                    'Authorization' => 'Bearer '.$request->user()->getJwtToken(),
                    'shodan_token' => $request->user()->getShodanToken()
                ]
            ]);

            $datos = json_decode($response->getBody());

            return response()->json(['message'=>'Exito','adonis_response'=>$datos],200);

        }
        catch (RequestException $e)
        {
            return response()->json(['message'=>'Error','error'=>$e],401);
        }
    }

    public function triggers(Request $request)
    {


        $client = new Client(['base_url'=>'http://localhost:3333','timeout' => 5.0,
            'verify' => false]);
        try {

            $response = $client->request('GET', 'http://localhost:3333/triggers', [
                'headers'=> [
                    'Authorization' => 'Bearer '.$request->user()->getJwtToken(),
                    'shodan_token' => $request->user()->getShodanToken()
                ]
            ]);

            $datos = json_decode($response->getBody());

            return response()->json(['message'=>'Exito','adonis_response'=>$datos],200);

        }
        catch (RequestException $e)
        {
            return response()->json(['message'=>'Error','error'=>$e],401);
        }
    }

    public function ip(Request $request)
    {


        $client = new Client(['base_url'=>'http://localhost:3333','timeout' => 5.0,
            'verify' => false]);
        try {

            $response = $client->request('GET', 'http://localhost:3333/ip', [
                'headers'=> [
                    'Authorization' => 'Bearer '.$request->user()->getJwtToken(),
                    'shodan_token' => $request->user()->getShodanToken()
                ]
            ]);

            $datos = json_decode($response->getBody());

            return response()->json(['message'=>'Exito','adonis_response'=>$datos],200);

        }
        catch (RequestException $e)
        {
            return response()->json(['message'=>'Error','error'=>$e],401);
        }
    }

    public function facets(Request $request)
    {


        $client = new Client(['base_url'=>'http://localhost:3333','timeout' => 5.0,
            'verify' => false]);
        try {

            $response = $client->request('GET', 'http://localhost:3333/facets', [
                'headers'=> [
                    'Authorization' => 'Bearer '.$request->user()->getJwtToken(),
                    'shodan_token' => $request->user()->getShodanToken()
                ]
            ]);

            $datos = json_decode($response->getBody());

            return response()->json(['message'=>'Exito','adonis_response'=>$datos],200);

        }
        catch (RequestException $e)
        {
            return response()->json(['message'=>'Error','error'=>$e],401);
        }
    }

}
