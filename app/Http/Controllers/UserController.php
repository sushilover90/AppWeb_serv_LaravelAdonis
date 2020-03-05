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
//        return 1;
//        return $request;
        return $request->user()->setShodanToken($request->shodan_token);
    }

}
