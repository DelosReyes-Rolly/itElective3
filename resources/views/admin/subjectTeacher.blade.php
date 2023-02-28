@extends('layouts.app')
@include('partials.adminHeader')
@include('partials.dataTablesImport')
@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Manage Schedule</div>
</div>
<section id="about" class="about">
	<div id="main-content" class="blog-page">
		<hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-primary" style="padding: 10px 20px 10px 20px;">
			<div class="card-header" style="background-color: #ffffff;">
				<div style="float:right; text-align: right;">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_subjectteacher">
						<i class="fa-solid fa-plus"></i> Create New Schedule
					</button>
				</div>
            </div>
            <div class="card-body p-0">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
                @if($subjectteachers->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else
                    <div class="table-responsive table-billing-history">
                        <table id="firstDataTable" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead style="background-color:#b2dce4; color:black;">
                                <tr>
                                    <th width="2%" class="border-gray-200" scope="col">#</th>
                                    <th width="10%" class="border-gray-200" scope="col">School Year</th>
									<th width="20%" class="border-gray-200" scope="col">Subject</th>
									<th width="20%" class="border-gray-200" scope="col">Course</th>
									<th width="20%" class="border-gray-200" scope="col">Teacher</th>
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
                                            <td width="20%">{{$subjectteacher->subject->subject_name}}</td>
											<td width="20%">{{$subjectteacher->course->course_name}}</td>
											<td width="20%">{{$subjectteacher->teacher->last_name}}, {{$subjectteacher->teacher->first_name}} {{$subjectteacher->teacher->middle_name}}</td>
                                        </tr>

                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
</section>
@endsection


@section('modals')
	<div class="modal fade modal-lg modal-add h-100" id="create_subjectteacher" tabindex="-1" aria-labelledby="create_subjectteacher" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-md">
			<div class="modal-content border-start-lg border-start-yellow">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Create Subject to Teacher Assignment</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{ route('store_subjectteacher') }}" method="POST" class="form my-4 needs-validation" novalidate>
					<div class="modal-body">
						<span class="form-text text-danger"> * Required field </span>
						@csrf
						<div class="row">
                            <div class="col-md-12" style="font-size: 18px;">
                                <label for="year_from" class="form-label w-75"><span class="form-text text-danger">* </span>Teacher: </label>
								<select id="teacher_id" name="teacher_id"  class="@error('teacher_id') is-invalid @enderror" style="font-size: 16px; padding: 6px; width:100%;">
									<option value="" hidden> Please Select a Teacher</option>
                                    @foreach ($teachers as $teacher)
									    <option value="{{ $teacher->id }}">{{ strtoupper($teacher->last_name) }}, {{ $teacher->first_name }}</option>
                                    @endforeach
								</select>
							</div>
                            <div class="col-md-12" style="font-size: 18px;">
                                <label for="year_from" class="form-label w-75"><span class="form-text text-danger">* </span>Course: </label>
								<select id="course_id" name="course_id"  class="@error('course_id') is-invalid @enderror" style="font-size: 16px; padding: 6px; width:100%;">
									<option value="" hidden> Please Select a Course</option>
                                    @foreach ($courses as $course)
									    <option value="{{ $course->id }}">{{ strtoupper($course->course_name) }}</option>
                                    @endforeach
								</select>
							</div>
                            <div class="col-md-12" style="font-size: 18px;">
                                <label for="year_from" class="form-label w-75"><span class="form-text text-danger">* </span>Subject: </label>
								<select id="subject_id" name="subject_id"  class="@error('subject_id') is-invalid @enderror" style="font-size: 16px; padding: 6px; width:100%;">
									<option value="" hidden> Please Select a Subject</option>
                                    @foreach ($subjects as $subject)
									    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                    @endforeach
								</select>
							</div>
                            <div class="col-md-12" style="font-size: 18px;">
                                <label for="year_from" class="form-label w-75"><span class="form-text text-danger">* </span>Semester: </label>
								<select id="semester_id" name="semester_id"  class="@error('semester_id') is-invalid @enderror" style="font-size: 16px; padding: 6px; width:100%;">
									<option value="" hidden> Please Select a Semester</option>
                                    @foreach ($semesters as $semester)
									    <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                    @endforeach
								</select>
							</div>
                            <div class="col-md-12" style="font-size: 18px;">
                                <label for="year_from" class="form-label w-75"><span class="form-text text-danger">* </span>School Year: </label>
								<select id="sy_id" name="sy_id"  class="@error('sy_id') is-invalid @enderror" style="font-size: 16px; padding: 6px; width:100%;">
									<option value="" hidden> Please Select a School Year</option>
                                    @foreach ($school_years as $sy)
									    <option value="{{ $sy->id }}">S.Y. {{ $sy->year_from }} to {{ $sy->year_to }}</option>
                                    @endforeach
								</select>
							</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br/>
								<label for="time_from" class="form-label w-75"><span class="form-text text-danger">* </span>Time From: </label>
								<input type="time" name="time_from" id="time_from" placeholder="from" class="form-control" required autofocus autocomplete="on">
								<div class="invalid-feedback">
									Please input valid time.
								</div>
							</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br/>
								<label for="time_to" class="form-label w-75"><span class="form-text text-danger">* </span>Time To: </label>
								<input type="time" name="time_to" id="time_to" placeholder="from" class="form-control" required autofocus autocomplete="on">
								<div class="invalid-feedback">
									Please input valid time.
								</div>
							</div>
                            <div class="col-md-12" style="font-size: 18px;">
                                <label for="days_of_week" class="form-label w-75"><span class="form-text text-danger">* </span>Day of Week: </label>
								<select id="days_of_week" name="days_of_week"  class="@error('days_of_week') is-invalid @enderror" style="font-size: 16px; padding: 6px; width:100%;">
									<option value="" hidden> Please Select a day of week</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary btn-md" value=Submit></input>
					</div>
				</form>
			</div>
			<!-- For validaition of forms -->
			<script src="{{ asset('assets/js/needs-validated2.js') }}"></script>
		</div>
	</div>
@endsection


<script>
	$(document).ready(function(){

	editItem(e);
	deleteItem(e);
	});
	function editItem(e){
		id = e.getAttribute('data-id');
	}
	//delete
	function deleteItem(e){
		id = e.getAttribute('data-id');
	}
</script>
