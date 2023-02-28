@extends('layouts.app')
@include('partials.facultyHeader')
@include('partials.dataTablesImport')
@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Schedule of Classes</div>
</div>
<section id="about" class="about">
	<div id="main-content" class="blog-page">
		<h3 style="font-size: 28px; font-weight: 800;">List of Classes </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-primary" style="padding: 10px 20px 10px 20px;">
            <div class="card-body p-0">
                <div class="table-responsive table-billing-history">
                    <table id="firstDataTable" class="display table-bordered table-striped table-hover" style="width:100%">
                        <thead style="background-color:#b2dce4; color:black;">
                            <tr>
                                <th width="2%" class="border-gray-200" scope="col">#</th>
                                <th width="20%" class="border-gray-200" scope="col">School year</th>
                                <th width="20%" class="border-gray-200" scope="col">Course</th>
                                <th width="20%" class="border-gray-200" scope="col">Subject</th>
								<th width="6%" class="border-gray-200" scope="col">Semester</th>
								<th width="10%" class="border-gray-200" scope="col">Time</th>
								<th width="10%" class="border-gray-200" scope="col">Week day</th>
                                <th width="20%" class="border-gray-200" scope="col">Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                            ?>
                            @foreach ($subjectteachers as $subjectteacher)
                                <tr id="subjectteacher{{$subjectteacher->id}}">
                                    <td width="2%" class="text-center"><?php echo $i++; ?></td>
                                    <td width="10%">{{$subjectteacher->schoolyear->year_from}} - {{$subjectteacher->schoolyear->year_to}}</td>
                                    <td width="20%">{{$subjectteacher->course->course_name}}</td>
                                    <td width="20%">{{$subjectteacher->subject->subject_name}}</td>
                                    <td width="20%">{{$subjectteacher->semester->semester_name}}</td>
                                    <td width="20%">{{$subjectteacher->time_from}} - {{$subjectteacher->time_to}}</td>
									<td width="20%">{{$subjectteacher->days_of_week}}</td>
									<td width="20%">{{$subjectteacher->subject->units}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</section>
@endsection
