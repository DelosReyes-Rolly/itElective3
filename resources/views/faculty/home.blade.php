@extends('layouts.app')
@include('partials.facultyHeader')
@include('partials.dataTablesImport')
@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Schedule of Classes</div>
</div>
<section id="about" class="about">
	<div id="main-content" class="blog-page">
		<h3 style="font-size: 28px; font-weight: 800;">Upcoming Classes </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-body p-0">
                <div class="table-responsive table-billing-history">
                    <table id="firstDataTable" class="display table-bordered table-striped table-hover" style="width:100%">
                        <thead style="background-color:#00cc00; color:#004d00;">
                            <tr>
                                <th width="2%" class="border-gray-200" scope="col">#</th>
                                <th width="20%" class="border-gray-200" scope="col">Course</th>
                                <th width="20%" class="border-gray-200" scope="col">Subject</th>
								<th width="6%" class="border-gray-200" scope="col">Semester</th>
								<th width="10%" class="border-gray-200" scope="col">Time</th>
								<th width="10%" class="border-gray-200" scope="col">Week day</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

		<br/><br/>

		<h3 style="font-size: 28px; font-weight: 800;">Previous Classes </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-body p-0">
                <div class="table-responsive table-billing-history">
                    <table id="secondDataTable" class="display table-bordered table-striped table-hover" style="width:100%">
                        <thead style="background-color:#00cc00; color:#004d00;">
                            <tr>
                                <th width="2%" class="border-gray-200" scope="col">#</th>
                                <th width="20%" class="border-gray-200" scope="col">Course</th>
                                <th width="20%" class="border-gray-200" scope="col">Subject</th>
								<th width="6%" class="border-gray-200" scope="col">Semester</th>
								<th width="10%" class="border-gray-200" scope="col">Time</th>
								<th width="10%" class="border-gray-200" scope="col">Week day</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</section>
@endsection
