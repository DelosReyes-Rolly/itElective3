<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {  
        
        return view('faculty.home');
    }

    public function profile()
    {
        return view('faculty.profile');
    }

}