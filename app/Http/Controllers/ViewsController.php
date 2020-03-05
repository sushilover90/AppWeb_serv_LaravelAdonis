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

    public function protocols()
    {
        return view('custom_views/protocols');
    }

    public function ports()
    {
        return view('custom_views/ports');
    }

    public function ip()
    {
        return view('custom_views/ip');
    }

    public function facets()
    {
        return view('custom_views/facets');
    }

    public function triggers()
    {
        return view('custom_views/triggers');
    }

}
