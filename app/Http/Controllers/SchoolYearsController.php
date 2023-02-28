<?php

namespace App\Http\Controllers;

use App\Models\SchoolYears;
use Illuminate\Http\Request;

class SchoolYearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolYears = SchoolYears::where('deleted_at', '=', null)->get();
        return view('admin.schoolYears', compact('schoolYears'));
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
    public function store_schoolYear(Request $request)
    {
        $request->validate([
            'year_from' => ['required', 'numeric'],
            'year_to' => ['required', 'numeric'],
        ]);
        SchoolYears::create([
            'year_from' => $request['year_from'],
            'year_to' => $request['year_to'],
        ]);
        return redirect('/schoolYears')->with('message', 'Schoolyear has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolYears  $schoolYears
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolYears $schoolYears)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\schoolyears  $schoolyears
     * @return \Illuminate\Http\Response
     */
    public function showschoolyear($id){
        $data = Schoolyears::where('deleted_at', '=', null)->findOrFail($id);
        return view('admin.deleteUpdate.updateSchoolyear', ['schoolyear' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\schoolyears  $schoolyears
     * @return \Illuminate\Http\Response
     */
    public function updateschoolyear(Request $request){
        $request->validate([
            'year_from' => 'required|numeric',
            'year_to' => 'required|numeric',
        ]);
            $schoolyear = Schoolyears::find($request->id);
            $schoolyear->year_from = $request->year_from;
            $schoolyear->year_to = $request->year_to;
            $schoolyear->save();
            return response()->json($schoolyear);

   }

    public function deleteschoolyear($id){
        $data = Schoolyears::where('deleted_at', '=', null)->findOrFail($id);
        return view('admin.deleteUpdate.deleteSchoolyear', ['schoolyear' => $data]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\schoolyears  $schoolyears
     * @return \Illuminate\Http\Response
     */
    public function deletegradeschoolyear(Request $request, $id){
        if ($request->ajax()){

            $schoolyear = schoolyears::findOrFail($id);
            if ($schoolyear){

                $schoolyear->deleted_at = now();
                $schoolyear->save();

                return response()->json(array('success' => true));
            }
        }

    }
}
