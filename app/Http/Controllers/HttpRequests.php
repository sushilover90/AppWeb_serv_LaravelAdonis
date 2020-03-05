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

}
