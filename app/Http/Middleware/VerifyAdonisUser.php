<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewsController;
use Closure;

class VerifyAdonisUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request)
    {
//        return response()->json(['message'=>'hola','token'=>$request->user()->getJwtToken()],200);
//        return $request;
//        return response()->json(['message'=>'hola','token'=>$request->user()->getJwtToken()],200);
        $jwt_token = $request->user()->getJwtToken();
        if(!($jwt_token==null) || !($jwt_token == ''))
        {
            return redirect('/home');
        }
        $ViewsController = new ViewsController();

        return $ViewsController->adonisUserRegister();
    }
}
