<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subjects::where('deleted_at', '=', null)->get();
        return view('admin.subjects', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_subject(Request $request)
    {
        $request->validate([
            'subject_name' => ['required', 'string', 'max:255'],
            'subject_description' => ['required', 'max:255'],
            'units' => ['numeric', 'max:10'],
        ]);
        Subjects::create([
            'subject_name' => $request['subject_name'],
            'subject_description' => $request['subject_description'],
            'units' => $request['units'],
        ]);
        return redirect('/subjects')->with('message', 'Subject has been added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function show(Subjects $subjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subjects  $Subjects
     * @return \Illuminate\Http\Response
     */
    public function showsubject($id){
        $data = Subjects::where('deleted_at', '=', null)->findOrFail($id);
        return view('admin.deleteUpdate.updateSubject', ['subject' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subjects  $Subjects
     * @return \Illuminate\Http\Response
     */
    public function updatesubject(Request $request){
        $request->validate([
            'subject_name' => 'required|max:255',
            'subject_description' => 'required|max:255',
            'units' => 'required|numeric|max:10',

        ]);
            $subject = Subjects::find($request->id);
            $subject->subject_name = $request->subject_name;
            $subject->subject_description = $request->subject_description;
            $subject->units = $request->units;
            $subject->save();
            return response()->json($subject);

   }

    public function deletesubject($id){
        $data = Subjects::where('deleted_at', '=', null)->findOrFail($id);
        return view('admin.deleteUpdate.deleteSubject', ['subject' => $data]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subjects  $Subjects
     * @return \Illuminate\Http\Response
     */
    public function deletegradesubject(Request $request, $id){
        if ($request->ajax()){

            $subject = Subjects::findOrFail($id);
            if ($subject){

                $subject->deleted_at = now();
                $subject->save();
    
                return response()->json(array('success' => true));
            }
        }
        
    }
}
