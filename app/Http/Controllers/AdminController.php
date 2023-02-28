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
        return view('admin.faculty_accounts',[
            'data'=> User::all(),
        ]);
    }

    public function store_faculty(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','unique:users','min:8','max:50','email'],
            'password' => ['required','min:8','string'],
        ]);

        $user = User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'password'  => Hash::make($request['password']),
        ]);
        $user->save();

        $getUserID = $user->id;

        $address = new Address();
        $address->house_number = $request->input('house_number');
        $address->lot_number = $request->input('lot_number');
        $address->save();

        $getAddressID = $address->id;

        $teacher = new Teacher();
        $teacher->user_id = $getUserID;
        $teacher->email = $user->email;
        $teacher->first_name = $user->name;
        $teacher->address_id = $getAddressID;
        $teacher->save();
        //     'user_id'    => $getUserID,
        //     'email'      => $request->input('email'),
        //     'address_id' => $getAddressID,
        // ]);

        return redirect()->route('create_faculty');
    }
}
