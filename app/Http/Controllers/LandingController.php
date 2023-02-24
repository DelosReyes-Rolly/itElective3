<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function landing()
    {   
        return view('welcome');
    }
}
