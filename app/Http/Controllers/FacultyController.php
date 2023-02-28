<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use App\Models\SubjectTeachers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teacher_id = DB::table('users')->join('teachers', 'users.id', '=', 'teachers.user_id')->select(['teachers.id'])->first();
        $subjectteachers = SubjectTeachers::where('deleted_at', '=', null)->where('teacher_id', '=', $teacher_id->id)->get();
        return view('faculty.home', compact('subjectteachers'));
    }

    public function profile(){
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $address = Address::where('id', $teacher->address_id)->first();
        return view('faculty.profile', compact(['teacher', 'address']));
    }

    public function change_password()
    {
        return view('auth.change_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => ['string','required', 'min:8'],
            'password' => ['min:8', 'string','required','Confirmed']
        ]);

        $oldPasswordStatus = Hash::check($request->old_password, auth()->user()->password);
        if($oldPasswordStatus)
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make(strip_tags($request->password));
            $user->update();
            return redirect()->back()->with('success', 'Password Changed successfully');
        }
        else
        {
            return redirect()->back()->with('failed', 'Error: Old password don\'t  match');
        }
    }

    public function update_profile(Request $request) {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
        ]);

        $getAddressID = Teacher::where('user_id', Auth::user()->id)->value('address_id');

        $updateAddress = Address::where('id', $getAddressID)->update([
            'house_number'  => $request->input('house_num'),
            'lot_number'    => $request->input('lot_num'),
            'street_name'   => $request->input('street'),
            'barangay'      => $request->input('barangay'),
            'city'          => $request->input('city'),
            'zip_code'      => $request->input('zip_code'),
            'country'       => $request->input('country'),
        ]);

        $updateTeacher = Teacher::where('user_id', Auth::user()->id)->update([
            'first_name'    => $request->input('first_name'),
            'middle_name'   => $request->input('middle_name'),
            'last_name'     => $request->input('last_name'),
            'suffix'        => $request->input('suffix'),
            'email'         => $request->input('email'),
            'contact_no'    => $request->input('contact_no'),
            'sex'           => $request->input('gender'),
        ]);

        $userUpdate = User::where('id', Auth::user()->id)->update([
            'email'         => $request->input('email'),
        ]);

        return back()->with('success', 'Profile Successfully Updated');
    }

}
