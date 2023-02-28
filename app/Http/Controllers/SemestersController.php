<?php

namespace App\Http\Controllers;

use App\Models\Semesters;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semesters::where('deleted_at', '=', null)->get();
        return view('admin.semesters', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_semester(Request $request)
    {
        $request->validate([
            'semester_name' => ['required', 'string', 'max:255'],
        ]);
        Semesters::create([
            'semester_name' => $request['semester_name'],
        ]);
        return redirect('/semesters')->with('message', 'Semester has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semesters  $semesters
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\semesters  $semesters
     * @return \Illuminate\Http\Response
     */
    public function showsemester($id){
        $data = Semesters::where('deleted_at', '=', null)->findOrFail($id);
        return view('admin.deleteUpdate.updateSemester', ['semester' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\semesters  $semesters
     * @return \Illuminate\Http\Response
     */
    public function updatesemester(Request $request){
        $request->validate([
            'semester_name' => 'required|max:255',
        ]);
            $semester = Semesters::find($request->id);
            $semester->semester_name = $request->semester_name;
            $semester->save();
            return response()->json($semester);

   }

    public function deletesemester($id){
        $data = Semesters::where('deleted_at', '=', null)->findOrFail($id);
        return view('admin.deleteUpdate.deleteSemester', ['semester' => $data]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\semesters  $semesters
     * @return \Illuminate\Http\Response
     */
    public function deletegradesemester(Request $request, $id){
        if ($request->ajax()){

            $semester = Semesters::findOrFail($id);
            if ($semester){

                $semester->deleted_at = now();
                $semester->save();
    
                return response()->json(array('success' => true));
            }
        }
        
    }
}
