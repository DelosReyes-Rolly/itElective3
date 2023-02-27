<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function create_faculty()
    {
        return view('admin.faculty_accounts');
    }
    
    public function store_faculty(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','unique:users','min:8','max:50','email'],
            'password' => ['required','min:8','string'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('create_faculty',[
            'data'=> User::all(),
        ]);
    }
}
