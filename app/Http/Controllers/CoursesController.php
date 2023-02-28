<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::where('deleted_at', '=', null)->get();
        return view('admin.courses', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_course(Request $request)
    {
        $request->validate([
            'course_name' => ['required', 'string', 'max:255'],
            'course_description' => ['required', 'max:255'],
        ]);
        Courses::create([
            'course_name' => $request['course_name'],
            'course_description' => $request['course_description'],
        ]);
        return redirect('/courses')->with('message', 'Course has been added successfully!');
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
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $Courses
     * @return \Illuminate\Http\Response
     */
    public function showcourse($id){
        $data = Courses::where('deleted_at', '=', null)->findOrFail($id);
        return view('admin.deleteUpdate.updateCourse', ['course' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function updatecourse(Request $request){
        $request->validate([
            'course_name' => 'required|max:255',
            'course_description' => 'required|max:255',
        ]);
            $course = Courses::find($request->id);
            $course->course_name = $request->course_name;
            $course->course_description = $request->course_description;
            $course->save();
            return response()->json($course);

   }

    public function deletecourse($id){
        $data = Courses::where('deleted_at', '=', null)->findOrFail($id);
        return view('admin.deleteUpdate.deleteCourse', ['course' => $data]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function deletegradecourse(Request $request, $id){
        if ($request->ajax()){

            $course = Courses::findOrFail($id);
            if ($course){

                $course->deleted_at = now();
                $course->save();
    
                return response()->json(array('success' => true));
            }
        }
        
    }
}
