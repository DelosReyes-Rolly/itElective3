<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome()
    {
        return view('admin.adminHome');
    }

    public function profile(){
        return view('admin.profile');
    }
}
