<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function getLaravelToken(Request $request)
    {
        return $request->user()->getLaravelToken();
    }

    public function setLaravelToken(Request $request)
    {
        return $request->user()->setLaravelToken();
    }

    public function getShodanToken(Request $request)
    {
        return $request->user()->getShodanToken();
    }

    public function setShodanToken(Request $request)
    {
        return $request->user()->setShodanToken($request->shodan_token);
    }

    public function getAdonisTokens(Request $request)
    {
        return ['jwt_token'=>$request->user()->getJwtToken(),'refresh_token'=>$request->user()->getRefreshToken()];
    }

    public function setAdonisTokens(Request $request)
    {
        return $request->user()->setAdonisTokens($request->jwt_token,$request->refresh_token);
    }


}
