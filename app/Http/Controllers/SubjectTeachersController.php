<?php

namespace App\Http\Controllers;

use App\Models\SubjectTeachers;
use App\Models\Teacher;
use App\Models\Courses;
use App\Models\SchoolYears;
use App\Models\Semesters;
use App\Models\Subjects;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class SubjectTeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::where('deleted_at', '=', null)->get();
        $courses  = Courses::where('deleted_at', '=', null)->get();
        $subjects = Subjects::where('deleted_at', '=', null)->get();
        $semesters = Semesters::where('deleted_at', '=', null)->get();
        $school_years = SchoolYears::where('deleted_at', '=', null)->get();
        $subjectteachers = Subjectteachers::where('deleted_at', '=', null)->get();
        return view('admin.subjectTeacher', compact(['subjectteachers', 'teachers', 'courses', 'subjects', 'semesters', 'school_years']));
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
    public function store_subjectteacher(Request $request)
    {
        $request->validate([
            'teacher_id'    => 'required',
            'course_id'     => 'required',
            'subject_id'    => 'required',
            'semester_id'   => 'required',
            'sy_id'         => 'required',
            'time_from'     => 'required',
            'time_to'       => 'required',
            'days_of_week'  => 'required',
        ]);

        $validate_one = SubjectTeachers::where('course_id', $request->course_id)
                        ->where('subject_id', $request->subject_id)
                        ->where('semester_id', $request->semester_id)
                        ->where('schoolyear_id', $request->sy_id)
                        ->whereBetween('time_from', [$request->time_from, $request->time_to])
                        ->whereBetween('time_to', [$request->time_from, $request->time_to])
                        ->where('days_of_week', $request->days_of_week)
                        ->get();

        $validate_two = SubjectTeachers::where('teacher_id', $request->teacher_id)
                        ->where('semester_id', $request->semester_id)
                        ->where('schoolyear_id', $request->sy_id)
                        ->whereBetween('time_from', [$request->time_from, $request->time_to])
                        ->whereBetween('time_to', [$request->time_from, $request->time_to])
                        ->where('days_of_week', $request->days_of_week)
                        ->get();

        $validate_three = SubjectTeachers::where('semester_id', $request->semester_id)
                        ->where('schoolyear_id', $request->sy_id)
                        ->whereBetween('time_from', [$request->time_from, $request->time_to])
                        ->whereBetween('time_to', [$request->time_from, $request->time_to])
                        ->where('days_of_week', $request->days_of_week)
                        ->get();

        $validate_four = SubjectTeachers::where('course_id', $request->course_id)
                        ->where('subject_id', $request->subject_id)
                        ->where('semester_id', $request->semester_id)
                        ->where('schoolyear_id', $request->sy_id)
                        ->get();


        if (count($validate_one) > 0 || count($validate_two) > 0 || count($validate_three ) > 0 || count($validate_four ) > 0) {
            return back()->with('message', 'Theres a conflict on the schedule.');
        }
        else {
            $teachers = SubjectTeachers::where('teacher_id', $request->teacher_id)->get();
            $subjects = Subjects::all();
            $units = 0;

            foreach ($teachers as $teacher) {
                foreach ($subjects as $subject) {
                    if ($subject->id == $teacher->subject_id && $teacher->schoolyear_id == $request->sy_id) {
                        $units = $units + $subject->units;
                    }
                }
            }

            if ($units > 10) {
                return back()->with('message', 'Teacher reached the maximum units per week');
            }
            else {
                SubjectTeachers::create([
                    'teacher_id'    => $request->teacher_id,
                    'course_id'     => $request->course_id,
                    'subject_id'    => $request->subject_id,
                    'semester_id'   => $request->semester_id,
                    'schoolyear_id' => $request->sy_id,
                    'time_from'     => $request->time_from,
                    'time_to'       => $request->time_to,
                    'days_of_week'  => $request->days_of_week,
                ]);

                return back()->with('message', 'Schedule has been added successfully!');
            }
        }
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
