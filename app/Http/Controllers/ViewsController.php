<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    //

    public function index()
    {
        return view('custom_views/home');
    }

    public function adonisUserRegister()
    {
        return view('custom_views/adonisUserRegister');
    }

}
