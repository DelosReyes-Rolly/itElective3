<?php

namespace App\Http\Controllers;

use App\Models\SubjectTeachers;
use Illuminate\Http\Request;

class SubjectTeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjectteachers = Subjectteachers::where('deleted_at', '=', null)->get();
        return view('admin.subjectTeacher', compact('subjectteachers'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectTeachers  $SubjectTeachers
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectTeachers $SubjectTeachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectTeachers  $SubjectTeachers
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectTeachers $SubjectTeachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectTeachers  $SubjectTeachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectTeachers $SubjectTeachers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectTeachers  $SubjectTeachers
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectTeachers $SubjectTeachers)
    {
        //
    }
}
