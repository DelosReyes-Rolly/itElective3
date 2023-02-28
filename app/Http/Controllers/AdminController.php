<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Teacher;
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
            'name'      => $request['name'],
            'email'     => $request['email'],
            'password'  => Hash::make($request['password']),
        ]);

        $getUserID = User::where('email', $request->email)->value('id');

        Address::create([
            'house_number' => $getUserID,
            'lot_number' => $getUserID,
        ]);

        $getAddressID = Address::where('house_number', $getUserID)->where('lot_number', $getUserID)->value('id');

        Teacher::create([
            'user_id'    => $getUserID,
            'email'      => $request->input('email'),
            'address_id' => $getAddressID,
        ]);

        return redirect()->route('create_faculty',[
            'data'=> User::all(),
        ]);
    }
}
